<?php
class User_model extends CI_Model
{
	public function get_users($email) //,$user_id
	{
		// // best practice check validity of data
		// // var dump successful http://localhost:8888/index.php/user/show_users
		// var_dump($email); die();
		return $this->db->where('email',$email)
					// ->where('id',$user_id)
					->get('users')
					->result();
	
	


	}

	// testing user model
	public function get_all_users()
	{
		return $this->db->get('users')
						->result();

	}

	public function registration_query($data)
	{
		// need to organize data into arrays, how to pass data between controller and model?
		$this->db->insert('users',$data);
	}

	// row() only works for query() class
	// public function get_user_by_query()
	// {
	// 	$query = $this->db->query("SELECT * FROM users where email = 'john@yahoo.com'");
	// 	$row = $query->row();
	// 	var_dump($row);
	// 	die();

	// }


}

//eof