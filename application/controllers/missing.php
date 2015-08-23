<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Missing extends MY_Controller {

	public function index()
	{
		parent::index();
		$this->load->view('404-omg');
		parent::loadFooter();
	}
}