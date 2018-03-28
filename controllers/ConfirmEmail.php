<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*####################################################################################
	Action      : Abu Baker
	Purpose    	: 
	Created  	: 21-Feb-2018
	Author   	: Abu	
//#####################################################################################*/

	class ConfirmEmail extends CI_Controller {  

		public function __construct(){

			parent::__construct();
			$this->load->library('session');
			$this->load->model("login_model");
			
				$user_Id = $this->session->userdata('user_Id');
				if(isset($user_Id)){
					redirect('account/dashboard');
					exit();
				}
   
				$this->session->set_flashdata('flashSuccess', "");
				$this->session->set_flashdata('flashFailure', "");
		}

		

		public function index()
		{
			
			$data = array();
			$userId					=	$access_token	 = "";
			$userId					=	@$this->uri->segment(3); //Direct Login With Confirm Token
			
			$access_token			=	@$this->uri->segment(5); //Direct Login With Confirm Token
			
			$isValidateEmail		=	$this->login_model->getUserDetailsByIdandAccessToken($userId, $access_token);
			$data['classname']		=  "alert-success";
			if($isValidateEmail['status']==0 && $isValidateEmail['user_Id'] >0)
			{
				$this->session->set_flashdata('flashSuccess', 'Your email address has been confirmed!');
				$update  = 
									array(
												'status'			=>	1,
												'updated_at'	=>	date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME'])
												
										  );
				$this->utility->update('td_userprofile','user_Id', $isValidateEmail['user_Id'] , $update);		
				
				
			}
			else if($isValidateEmail['status']==1 && $isValidateEmail['user_Id'] >0)
			{
				$textUrl	=	'Your email was successfully activated already. Please <a href="'.base_url('login').'">log in</a>.';
				$this->session->set_flashdata('flashSuccess', $textUrl);
			}
			else
			{
				$data['classname']		=  "alert alert-danger text-center";
				$textUrl				=	'Your link has been expired!';
				$this->session->set_flashdata('flashFailure', $textUrl);	
			}
					
			//echo '<pre>'; print_r($isValidateEmail); exit; 		
			
			
			$this->load->view('header_pre');
			$this->load->view('confirmEmail',$data);
			$this->load->view('footer_pre');

		}

		

		
		

		

	} 	