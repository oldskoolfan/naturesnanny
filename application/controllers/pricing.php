<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pricing extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('pages/pricing');
		$this->load->view('footer');
	}
}