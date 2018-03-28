<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Affiliateterms extends CI_Controller {

	public function index()
	{
		$this->load->view('header_pre');
		$this->load->view('affiliateterms');
		$this->load->view('footer_pre');
	}
}
