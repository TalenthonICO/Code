<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PersonalInfo extends CI_Controller {
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
		//$data	=	array();
		$data['userData']	=$this->personalinfo_model->getUserDetails();
		$data['investmentAmount']	=$this->personalinfo_model->getInvestmentAmount($this->session->userdata('user_Id'));
		$this->load->view('account/header');
		//$this->load->view('account/personalInfo', $data);
		$this->load->view('account/kyc_personal_info', $data);
		$this->load->view('account/footer');
	}
	public function upadte(){
		$first_name				=	$this->input->post('first_name');
		$last_name				=	$this->input->post('last_name');
		$dob					=	$this->input->post('dob');
		$company				=	$this->input->post('company');
		$phone					=	$this->input->post('phone');
		$notification_lang		=	@$this->input->post('notification_lang');
		$country_name			=	$this->input->post('country_name');
		$address_line1			=	$this->input->post('address_line1');
		$post_code				=	$this->input->post('post_code');
		$mailing_address		=	$this->input->post('mailing_address');
		$mailing_zip			=	$this->input->post('mailing_zip');
		$mailing_country		=	$this->input->post('mailing_country');
		$mailing_city			=	$this->input->post('mailing_city');
		$city_name			=	$this->input->post('city_name');
		$originalDate = $dob;
		$newDate = date("Y-m-d", strtotime($originalDate));
		$data	=	array(
			"first_name"		=>	$first_name,
			"last_name"			=>	$last_name,
			"dob"				=>	$originalDate,
			"company"			=>	$company,
			"phone"				=>	$phone,
			"notification_lang"	=>	$notification_lang,
			"country_name"		=>	$country_name,
			"address_line1"		=>	$address_line1,
			"post_code"			=>	$post_code,
			"city_name"			=>	$city_name,
			"mailing_address"	=>	$mailing_address,
			"mailing_zip"		=>	$mailing_zip,
			"mailing_country"	=>	$mailing_country,
			"mailing_city"		=>	$mailing_city
		);
		$this->utility->update("td_userprofile","user_Id",(int)$this->session->userdata('user_Id'),$data);
		$this->session->set_userdata('first_name', $first_name);
		$this->session->set_userdata('last_name', $last_name);
		$this->session->set_userdata('country_name', $country_name);
		$this->session->set_userdata('city_name', $city_name);
		$this->session->set_userdata('address_line1', $address_line1);
		$this->session->set_userdata('dob', $dob);
		$this->session->set_userdata('post_code', $post_code);
		$this->session->set_flashdata('flashSuccess',"Contact information successfully updated!");
		//$this->session->set_flashdata('flashFailure',LOGIN_IS_NOT_ACTIVE);
		redirect('account/personal-info');
		exit();
		//echo"Update Info";
		//die();
	}
	public function updateKyc(){
		$user_Id ="";
		$first_name				=	$this->input->post('first_name');
		$last_name				=	$this->input->post('last_name');
		$gender					=	$this->input->post('gender');
		$dob					=	$this->input->post('dob');
		$phone					=	$this->input->post('phone');
		$address_line1			=	$this->input->post('address_line1');
		$post_code				=	$this->input->post('post_code');
		$city_name				=	$this->input->post('city_name');
		$country_id				=	$this->input->post('country_id');
		$middle_name			=	$this->input->post('middle_name');
		$amount					=	$this->input->post('amount');
		$role_id				=	getUserRoleId($amount);
		$user_Id				=	$this->session->userdata('user_Id');
		
		$originalDate = $dob;
		$newDate = date("Y-m-d", strtotime($originalDate));
		
		$data	=	array(
			"first_name"		=>	$first_name,
			"last_name"			=>	$last_name,
			"gender"			=>	$gender,
			"dob"				=>	$newDate,
			"phone"				=>	$phone,
			"country_id"		=>	$country_id,
			"address_line1"		=>	$address_line1,
			"post_code"			=>	$post_code,
			"city_name"			=>	$city_name,
			"middle_name"		=>	$middle_name,
			"td_user_role_id"	=>	$role_id
		);
		$this->utility->update("td_userprofile","user_Id",(int)$this->session->userdata('user_Id'),$data);
		$investmentAmount		=$this->personalinfo_model->getInvestmentAmount($this->session->userdata('user_Id'));
		if($investmentAmount==0 and $amount>0){
			// Insert Investment amount 
			$dataInvestment	=	array(
				"user_Id"			=>	(int)$this->session->userdata('user_Id'),
				"role_id"			=>	$role_id,
				"amount"			=>	$amount,
				'ip_address'    	=>  $this->input->ip_address(),
				'curr_date'    		=>  date("Y-m-d H:i:s")
			);
			$insert  = $this->utility->insert('td_amount_investment',$dataInvestment);
			
			if($role_id	>	1){
				$updateStage 	= array('user_curr_stage'	=>	2);
				$this->session->set_userdata('user_curr_stage', 2);
			}elseif($role_id	==	1){
				$updateStage 	= array('user_curr_stage'	=>	3);
				$this->session->set_userdata('user_curr_stage', 3);
			}
			$this->utility->update('td_userprofile','user_Id', $user_Id , $updateStage);
			
		}else{
			// Update Investment amount 
			$updateInvestment	=	array(
				"role_id"			=>	$role_id,
				"amount"			=>	$amount,
				'ip_address'    	=>  $this->input->ip_address(),
				'curr_date'    		=>  date("Y-m-d H:i:s")
			);
			
			$wCondArr	=	array(
				"user_Id"			=>	(int)$this->session->userdata('user_Id')
			);
			
			
			//isDocumentStatusTrue($user_id)
			$isDocTrue	=	isDocumentStatusTrue($this->session->userdata('user_Id'));
			if($role_id	>	1 and $isDocTrue===false){
				$updateStage 	= array('user_curr_stage'	=>	2);
				$this->session->set_userdata('user_curr_stage', 2);
			}elseif($role_id	==	1){
				$updateStage 	= array('user_curr_stage'	=>	3);
				$this->session->set_userdata('user_curr_stage', 3);
			}elseif($isDocTrue	===	true){
				$updateStage 	= array('user_curr_stage'	=>	5);
				$this->session->set_userdata('user_curr_stage', 5);
			}
			$this->utility->update('td_userprofile','user_Id', $user_Id , $updateStage);
			
			$update  =$this->utility->updateMultiValues("td_amount_investment",$wCondArr,$updateInvestment);

		}
		$this->session->set_userdata('first_name', $first_name);
		$this->session->set_userdata('td_user_role_id', $role_id);
		$this->session->set_userdata('middle_name', $middle_name);
		$this->session->set_userdata('last_name', $last_name);
		$this->session->set_userdata('country_id', $country_id);
		$this->session->set_userdata('city_name', $city_name);
		$this->session->set_userdata('address_line1', $address_line1);
		$this->session->set_userdata('dob', $dob);
		$this->session->set_userdata('post_code', $post_code);
		$this->session->set_userdata('td_user_role_id', $role_id);
		//$this->session->set_flashdata('flashSuccess',"Your details are submitted for KYC verification. We will notify you shortly!");
		//echo $role_id; die();
		
		

		if($role_id	==1	){  

					$userUpdate 	= array('document_status'	=>	7);
					$this->utility->update('td_userprofile','user_Id', $user_Id , $userUpdate);

			redirect('account/walletInfo');
			exit();
		}else{
		
			
				/*$updateQuery= "";
				$docStatus =false;
				$docStatus = isKycDocuments($user_Id);
				if($role_id ==2)
				{
					if($docStatus ==true){
							$userUpdate 	= array('document_status'	=>	4);
							$this->utility->update('td_userprofile','user_Id', $user_Id , $userUpdate);
							
					}else if($docStatus ==false){
							$userUpdate 	= array('document_status'	=>	5);
							$this->utility->update('td_userprofile','user_Id', $user_Id , $userUpdate);
						
					}	
				}	*/				
									//echo "TEst"; die();
			redirect('account/documents');
			exit();
		}
		
		
	}
}