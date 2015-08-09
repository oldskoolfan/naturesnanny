<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('pages/services');
		$this->load->view('footer');
	}
}