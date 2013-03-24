<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('users.php');

class Dashboard extends Users 
{
	protected $user_info= array();

	public function index()
	{
		$this->load->view('dashboard_admin', $this->user_info);
	}

	public function admin()
	{
		$local_html = "";
		$users_display = $this->User_model->get_all_users();
		foreach ($users_display as $row) 
		{
			$local_html .=  "<tr>";
			$local_html .=  "<td>".$row->user_id."</td>";
			$local_html .=   "<td>".$row->firstname." ".$row->lastname."</td>";			
			$local_html .=   "<td>".$row->email."</td>";
			$local_html .=   "<td>".$row->created_at."</td>";
			$local_html .=   "<td>".$row->user_level."</td>";
			$local_html .=   "<td><a href='../users/edit_user/".$row->user_id."'>"."EDIT"."</a>"."  "."<a href='../dashboard/remove_user/".$row->user_id."'>"."REMOVE"."</a>"."</td>";
			$local_html .=   "</tr>";
		}
		// $this->load->view('dashboard_admin',$local_html .= )

	 $this->user_info["html"] = $local_html;
	 // return $this->user_info["html"];
	 	// var_dump($this->user_info);
		$this->load->view('dashboard_admin', $this->user_info);
	}

	public function remove_user($user_id="")
	{
		echo $user_id;
		//$sql = 'DELETE FROM users WHERE user_id= ? ';
		//$this->db->query($sql, array($user_id));
		// $this->user_info["message"]= "Deletion was successful.";
		echo "Deletion was successful.";
		$this->load->view('remove_user', $this->user_info);
	}
}