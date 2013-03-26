<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('users.php');

class Dashboard extends Users 
{
	protected $user_info= array();

	// public function index()
	// {
	// 	$this->load->view('dashboard_admin', $this->user_info);
	// }

	public function admin()
	{
		// $this->output->enable_profiler(TRUE);
		$local_html = "";
		$users_display = $this->User_model->get_all_users();
		foreach ($users_display as $row) 
		{
			$local_html .=  "<tr>";
			$local_html .=  "<td>".$row->user_id."</td>";
			$local_html .=  "<td><a href="."/index.php/users/show/".$row->user_id.">".$row->firstname." ".$row->lastname."</a></td>";			
			$local_html .=  "<td>".$row->email."</td>";
			$local_html .=  "<td>".$row->created_at."</td>";
			$local_html .=  "<td>".$row->user_level."</td>";
			$local_html .=  "<td><a href='../users/edit_user/".$row->user_id."'>"."EDIT"."</a>"."  "."<a href='../dashboard/remove_user/".$row->user_id."'>"."REMOVE"."</a>"."</td>";
			$local_html .=  "</tr>";
		}

		$this->user_info["html"] = $local_html;
	 
		$this->load->view('dashboard_admin', $this->user_info);
	}

	// public function remove_user($user_id="")
	// {
	// 	$this->load->helper('url');
	// 	$this->output->enable_profiler(TRUE);
	// 	$this->user_info["message"]= "Deletion was successful."; // issue this is not set.

	// }

		public function remove_user($user_id="")
	{
		$this->load->model('Message_model');
		$this->Message_model->remove_message_by_user_id($user_id);
		$this->User_model->remove($user_id);
		$this->user_info["message"]= "Deletion was successful.";
		// redirect('../index.php');
		// var_dump($this->user_info);
		// $this->admin();
		// redirect('../index.php/dashboard/admin');
	}

}