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

	public function message_insert_query($data)
	{
		$this->db->insert('messages',$data);
	}

	public function remove($message_id)
	{
		//needs to be tested.
			$sql = 'DELETE FROM messages WHERE message_id= ? ';
			$this->db->query($sql, array($message_id));
			$sql = 'DELETE FROM messages WHERE parent_message_id= ? ';
			$this->db->query($sql, array($message_id));
	}

}
//eof