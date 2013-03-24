<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('handler.php');

class Users extends Handler 
{
	protected $user_info = array();

	public function newuser()
	{
		$this->load->view('newuser');
	}

	public function show($user_id="") // should take a user_id parameter
	{
		$this->output->enable_profiler(TRUE);

		$this->load->model('Message_model');
		// var_dump($this->User_model->user_user_id());

		//get user_id seems to be in conflict with data user_id
		// check name logic
		// $user_user_id_lookup = $this->User_model->user_user_id();
		// foreach ($user_user_id_lookup as $row) 
		// {
		// 	$running_user_id = $row->user_id;
		// 	// echo $running_user_id;
		// 	// die();

		// 	$this->user_info["lookup"]->$running_user_id = $row;
		// 	// die();
		// 	// $row->fullname = $row->firstname." ".$row->lastname
		// 	$this->user_info["lookup"]->$running_user_id->fullname = $row->firstname." ".$row->lastname;
		// }
		// var_dump($user_user_id_lookup);
		// var_dump($this->user_info["lookup"]);
		$this->user_info["wall_user_id"] = $user_id;
		// $this->user_info["lookup"] = $user_user_id_lookup;
		// draw data and store
		$message_data_set = $this->Message_model->get_messages($user_id);
		// var_dump($message_data_set);
		$this->user_info["message_data_set"] = $message_data_set;

		$this->load->view('wall',$this->user_info);
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
		$this->load->helper('date');

		if($this->input->post() and !empty($this->input->post()["edit_email"]))
		{
			$post_email = $this->input->post()["edit_email"];
			$post_firstname = $this->input->post()["firstname"];
			$post_lastname = $this->input->post()["lastname"];
			$post_user_level = $this->input->post()["select"];
			$updated_at = date('Y-m-d H:i:s',now());


			// dump to model
			// combine all sql into set
			$sql = 'UPDATE users SET email = ?, firstname = ?,lastname = ?,user_level = ?, updated_at =?   WHERE user_id= ? ';
			// $this->db->query($sql_email, array('binding15@gmail.com',$user_id));
			$this->db->query($sql, array($post_email,$post_firstname,$post_lastname, $post_user_level,$updated_at,$user_id));
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

	// public function show_2($user_id="")
	// {
	// 	$this->load->view('profile');
	// }

	public function user_update($user_id="")
	{

		$this->load->helper('date');
		$this->load->model('Message_model');
		// echo "Hello there!";

		//message_insert_query($data)
		$post_data_set = $this->input->post();
		$post_data_set["wall_update"]["created_at"] = date('Y-m-d H:i:s',now());
		// var_dump($post_data_set); // content, user_id, recipient_id, but need created at,
		$this->Message_model->message_insert_query($post_data_set["wall_update"]);



	}

	public function user_comment($user_id="")
	{

		$this->load->helper('date');
		$this->load->model('Message_model');

		$post_data_set = $this->input->post();
		$post_data_set["user_comment"]["created_at"] = date('Y-m-d H:i:s',now());
		// var_dump($post_data_set); // content, user_id, recipient_id, but need created at,
		// var_dump($post_data_set["user_comment"]);
		$this->Message_model->message_insert_query($post_data_set["user_comment"]);
		$this->show($user_id);



	}

}