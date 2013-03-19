<?php
class User_model extends CI_Model
{
	public function get_users($email) //,$user_id
	{
		return $this->db->where('email',$email)
					->get('users')
					->result();
	}

	public function get_all_users()
	{
		return $this->db->get('users')
						->result();
	}

	public function registration_query($data)
	{
		$this->db->insert('users',$data);
	}
}
//eof