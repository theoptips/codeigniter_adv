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
		$this->output->enable_profiler(TRUE);
		$local_html = "";
		$users_display = $this->User_model->get_all_users();
		foreach ($users_display as $row) 
		{
			$local_html .=  "<tr>";
			$local_html .=  "<td>".$row->user_id."</td>";
			$local_html .=  "<td><a href='#'>".$row->firstname." ".$row->lastname."</a></td>";			
			$local_html .=  "<td>".$row->email."</td>";
			$local_html .=  "<td>".$row->created_at."</td>";
			$local_html .=  "<td>".$row->user_level."</td>";
			$local_html .=  "<td><a href='../users/edit_user/".$row->user_id."'>"."EDIT"."</a>"."  "."<a href='../dashboard/remove_user/".$row->user_id."'>"."REMOVE"."</a>"."</td>";
			$local_html .=  "</tr>";
		}
		// $this->load->view('dashboard_admin',$local_html .= )

		$this->user_info["html"] = $local_html;
	 // return $this->user_info["html"];
	 	// var_dump($this->user_info);
		$this->load->view('dashboard_admin', $this->user_info);
	}

	public function remove_user($user_id="")
	{
		$this->load->helper('url');
		$this->output->enable_profiler(TRUE);
		// echo base_url();
		// echo $user_id;
		//$sql = 'DELETE FROM users WHERE user_id= ? ';
		//$this->db->query($sql, array($user_id));
		$this->user_info["message"]= "Deletion was successful."; // issue this is not set.
		// $this->admin();
		// echo "Deletion was successful.";
		//$this->admin(); // doesn't work after one deletion, url becomes dashboard/dashboard/remove_user, even if change html to index, still just keeps adding url
		// redirect(base_url("index.php/dashboard/admin"));
	}
}