<?php
class User_model extends CI_Model
{
	public function get_users($email) //,$user_id
	{
		return $this->db->where('email',$email)
					->get('users')
					->result();
	}

	public function get_users_by_id($user_id)
	{
		return $this->db->where('user_id',$user_id)
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

	public function user_user_id()
	{
		return $this->db->select('user_id, firstname, lastname')
						->get('users')
						->result();
	}

	public function remove($user_id="")
	{
		//needs to be tested.
			$sql = 'DELETE FROM users WHERE user_id= ? ';
			$this->db->query($sql, array($user_id));
	}

}
//eof