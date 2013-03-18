<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller 
{
	protected $view_data = array();
	protected $user_session = NULL;

	public function __construct()	
	{
		// // using constructor to hold session data so that everything that is a child can access
		parent::__construct();
		$this->user_session = $this->session->userdata('user_session');
	}	

	public function index()
	{

	}

	public function show_users()
	{
		$this->load->model('User_model');
		$user_email = 'john@yahoo.com';
		// $user_id = 2;
		// // $user_email is a parameter
		// $user = $this->User_model->get_users($user_email,$user_id);
		// var_dump($user);
		// test db connection works
		// $all_users = $this->User_model->get_all_users();
		// var_dump($all_users);		

	}
}