<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {
	public function index() {
		if (isset($_GET['success'])) {
			$success = $_GET['success'] == "true";
			if ($success) {
				echo '<script>alert("Message sent successfully!")</script>';
			} else {
				echo '<script>alert("There was a problem sending ' . 
					'your message.")</script>';
			}
		}
		parent::index();
		//$this->load->view('header');
		//$this->load->view('nav');
		$this->load->view('pages/contact');
		//$this->load->view('footer');
		parent::loadFooter();
	}
	public function sendmail() {
		$email = $this->input->post('email');
		$body = $this->input->post('body');

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.gmail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'harris.1305@gmail.com';
		$config['smtp_pass'] = 'qclgshkq:28';
		$config['smtp_crypto'] = 'ssl';
		$config['smtp_keepalive'] = true;
		$config['validate'] = true;

		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->from($email, 'Contact Form');
		$this->email->to('aharri10@cscc.edu');
		$this->email->subject('Test Email');
		$this->email->message($body);

		$mailSent = $this->email->send();

		//if ($mailSent) echo 'success';
		//else echo 'failure';
		redirect('/contact?success=' . var_export($mailSent, true));
	}
}