<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OurFriends extends MY_Controller {

	public function index()
	{
		parent::index();
		$this->load->view('pages/our-friends');
		parent::loadFooter();
	}
}