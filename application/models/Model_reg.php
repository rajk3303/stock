<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

setcookie('test', 45, time() + (60 * 60 * 24 * 7));
// Load Composer's autoloader
require 'vendor/autoload.php';
class Model_reg extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* 
		This function checks if the email exists in the database
	*/
	public function check_email($email)
	{
		if ($email) {
			$sql = 'SELECT * FROM users WHERE email = ?';
			$query = $this->db->query($sql, array($email));
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}

		return false;
	}

	public function getUserData($userId = null)
	{
		if ($userId) {
			$sql = "SELECT * FROM users WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM users WHERE id != ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getUserGroup($userId = null)
	{
		if ($userId) {
			$sql = "SELECT * FROM user_group WHERE user_id = ?";
			$query = $this->db->query($sql, array($userId));
			$result = $query->row_array();

			$group_id = $result['group_id'];
			$g_sql = "SELECT * FROM groups WHERE id = ?";
			$g_query = $this->db->query($g_sql, array($group_id));
			$q_result = $g_query->row_array();
			return $q_result;
		}
	}

	public function create($data = '', $group_id = '')
	{

		if ($data) {
			$create = $this->db->insert('users', $data);

			$user_id = $this->db->insert_id();

			$group_data = array(
				'user_id' => $user_id,
				'group_id' => $group_id
			);

			$group_data = $this->db->insert('user_group', $group_data);

			return ($create == true && $group_data) ? true : false;
		}
	}
	/**
	 * ForgotPasswordEmailCheck
	 *
	 * @param  mixed $email
	 *
	 * @return void
	 */
	public function ForgotPasswordEmailCheck($email)
	{
		$this->db->select('email');
		$this->db->from('users');
		$this->db->where('email', $email);
		$query = $this->db->get();
		return $query->row_array();
	}
	/**
	 * sendpassword
	 *
	 * Model function for create randome password and send email on registered email
	 * 
	 * @param  mixed $data
	 *
	 * @return void
	 */
	public function sendpassword($data)
	{
		$email = $data['email'];
		$query1 = $this->db->query("SELECT *  from users where email = '" . $email . "' ");
		$row = $query1->result_array();
		if ($query1->num_rows() > 0) {
			$passwordplain = "";
			$passwordplain  = rand(999999999, 9999999999);
			$newpass['password'] = $this->password_hash($passwordplain);
			$this->db->where('email', $email);
			$this->db->update('users', $newpass);
			$mail_message = 'Dear ' . $row[0]['firstname'] . ' ' . $row[0]['lastname'] . ',' . "\r\n";
			$mail_message .= 'Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>' . $passwordplain . '</b>' . "\r\n";
			$mail_message .= '<br>Please Update your password.';
			$mail_message .= '<br>Thanks & Regards';
			$mail_message .= '<br>Simplentory';

			$mail = new PHPMailer(true);
			try {
				$mail->SMTPDebug = 0;     // Enable verbose debug output
				$mail->isSMTP();     // Set mailer to use SMTP
				$mail->Host       = $this->config->item('MAIL_HOST');  // Specify main and backup SMTP servers
				$mail->SMTPAuth   = true;    // Enable SMTP authentication
				$mail->Username   = $this->config->item('MAIL_USERNAME');    // SMTP username
				$mail->Password   = $this->config->item('MAIL_PASSWORD');   // SMTP password
				$mail->SMTPSecure = $this->config->item('MAIL_ENCRYPTION'); // Enable TLS encryption, `ssl` also accepted
				$mail->Port       = $this->config->item('MAIL_PORT');
				$subject = 'Forgot Password';
				$mail->SingleTo = true;
				$mail->AddAddress($email);
				$mail->From = 'arghyac35@gmail.com';
				$mail->FromName = $this->config->item('MAIL_FROM_NAME');
				$mail->IsHTML(true);
				$mail->Subject = $subject;
				$mail->Body    = $mail_message;
				$mail->Send();
				return (!$mail->send()) ? false : true;
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		} else {
			return false;
		}
	}

	public function password_hash($pass = '')
	{
		if ($pass) {
			return password_hash($pass, PASSWORD_DEFAULT);
		}
	}
}
