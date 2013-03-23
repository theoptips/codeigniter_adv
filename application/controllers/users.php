<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('handler.php');

class Users extends Handler 
{
	protected $user_info = array();

	public function newuser()
	{
		$this->load->view('newuser');
	}

	public function show() // should take a user_id parameter
	{
		$this->load->view('wall');
	}

	public function edit()
	{
		// query binding
		// $sql = "SELECT * FROM some_table WHERE id = ? AND status = ? AND author = ?"; 
		// $this->db->query($sql, array(3, 'live', 'Rick'));
		//$sql = "UPDATE users SET =? WHERE user_id=? ";
		// echo $this->session->userdata
		$this->load->view('edit_user');
	}
	
	public function edit_user($user_id="")
	{
		// echo "This is id".$id;
		// $user_id = $this->uri->segment(3);
		
		// TODO MAKE input text name attribute of array
		// example <input type="text" name="user['name']"> rather than just 'name' and then pass it to the model to process, like ruby on rails
		// TODO UNSOLVED MYSTERY : now update date will constantly updated, need to resolve
		//TAKE INPUT FROM URL 13
		//CALL MODEL TO DRAW ALL DATA
		$this->user_info["edit_value"] = $this->User_model->get_users_by_id($user_id);
		
		//DRAW ALL FORM DATA
		// var_dump($this->user_info);

		if($this->input->post() and !empty($this->input->post()["edit_email"]))
		{
			$post_email = $this->input->post()["edit_email"];
			$post_firstname = $this->input->post()["firstname"];
			$post_lastname = $this->input->post()["lastname"];
			$post_user_level = $this->input->post()["select"];

			// dump to model
			// combine all sql into set
			$sql = 'UPDATE users SET email = ?, firstname = ?,lastname = ?,user_level = ?   WHERE user_id= ? ';
			// $this->db->query($sql_email, array('binding15@gmail.com',$user_id));
			$this->db->query($sql, array($post_email,$post_firstname,$post_lastname, $post_user_level,$user_id));
			$this->user_info["message"]= "Modification of user info was successful";
			// $sql_email = 'UPDATE users SET WHERE user_id= ? ';
			// $this->db->query($sql_email, array(,$user_id));
			// $sql_email = 'UPDATE users SET  WHERE user_id= ? ';
			// $this->db->query($sql_email, array(,$user_id));
			// $sql_email = 'UPDATE users SET  WHERE user_id= ? ';
			// $this->db->query($sql_email, array(,$user_id));		
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
				$sql = 'UPDATE users SET password = ?   WHERE user_id= ? ';
				$this->db->query($sql, array($this->input->post()["edit_password"],$user_id));
				$this->user_info["message"]= "Modification of password was successful";
			}
			

			
		}

		$this->user_info["edit_value"] = $this->User_model->get_users_by_id($user_id);
		$this->load->view('edit_user', $this->user_info);
		// this table needs to be dynamic ["NOT ANY MORE"]
		// there needs to be checkings for which fields changed["NOT ANY MORE"]
		// have to display placeholder value [CHECK]
		// have to check if user exists [TODO  ]
		//user enter by URL http://localhost:8888/index.php/users/edit_user/13
		// how does the URL connect to the other edit functionality classfunction can automatically get the ID [CHECK]
		// user admin >> click on URL >> linked to and gives user_id


		
		// update time
		// value holder
		

		
}