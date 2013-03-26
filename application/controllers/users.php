<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('handler.php');

class Users extends Handler 
{
	protected $user_info = array();

	public function newuser()
	{
		$this->load->view('newuser');
	}

	public function show($user_id="")
	{
		// $this->output->enable_profiler(TRUE);
		$this->load->model('Message_model');
		$this->user_info["wall_user_id"] = $user_id;
		$message_data_set = $this->Message_model->get_messages($user_id);
		$this->user_info["message_data_set"] = $message_data_set;
		$this->session->set_userdata('last_page', current_url());
		// var_dump($this->session->userdata);
		$this->load->view('wall',$this->user_info);
	}

	public function edit()
	{
		$this->load->view('edit_user');
	}
	
	public function edit_user($user_id="")
	{
		$this->user_info["edit_value"] = $this->User_model->get_users_by_id($user_id);
		$this->load->helper('date');

		if($this->input->post() and !empty($this->input->post()["edit_email"]))
		{
			$post_email = $this->input->post()["edit_email"];
			$post_firstname = $this->input->post()["firstname"];
			$post_lastname = $this->input->post()["lastname"];
			$post_user_level = $this->input->post()["select"];
			$updated_at = date('Y-m-d H:i:s',now());

			$sql = 'UPDATE users SET email = ?, firstname = ?,lastname = ?,user_level = ?, updated_at =?   WHERE user_id= ? ';
			$this->db->query($sql, array($post_email,$post_firstname,$post_lastname, $post_user_level,$updated_at,$user_id));
			$this->user_info["message"]= "Modification of user info was successful";
		}
		elseif ($this->input->post() and !empty($this->input->post()["edit_password"])) 
		{
			$this->form_validation-> set_rules('edit_password','Password', 'required|min_length[8]|matches[edit_passwordconfirm]');
			$this->form_validation-> set_rules('edit_passwordconfirm', 'Password Confirmation', 'required|min_length[8]');
			
			if ($this->form_validation->run() === false) 
			{
				$this->user_info['error']= validation_errors();
			}
			else
			{
				$updated_at = date('Y-m-d H:i:s',now());
				$sql = 'UPDATE users SET password = ?, updated_at = ?   WHERE user_id= ? ';
				$this->db->query($sql, array($this->input->post()["edit_password"],$updated_at, $user_id));
				$this->user_info["message"]= "Modification of password was successful";
			}	
		}
		elseif ($this->input->post() and !empty($this->input->post()["description"])) 
		{
			$updated_at = date('Y-m-d H:i:s',now());
			$sql = 'UPDATE users SET description = ?, updated_at = ?   WHERE user_id= ? ';
			$this->db->query($sql, array($this->input->post()["description"],$updated_at, $user_id));
			$this->user_info["message"]= "Modification of description was successful";
		}

		$this->user_info["edit_value"] = $this->User_model->get_users_by_id($user_id);
		$this->load->view('edit_user', $this->user_info);
	}

	public function user_update($user_id="")
	{

		$this->load->helper('date');
		$this->load->model('Message_model');
		$post_data_set = $this->input->post();
		$post_data_set["wall_update"]["created_at"] = date('Y-m-d H:i:s',now());
		$this->Message_model->message_insert_query($post_data_set["wall_update"]);
		redirect(base_url('index.php/users/show/'.$user_id));



	}

	public function user_comment($user_id="")
	{

		$this->load->helper('date');
		$this->load->model('Message_model');

		$post_data_set = $this->input->post();
		$post_data_set["user_comment"]["created_at"] = date('Y-m-d H:i:s',now());
		$this->Message_model->message_insert_query($post_data_set["user_comment"]);
		$this->show($user_id);



	}



	// public function lookup_users($author_id)
	public function lookup_users()
	{
		$user_user_id_lookup = $this->User_model->user_user_id();
		$this->user_info["lookup"] = new stdClass();
		foreach ($user_user_id_lookup as $row) 
		{
			$running_user_id = $row->user_id;
			$this->user_info["lookup"]->$running_user_id = $row;
			$this->user_info["lookup"]->$running_user_id->fullname = $row->firstname." ".$row->lastname;
		}
		// echo $this->user_info["lookup"]->$author_id->fullname;
		return $this->user_info["lookup"];
	}

	public function remove_user($user_id="")
	{
		$this->load->model('Message_model');
		$this->Message_model->remove_message_by_user_id($user_id);
		$this->User_model->remove($user_id);
	}




	public function remove_message($message_id="")
	{
		$this->load->model('Message_model');
		$this->load->helper('url');
		
		// var_dump($this->session->userdata);
		// die();
		// echo "You are about to remove message id".$message_id;
		$this->Message_model->remove($message_id);
		// echo $this->session->userdata["last_page"];
		redirect($this->session->userdata["last_page"]);
		
	}




}