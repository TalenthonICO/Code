<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class KycStatus extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('account/personalinfo_model');
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
	}
	public function index(){
		$this->load->view('account/header');
		$this->load->view('account/kyc_status'); 
		$this->load->view('account/footer');
	}
	
}
