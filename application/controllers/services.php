<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Services extends MY_Controller {

	public function index()
	{
		parent::index();
		$this->load->view('pages/services');
		parent::loadFooter();
	}
}