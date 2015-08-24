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
		$this->load->view('pages/contact');
		parent::loadFooter();
	}
	public function sendmail() {
		$email = $this->input->post('email');
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$body = $this->input->post('body');

		require APPPATH . "third_party/PHPMailer/PHPMailerAutoload.php";

		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->Username = "harris.1305@gmail.com";
		$mail->Password = "qclgshkq:28";
		$mail->SMTPSecure = "ssl";
		$mail->Port = 465;

		$mail->From = $email;
		$mail->FromName = "$firstname $lastname";
		$mail->addReplyTo($email);
		$mail->addAddress("andrew.harris@workstate.com");
		$mail->Subject = "New Contact Submission";
		$mail->Body = $body;

		$mailSent = $mail->send();
		redirect('/contact?success=' . var_export($mailSent, true));
	}
}






