<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class client_form extends MY_Controller {

	public function index()
	{
		parent::index();
		$this->load->view('pages/client-form');
		parent::loadFooter();
	}

	public function submit()
	{
		parent::index();
		$this->load->library('upload');
		var_dump($this->upload);
		$this->load->view('pages/client-form-submit');
		parent::loadFooter();
	}
}