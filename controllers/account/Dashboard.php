<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/******************************************************************
	Controller 	: Dashboard 
	Purpose    	: Manage all task tyo related account Dashboard 
	Created  	: 22-02-2018
	Author   	: Pavan
******************************************************************/
class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		
		$user_Id	=	$this->session->userdata('user_Id');
		if(!isset($user_Id)){
			redirect('logout');
			exit();
		}
		
		$isFalse	=	toCheckAcceptTerms();
		if($isFalse==false){
			redirect('account/acceptTerms');
			exit();
		}
		
		$td_user_role_id	=	@$this->session->userdata("td_user_role_id");
		$isTrue				=	isKycApprovedUser($user_Id);
		$isPersonalInfoTrue	=	checkPersonalInfoFields($user_Id);
		
		if($isPersonalInfoTrue===false){
			redirect('account/personal-info');
			exit();
		}elseif($isTrue ===false and $td_user_role_id > 1){
			redirect('account/documents');
			exit();
		}
	}
		
	public function index()
	{
		//echo "account"; 
		$data	=	array();
		
		$data['eth_company_address']	=	getCompanyWalletAddress(1);
		$data['btc_company_address']	=	getCompanyWalletAddress(2);
		$data['ltc_company_address']	=	getCompanyWalletAddress(3);
		$data['dash_company_address']	=	getCompanyWalletAddress(4);
		
		$data['btc_user_address']		=	getUserWalletAddress(2,$this->session->userdata('user_Id'));
		$data['ltc_user_address']		=	getUserWalletAddress(3,$this->session->userdata('user_Id'));
		$data['dash_user_address']		=	getUserWalletAddress(4,$this->session->userdata('user_Id'));
		$data['user_tcoin']				=	getUserTcoins($this->session->userdata('user_Id'));
		
		$data['rowRateData']			=	$rowRateData	=	getTcoinRate();
		//echo"<pre>";
		//print_r($rowRateData); die();
		$this->load->view('account/header');
		$this->load->view('account/dashboard',$data);
		//$this->load->view('account/wallet_info',$data);
		$this->load->view('account/footer');
	}
}
