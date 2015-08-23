<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ClientForm extends MY_Controller {

	public function index()
	{
		parent::index();
		$this->load->view('pages/client-form');
		parent::loadFooter();
	}
}