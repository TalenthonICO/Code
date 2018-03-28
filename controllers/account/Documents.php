<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Documents extends CI_Controller {
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
			$this->load->model("account/personalinfo_model");
			$investmentAmount  =$this->personalinfo_model->getInvestmentAmount($this->session->userdata('user_Id'));
			if($investmentAmount<=0){
				redirect('account/personal-info');
				exit();
			}
			
			$td_user_role_id	=	$this->session->userdata('td_user_role_id');
			$user_Id			=	$this->session->userdata('user_Id');
			
			$isDocTrue			=	isDocumentStatusTrue($this->session->userdata('user_Id'));
			//echo $td_user_role_id;
			//echo $isDocTrue; die(); 
			if($td_user_role_id	>	1 and $isDocTrue===true){
				//$isKycDocuments		=	isKycDocuments($this->session->userdata('user_Id'));
				//if($isKycDocuments===true){
					//$updateStage 	= array('user_curr_stage'	=>	2);
					//$this->session->set_userdata('user_curr_stage', 2);
					//$this->utility->update('td_userprofile','user_Id', $user_Id , $updateStage);
					//redirect('account');
					//exit();
				//}
			}
			
			$isPersonalInfoTrue	=	checkPersonalInfoFields($this->session->userdata('user_Id'));
			//$isKycDocuments		=	isKycDocuments($this->session->userdata('user_Id'));
			$is_kyc_approved		=	$this->session->userdata('is_kyc_approved');
			if($isPersonalInfoTrue==false and $is_kyc_approved=="No"	){
				redirect('account/personal-info');
				exit();
			}
		}
		public function index(){
			$data = array();
			//$data['kycDocumentList']   = getKYCDocument($this->session->userdata('user_Id'));
			//$data['kycDocumentNumrow'] = getDocumentNumrowByDocIdAndUserId($this->session->userdata('user_Id'));
			//$data['kycDocumentStatus'] = getDocumentStatusByUserId($this->session->userdata('user_Id'));

			$data['investmentAmount']  	=$this->personalinfo_model->getInvestmentAmount($this->session->userdata('user_Id'));
			$data['kycDocumentList']   	= getInvesterCKYDocument($this->session->userdata('user_Id')); 
			$data['sourceWealth']   	= getAllSourceWealth();
			$this->load->view('account/header');
			$this->load->view('account/documents', $data);
			$this->load->view('account/footer');
		}
		public function upload()
		{
			//echo "call"; exit; 
			$data	=	array();
			if($_FILES["file"]["name"] != '')
			{
				$test = explode('.', $_FILES["file"]["name"]);
				$ext = end($test);
				//if($ext=="PDF" || $ext =="pdf" || $ext== "PNG" || $ext =="png" || $ext == "")
				//$name = $this->session->userdata('user_Id').'_'.rand(100, 999) . '.' . $ext;
				$name = $this->session->userdata('user_Id').'_'.strtotime(date("Y-m-d H:i:s")) . '.' . $ext;
				$location = 'upload/document/' . $name;  
				move_uploaded_file($_FILES["file"]["tmp_name"], $location);
				$docArr = array(    
				'user_id'  				=> $this->session->userdata('user_Id') ,
				'document_name'  		=> $name,
				'document_size'  		=> $_FILES["file"]["size"],
				'file_extension'  		=> $ext,
				'document_rel'  		=> $location,
				'document_abs'  		=> base_url($location),
				'ip_address'  			=> $this->utility->getIP(),
				'created_at'  			=> date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME'])
				);  
				//echo '<pre>'; print_r($docArr); exit; 
				$insert  = $this->utility->insert('td_kyc_document',$docArr);
				getDocumentStatus($this->session->userdata('user_Id'), 0);
				$data['document_abs']		=	@base_url($location);
				$data['file_extension']	    =	@$ext;
				if($data['file_extension']=='pdf' || $data['file_extension']=='PDF' )
				{
					echo '
					<a href="'.base_url('account/documents/viewRec/'.$insert).'" class="user-file-preview w-100 b-15" target="_blank">
					<object data="'.@$data['document_abs'].'" type="application/pdf" width="100%" height="100%">
					</object>
					</a>
					';		
				}
				else
				{			
					echo '
					<a href="'.base_url('account/documents/viewRec/'.$insert).'" class="user-file-preview w-100 b-15" target="_blank">
					<img src="'.$data['document_abs'].'" height="100" width="100" class="img-thumbnail" />
					</a>
					';
				}
				//$this->load->view('account/documents_upload', $data);
				//echo 1;
				exit;
				//exit;
			}
		}
		public function docUpload()
		{
			//echo '<pre>'; print_r($_FILES); exit; 
			$passport_file_extension  = $passport_name = $passport_rel = $passport_abs = $passport_size =  "";
			$photographic_name  		= $photographic_file_extension = $photographic_rel = $photographic_abs = $photographic_size  = $passport_number =   $passport_exp_date =  $passport_iss_country_id =  $photographic_number =  $photographic_exp_date =  $photographic_iss_country_id = $verifiable =  "";
			if(!empty($_FILES["passport"]["name"]))
			{
				$passport_number 					= $this->input->post('passport_number',TRUE);
				$passport_exp_date1 					= $this->input->post('passport_exp_date',TRUE);
				$passport_iss_country_id 			= $this->input->post('passport_iss_country_id',TRUE);
				
				$passport_exp_date = date("Y-m-d", strtotime($passport_exp_date1));
				
				$test 						= explode('.', $_FILES["passport"]["name"]);
				$passport_file_extension 	= end($test);
				$passport_name 				= $this->session->userdata('user_Id').'_'.strtotime(date("Y-m-d H:i:s")) . '.' . $passport_file_extension;
				$passport_rel 				= 'upload/document/passport/' . $passport_name;  
				$passport_abs 				= base_url($passport_rel);
				$passport_size              = @$_FILES["passport"]["size"];
				move_uploaded_file($_FILES["passport"]["tmp_name"], $passport_rel);
			}
			if(!empty($_FILES["photographic"]["name"]))	
			{
				$photographic_number 					= $this->input->post('photographic_number',TRUE);
				$photographic_exp_date1 				= $this->input->post('photographic_exp_date',TRUE);
				$photographic_iss_country_id 			= $this->input->post('photographic_iss_country_id',TRUE);
				
				//$originalDate = $photographic_exp_date;
				
				if (empty($photographic_exp_date1))
				{      
				  $photographic_exp_date = 'NULL';
				}
				else
				{
				   $photographic_exp_date = date("Y-m-d", strtotime($photographic_exp_date1));
				}
				
				
				$test = explode('.', $_FILES["photographic"]["name"]);
				$photographic_file_extension = end($test);
				$photographic_name = $this->session->userdata('user_Id').'_'.strtotime(date("Y-m-d H:i:s")) . '.' . $photographic_file_extension;
				$photographic_rel = 'upload/document/photographic/' . $photographic_name;  
				$photographic_size = @$_FILES["photographic"]["size"];
				$photographic_abs 				=  base_url($photographic_rel);
				$photographic_size              = @$_FILES["photographic"]["size"];
				move_uploaded_file($_FILES["photographic"]["tmp_name"], $photographic_rel);
			}
			$verifiable 					= $this->input->post('verifiable',TRUE);
			$kycDocumentList   = getInvesterCKYDocument($this->session->userdata('user_Id')); 
			if(!empty($kycDocumentList->document_id) && @$kycDocumentList->document_id >0)
			{
				if(!empty($passport_name))
				{
					$update  = 
								array(
										'passport_name'  			=> $passport_name,
										'passport_size'  			=> $passport_size , 
										'passport_file_extension'  	=> $passport_file_extension,
										'passport_rel'  			=> $passport_rel,
										'passport_abs'  			=> $passport_abs, 
										'passport_status'  			=> 0,
										'passport_number'  			=> $passport_number,
										'passport_exp_date'  		=> $passport_exp_date,
										'verifiable'  				=> $verifiable,
										'passport_iss_country_id'	=> $passport_iss_country_id
								);
					$this->utility->update('td_kyc_invester_document','document_id', $kycDocumentList->document_id , $update);
				}	
				if(!empty($photographic_name))
				{
					$update  = 
							array(
									'photographic_name'  			=> $photographic_name,
									'photographic_size'  			=> $photographic_size, 
									'photographic_file_extension'  	=> $photographic_file_extension,
									'photographic_rel'  			=> $photographic_rel,
									'photographic_abs'  			=> $photographic_abs,
									'photographic_status'  			=> 0,
									'photographic_number'  			=> $photographic_number,
									'photographic_exp_date'  		=> $photographic_exp_date,
									'verifiable'  					=> $verifiable,
									'photographic_iss_country_id'	=> $photographic_iss_country_id
							);
					$this->utility->update('td_kyc_invester_document','document_id', $kycDocumentList->document_id , $update);
				}
				
				// Upload Document History
				$docHis = array(    
					'user_id'  						=> $this->session->userdata('user_Id') ,
					'document_id'  					=> $kycDocumentList->document_id ,
					'passport_rel'  				=> $passport_rel,
					'photographic_rel'  			=> $photographic_rel,
					'passport_number'  				=> $passport_number,
					'passport_exp_date'  			=> $passport_exp_date,
					'passport_iss_country_id'		=> $passport_iss_country_id,
					'passport_status'				=> 0,
					'photographic_number'  			=> $photographic_number,
					'photographic_exp_date'  		=> $photographic_exp_date,
					'photographic_iss_country_id'	=> $photographic_iss_country_id,
					'photographic_status'			=> 0,
					'ip_address'  					=> $this->utility->getIP(),
					'created_at'  					=> date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME'])
				);  
				$insert  = $this->utility->insert('td_kyc_doc_history',$docHis);
				
			}
			else
			{
				$docArr = array(    
				'user_id'  						=> $this->session->userdata('user_Id') ,
				'passport_name'  				=> $passport_name,
				'passport_size'  				=> $passport_size , 
				'passport_file_extension'  		=> $passport_file_extension,
				'passport_rel'  				=> $passport_rel,
				'passport_abs'  				=> $passport_abs, 
				'photographic_name'  			=> $photographic_name,
				'photographic_size'  			=> $photographic_size, 
				'photographic_file_extension'  	=> $photographic_file_extension,
				'photographic_rel'  			=> $photographic_rel,
				'photographic_abs'  			=> $photographic_abs,
				'verifiable'  					=> $verifiable,
				'passport_number'  				=> $passport_number,
				'passport_exp_date'  			=> $passport_exp_date,
				'passport_iss_country_id'		=> $passport_iss_country_id,
				'photographic_number'  			=> $photographic_number,
				'photographic_exp_date'  		=> $photographic_exp_date,
				'photographic_iss_country_id'	=> $photographic_iss_country_id,
				'photographic_status'			=> 0,
				'passport_status'				=> 0,
				'ip_address'  				=> $this->utility->getIP(),
				'created_at'  				=> date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME'])
				);  
				$document_id  = $this->utility->insert('td_kyc_invester_document',$docArr);	
				
				// Upload Document History
				$docHis = array(    
					'user_id'  						=> $this->session->userdata('user_Id') ,
					'document_id'  					=> $document_id ,
					'passport_rel'  				=> $passport_rel,
					'photographic_rel'  			=> $photographic_rel,
					'passport_number'  				=> $passport_number,
					'passport_exp_date'  			=> $passport_exp_date,
					'passport_iss_country_id'		=> $passport_iss_country_id,
					'passport_status'				=> 0,
					'photographic_number'  			=> $photographic_number,
					'photographic_exp_date'  		=> $photographic_exp_date,
					'photographic_iss_country_id'	=> $photographic_iss_country_id,
					'photographic_status'			=> 0,
					'ip_address'  					=> $this->utility->getIP(),
					'created_at'  					=> date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME'])
				);  
				$insert  = $this->utility->insert('td_kyc_doc_history',$docHis);
				
						$email					=	$this->session->userdata('email');
						$first_name				=	$this->session->userdata('first_name');
						$eTempDetails			=	getEmailTemplate("TALENTHON_KYC_DOCUMENT_SUBMIT");
						$mailTo				 	=	@$email;
						$subject   				=	$eTempDetails->template_subject;
						$templateMessage		=	$eTempDetails->template_description;
						$templateMessage  		=	str_replace('[{URSER_NAME}]', @$first_name, $templateMessage);
						//$templateMessage  		=	str_replace('[{COMMENT}]', @$doc_comment, $templateMessage);
						sendEmail($subject, $templateMessage, $mailTo, "", "", ADMIN_EMAIL_ADDRESS_REVERTBACK, FROM_NAME_NOREPLY);	
						
						$userDetail				=   getUserAllDetail($this->session->userdata('user_Id'));
						$amount 				=   $phone = ""; 
						$phone 					=	@$userDetail->phone;
						
						$amount 				=   '$'.getInvestmentAmountByUserId($this->session->userdata('user_Id'));
						$eTempDetails			=	getEmailTemplate("TALENTHON_KYC_DOCUMENT_UPLOADED_ADMIN_NOTIFICATION");
						$mailTo				 	=	ADMIN_EMAIL_ADDRESS;
						$subject   				=	$eTempDetails->template_subject;
						$subject  				=	str_replace('[{URSER_NAME}]',$first_name, $subject);
						
						$templateMessage		=	$eTempDetails->template_description;
						$templateMessage  		=	str_replace('[{URSER_NAME}]',$first_name, $templateMessage);
						$templateMessage  		=	str_replace('[{EMAIL}]', $email, $templateMessage);
						$templateMessage  		=	str_replace('[{AMOUNT}]', $amount, $templateMessage);
						$templateMessage  		=	str_replace('[{PHONE}]', $phone, $templateMessage);
						
						
						sendEmail($subject, $templateMessage, ADMIN_EMAIL_ADDRESS, ADMIN_CC_EMAIL_KYC_DOCUMENT, "", FROM_EMAIL_NOREPLY, FROM_NAME_NOREPLY);
						
			
				
			}	
			
			$docStatus =false;
			$user_Id = $td_user_role_id = "";
			$user_Id = $this->session->userdata('user_Id');
			$td_user_role_id = $this->session->userdata('td_user_role_id');
			if($td_user_role_id	==1	){  
					$userUpdate 	= array('document_status'	=>	7);
					$this->utility->update('td_userprofile','user_Id', $user_Id , $userUpdate);
			}	
			
			$docStatus = isKycDocuments($user_Id);
			if($td_user_role_id ==2)
			{
				if($docStatus ==true){
						$userUpdate 	= array('document_status'	=>	4);
						$this->utility->update('td_userprofile','user_Id', $user_Id , $userUpdate);
						
				}else if($docStatus ==false){
						$userUpdate 	= array('document_status'	=>	5);
						$this->utility->update('td_userprofile','user_Id', $user_Id , $userUpdate);
					
				}	
			}	
			
			$updateStage 	= array('user_curr_stage'	=>	3);
			$this->session->set_userdata('user_curr_stage', 3);
			$this->utility->update('td_userprofile','user_Id', $this->session->userdata('user_Id') , $updateStage);
			
			/*$docStatus	 	=	false;
			$docStatus 		= 	isKycDocuments($user_Id);
			if($td_user_role_id ==2)
			{
				if($docStatus ==true){
					$userUpdate 	= array('document_status'	=>	4);
					$this->utility->update('td_userprofile','user_Id', $user_Id , $userUpdate);
				}else if($docStatus ==false){
					$userUpdate 	= array('document_status'	=>	5);
					$this->utility->update('td_userprofile','user_Id', $user_Id , $userUpdate);
				}	
			}*/	
				
			//echo '<pre>'; print_r($docArr); exit; 
			//$this->session->set_flashdata('flashSuccess', 'KYC document successfully updated!');	
			redirect('account/walletInfo/');	
		}
		public function viewRec()
		{
			$data		=	array();
			$user_id 	= $this->session->userdata('user_Id');	
			$uri_params = $this->uri->uri_to_assoc(3);
			if(array_key_exists('viewRec',$uri_params))
			{
				if($uri_params['viewRec']!='')
				{
					$document_id = (int)$uri_params['viewRec'];
					$docArr = getDocumentByDocIdAndUserId($document_id, $user_id);
					if(@$docArr->document_id>0 )
					{
						$data['doc'] = $docArr;
						//$this->load->view('account/header');
						$this->load->view('account/viewRec', $data);
						//$this->load->view('account/footer');
					}
					else
					{
						$textUrl				=	'Sorry! You tried to access invalid documents.';
						$this->session->set_flashdata('flashFailure', $textUrl);	
						redirect('account/documents');		
					}
				}
				else
				{
					$textUrl				=	'Sorry! You tried to access invalid documents.';
					$this->session->set_flashdata('flashFailure', $textUrl);	
					redirect('account/documents');
				}
			}
			else
			{
				$textUrl				=	'Sorry! You tried to access invalid documents.';
				$this->session->set_flashdata('flashFailure', $textUrl);	
				redirect('account/documents');
			}
		}
	}	