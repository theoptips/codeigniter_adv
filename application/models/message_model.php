<?php
class Message_model extends CI_Model
{
	public function get_messages($user_id) //,$user_id
	{
		return $this->db->where('recipient_id',$user_id)
					->get('messages')
					->result();
	}

	// public function get_users_by_id($user_id)
	// {
	// 	return $this->db->where('user_id',$user_id)
	// 					->get('users')
	// 					->result();
	// }

	// public function get_all_messages()
	// {
	// 	return $this->db->get('users')
	// 					->result();
	// }

	// public function registration_query($data)
	// {
	// 	$this->db->insert('users',$data);
	// }
}
//eof