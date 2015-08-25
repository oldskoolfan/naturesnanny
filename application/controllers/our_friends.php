<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class our_friends extends MY_Controller {

	public function index()
	{
		parent::index();
		$this->load->view('pages/our-friends');
		parent::loadFooter();
	}
}