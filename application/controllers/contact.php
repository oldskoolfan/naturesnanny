<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {
	public function index() {
		parent::index();
		$this->load->view('pages/contact');
		if (isset($_GET['success'])) {
			$success = $_GET['success'] == "true";
			if ($success) {
				echo '<script>alert("Message sent successfully!")</script>';
			} else {
				echo '<script>alert("There was a problem sending ' . 
					'your message.")</script>';
			}
		}
		parent::loadFooter();
	}
	public function sendmail() {
		$path = '/home/andrew/.pswd_smtp';	
		$handler = fopen($path, 'r');
		$pass = fread($handler, filesize($path));
		fclose($handler);
		$email = $this->input->post('email');
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$body = $this->input->post('body');

		require APPPATH . "third_party/PHPMailer/PHPMailerAutoload.php";

		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->Username = "harris.1305.autobot@gmail.com";
		$mail->Password = $pass;
		$mail->SMTPSecure = "ssl";
		$mail->Port = 465;

		$mail->From = $email;
		$mail->FromName = "$firstname $lastname";
		$mail->addReplyTo($email);
		$mail->addAddress("naturesnanny@columbus.rr.com");
		$mail->Subject = "New Contact Submission";
		$mail->Body = $body;

		$mailSent = $mail->send();
		redirect('/contact?success=' . var_export($mailSent, true));
	}
}






