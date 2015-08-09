<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('pages/home');
		$this->load->view('footer');
	}
}