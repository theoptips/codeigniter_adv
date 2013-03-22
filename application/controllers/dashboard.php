<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('users.php');

class Dashboard extends Users 
{
	protected $user_data= array();

	public function index()
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
			$local_html .=   "</tr>";
		}
		// $this->load->view('dashboard_admin',$local_html .= )

	 $this->user_data["html"] = $local_html;
	 // return $this->user_data["html"];
	 	// var_dump($this->user_data);
		$this->load->view('dashboard_admin', $this->user_data);
	}

	public function print_user_display()
	{
		
	}
}