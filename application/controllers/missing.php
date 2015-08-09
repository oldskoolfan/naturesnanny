<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Missing extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('404-omg');
		$this->load->view('footer');
	}
}