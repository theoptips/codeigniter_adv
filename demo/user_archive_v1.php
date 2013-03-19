<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// // must require main.php to extend Main
require_once('main.php');

class User extends Main  
{
	protected $register = array();
	protected $login = array();
	public function login()
	{
		$this->load->view('login');
	}

	public function process_register()
	{
		$this->load->library('form_validation');
		$this->form_validation-> set_rules('register_email','Email', 'valid_email|required');
		$this->form_validation-> set_rules('register_password','Password', 'required|min_length[8]|matches[register_confirmpassword]');
		$this->form_validation->set_rules('register_confirmpassword', 'Password Confirmation', 'required|min_length[8]');
		$this->form_validation-> set_rules('firstname','First Name Field','required');
		$this->form_validation-> set_rules('lastname','Last Name Field','required');
		if ($this->form_validation->run() === false) 
		{
			// getting header already set issue, need to fix later
			$this->register['error'] =  validation_errors();
			redirect(base_url('/index.php/user/login'));
		}
		else
		{
			$this->load->model('User_model');
			$this->load->helper('date');

			// fixing a bug that array returned is zero length rather than false
			// var_dump($this->User_model->get_users($this->input->post()['register_email']));
			// echo gettype($this->User_model->get_users($this->input->post()['register_email']));
			// die();

			if ($this->User_model->get_users($this->input->post()['register_email'])===false ||
				count($this->User_model->get_users($this->input->post()['register_email'])) == 0) 
			{
				
				$post_data = $this->input->post(); //array of 5 //TODO encode password
				$date_now = now(); //not working

				$post_data_formatted= array(
					"email"=>$post_data["register_email"],
					"password"=>$this->encrypt->encode($post_data["register_password"]),
					"firstname" =>$post_data["firstname"],
					"lastname"=>$post_data["lastname"],
					"created_datetime"=>$date_now
					);
				// var_dump($post_data_formatted);
				$this->User_model->registration_query($post_data_formatted);
				
			}
			else
			{
				$this->register['error'] = "email already exist please choose a new one!";
				redirect(base_url('/index.php/user/login'));
			}
		}

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
		// $this->form_validation-> set_rules('firstname','First Name Field','required');
		// $this->form_validation-> set_rules('lastname','Last Name Field','required');

		if ($this->form_validation->run() === false) 
		{
			$this->login['error']= validation_errors();
		}
		else
		{
			$this->load->model('User_model');
			// echo "var_dump of post variable";
				// var_dump($this->User_model->get_users($this->input->post()['email']));
				
			if (//$this->User_model->get_users($this->input->post()['email']) !==false ||
				count($this->User_model->get_users($this->input->post()['email'])[0]) !=0)
			{
				// echo count($this->User_model->get_users($this->input->post()['email'])[0]);
				// die();

					// if password match then allow session valid
				//
				// var_dump($this->User_model->get_users($this->input->post()['email'])[0]->password);
				$decoded_pass = $this->encrypt->decode($this->User_model->get_users($this->input->post()['email'])[0]->password);
					// die();
				// $decoded_pass = $this->encrypt->decode($this->User_model->get_users($this->input->post()['password'])[0]['password']);
				if ($decoded_pass==$this->input->post()['password']) 
				{
					$this->login['message'] =  "password match";
				
				}

				// // set up session, allows login
				// declare user variable
				// // in place of established DB, holds session data temp in a variable
				// // fake session data
				// $user = array('id' =>1,
				// 	'email' => 'john@yahoo.com',
				// 	'login_status' => true
				// 	);
				$user_object  = $this->User_model->get_users($this->input->post()['email'])[0];
				//1object(stdClass)#20 (6) { ["id"]=> string(2) "21" ["email"]=> string(22) "test12345678@gmail.com" ["password"]=> string(88) "bCtE4ct/hTYhXWytcLAPVT8Xo0C6rkStvtlRDaZMcPB72MdqzihMExohfJwWSouKvxCtzLfzX9E/v8HwwZ787w==" ["firstname"]=> string(12) "test12345678" ["lastname"]=> string(16) "test12345678last" ["created_datetime"]=> string(19) "0000-00-00 00:00:00" }
				$user = array(
					'id' => $user_object->id,
					'email'=>$user_object->email,
					'login_status' =>true,
					'firstname'=>$user_object->firstname,
					'lastname'=>$user_object->lastname,
					'created_datetime'=>$user_object->created_datetime
					);
				// var_dump($user);
				// // format $this->session->set_userdata('some_name', 'some_value');
				// // pass $user into set_userdata array
				$this->session->set_userdata('user_session', $user);
				// // show base url
				// echo base_url();
				// echo $this->user_session['email'];
				redirect(base_url('index.php/user/profile'));
			}
			else
			{
				$this->login['error'] =  "email does not exists";

			}
			
		}

	}
	public function profile()
	{
		$this->load->model('User_model');
		echo "Hello, you are loggedin as ".$this->user_session['email'];
		// need to modify user session, its manual now
		// code blow didn't work, generated an object not rows
		// $user_data['all'] = $this->User_model->get_users($this->user_session['email']);
		$user_data['all'] = $this->User_model->get_users($this->user_session['email'])[0];
	// adding a profile view here for assignment
		// var_dump($user_data); // also need to pass data into view
		// $this->load->view('profile');
		// $test_data['test'] = $this->User_model->get_user_by_query();
		$user_data['session_rest'] = $this->user_session_rest; // test session
		$this->load->view('profile',$user_data);
		// test encrypt
		// echo "<br/> below is the encrypted hello world";
		// echo $this->encrypt->encode('Hello World');

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('/index.php/user/login'));
				//display a message here that now you are logged out.
	}

	
}