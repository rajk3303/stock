<?php 

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
		if($email) {
			$sql = 'SELECT * FROM users WHERE email = ?';
			$query = $this->db->query($sql, array($email));
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}

		return false;
	}

	public function getUserData($userId = null) 
	{
		if($userId) {
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
		if($userId) {
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

	public function create($data = '')
	{

		if($data) {
			$create = $this->db->insert('users', $data);

			$user_id = $this->db->insert_id();

			$group_data = array(
				'user_id' => $user_id,
				// 'group_id' => "SELECT id from groups WHERE group_name= 'Users' "
				'group_id' => '2'
			);

			$group_data = $this->db->insert('user_group', $group_data);

			return ($create == true && $group_data) ? true : false;
		}
	}
 


}
