<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller 
{
	protected $view_data = array();
	protected $user_session = NULL;

	public function __construct()	
	{
		parent::__construct();
		$this->user_session = $this->session->userdata('user_session');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('User_model');
	}	

	public function index()
	{
		$this->load->view('homepage');
	}
}