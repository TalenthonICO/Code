<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$aid	=	$this->input->get('aid');
		if(isset($aid) and $aid!=""){
			$isTrue	=	isValidAffilationId($aid);
			if($isTrue===true){
				redirect('register');
				exit();
			}
		}
	}
	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
}
