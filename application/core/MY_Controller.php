<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	private $navLinks = [];
	private $uriString = null;

	function __construct() {
		parent::__construct();
		$navLinks = [];
		array_push($navLinks, ["label" => "home", "link" => './']);
		array_push($navLinks, ["label" => "services", "link" => './services']);
		array_push($navLinks, ["label" => "policies", "link" => './policies']);
		array_push($navLinks, ["label" => "pricing", "link" => './pricing']);
		array_push($navLinks, ["label" => "testimonials", "link" => './testimonials']);
		array_push($navLinks, ["label" => "our friends", "link" => './our-friends']);
		array_push($navLinks, ["label" => "remembrance", "link" => './remembrance']);
		array_push($navLinks, ["label" => "client form", "link" => './client-form']);
		array_push($navLinks, ["label" => "contact", "link" => './contact']);
		
		$uriString = $this->getUriString();
		$newLinks = [];
		foreach ($navLinks as $link) {
			$link['isActive'] = $uriString == substr($link['link'], 2);
			array_push($newLinks, $link);
		}
		$this->navLinks = $newLinks;
		$this->uriString = $uriString;
	}

	protected function index() {
		$this->load->view('header');
		$this->load->view(
			'nav', 
			["navLinks" => $this->navLinks, "uriString" => $this->uriString]);
	}

	protected function loadFooter() {
		$this->load->view('footer');
	}

	private function getUriString() {
		if (strpos(uri_string(), '/') !== false)
			return substr(uri_string(), 0, strpos(uri_string(), '/'));
		else
			return uri_string();
	}
}