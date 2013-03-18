<?php
class User_model extends CI_Model
{
	// $email is the parameter
	public function get_users($email,$user_id)
	{
		// // best practice check validity of data
		// // var dump successful http://localhost:8888/index.php/user/show_users
		// var_dump($email); die();
		return $this->db->where('email',$email)
					->where('id',$user_id)
					->get('users')
					->result();
	}
}

//eof