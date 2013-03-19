<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller 
{
	protected $view_data = array();
	protected $user_session = NULL;

	public function __construct()	
	{
		parent::__construct();
		$this->user_session = $this->session->userdata('user_session');
		$this->user_session_rest = $this->session->userdata('session_id');
		$this->load->library('encrypt');
		$this->load->model('User_model');
	}	

	public function index()
	{

	}

	public function show_users()
	{
		// $this->load->model('User_model');
		// $user_email = 'john@yahoo.com';
	}
}