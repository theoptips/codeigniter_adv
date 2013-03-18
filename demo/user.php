<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// // must require main.php to extend Main
require_once('main.php');

class User extends Main  
{
	public function login()
	{
		$this->load->view('login');
	}

	public function process_login()
	{
		// var_dump check;
		// var_dump($this->input->post());

		// access just one post attribute
		// echo $this->input->post('email');

		// library form validation
		// directory: system/language/english
		// % mark value can be customized	
		// // load the library
		$this->load->library('form_validation');
		// // impl rules
		// format input, label, validation rules email / required
		$this->form_validation-> set_rules('email','Email', 'valid_email|required');
		$this->form_validation-> set_rules('password','Password', 'min_length[8]|required');

		if ($this->form_validation->run() === false) 
		{
			echo validation_errors();
		}
		else
		{
			// // set up session, allows login
			// declare user variable
			// // in place of established DB, holds session data temp in a variable
			$user = array('id' =>1,
				'email' => 'test@gmail.com',
				'login_status' => true
				);
			// // format $this->session->set_userdata('some_name', 'some_value');
			// // pass $user into set_userdata array
			$this->session->set_userdata('user_session', $user);
			// // show base url
			// echo base_url();
			redirect(base_url('index.php/user/profile'));
		}

	}
	public function profile()
	{
		echo "hello ".$this->user_session['email'];
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('/index.php/user/login'));
	}

	
}