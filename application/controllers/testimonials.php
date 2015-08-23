<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Testimonials extends MY_Controller {
	public function index() {
		parent::index();
		$this->load->view('pages/testimonials');
		parent::loadFooter();
	}
}