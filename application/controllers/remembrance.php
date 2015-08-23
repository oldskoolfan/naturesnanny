<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Remembrance extends MY_Controller {

	public function index()
	{
		parent::index();
		$this->load->view('pages/remembrance');
		parent::loadFooter();
	}
}