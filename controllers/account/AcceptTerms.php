<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AcceptTerms extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		
		$user_Id	=	$this->session->userdata('user_Id');
		if(!isset($user_Id)){
			redirect('logout');
			exit();
		}
	}

	public function index()
	{
		$this->load->view('account/accept_terms');
	}
	public function updateTerms()
	{
		$data	=	array("terms"=>1);
		$this->utility->update("td_userprofile","user_Id",(int)$this->session->userdata('user_Id'),$data);
		redirect('account/dashboard');
		exit();
	}
}
