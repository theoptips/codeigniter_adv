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
		$post_email = $this->input->post()["edit_email"];
		$post_firstname = $this->input->post()["firstname"];
		$post_lastname = $this->input->post()["lastname"];
		$post_user_level = $this->input->post()["select"];

		// dump to model
		$sql_email = 'UPDATE users SET email = ? WHERE user_id= ? ';
		// $this->db->query($sql_email, array('binding15@gmail.com',$user_id));
		$this->db->query($sql_email, array($post_email,$user_id));
		$sql_email = 'UPDATE users SET firstname = ? WHERE user_id= ? ';
		$this->db->query($sql_email, array($post_firstname,$user_id));
		$sql_email = 'UPDATE users SET lastname = ? WHERE user_id= ? ';
		$this->db->query($sql_email, array($post_lastname,$user_id));
		$sql_email = 'UPDATE users SET user_level = ? WHERE user_id= ? ';
		$this->db->query($sql_email, array($post_user_level,$user_id));

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

	public function edit_user_submit()
	{
		
		// move to model soon
		

		// var_dump($this->input->post());
		// $user_id = $this->input->post()["user_id"];
		// var_dump($user_id);
		// if (true) 
		// {
		// 	$this->user_info["message"] = "You have successfully edited information for ".$user_id;
		// }
		// else
		// {
		// 	$this->user_info["error"] = "Oops something went wrong";
		// }

		// $user_id =  $this->uri->segment(3);
		// 

		// $this->user_info["edit_value"]= $this->User_model->get_users_by_id($user_id);
		// $this->load->view('edit_user' , $this->user_info); // when loading back cannot get back to the same page
		
	}

	public function edit_password()
	{
		$this->load->view('edit_user');
	}
}