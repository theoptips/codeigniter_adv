<?php
class Message_model extends CI_Model
{
	public function get_messages($user_id) //,$user_id
	{
		return $this->db->where('recipient_id',$user_id)
					->order_by("parent_message_id", "desc")
					->order_by("created_at", "desc")
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

	public function message_insert_query($data)
	{
		$this->db->insert('messages',$data);
	}
}
//eof