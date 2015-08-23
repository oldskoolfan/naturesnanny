<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pricing extends MY_Controller {

	public function index()
	{
		parent::index();
		$this->load->view('pages/pricing');
		parent::loadFooter();
	}
}