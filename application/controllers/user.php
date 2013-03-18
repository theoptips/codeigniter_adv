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
		$this->form_validation-> set_rules('firstname','First Name Field','required');
		$this->form_validation-> set_rules('lastname','Last Name Field','required');

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
				'email' => 'john@yahoo.com',
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
		$this->load->model('User_model');
		echo "hello ".$this->user_session['email'];
		// need to modify user session, its manual now
		// code blow didn't work, generated an object not rows
		// $user_data['all'] = $this->User_model->get_users($this->user_session['email'])[0];
		$user_data['all'] = $this->User_model->get_users($this->user_session['email']);
	// adding a profile view here for assignment
		// var_dump($user_data); // also need to pass data into view
		// $this->load->view('profile');
		// $test_data['test'] = $this->User_model->get_user_by_query();
		$this->load->view('profile',$user_data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('/index.php/user/login'));
				//display a message here that now you are logged out.
	}

	
}