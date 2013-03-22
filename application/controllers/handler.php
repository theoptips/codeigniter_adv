<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('main.php');

class Handler extends Main 
{
	protected $register=array();
	protected $login=array();

	public function signin()
	{
		$this->load->view('signin');
	}

	public function process_login()
	{
		$this->form_validation-> set_rules('email','Email', 'valid_email|required');
		$this->form_validation-> set_rules('password','Password', 'required');

		if ($this->form_validation->run() === false) 
		{
			$this->login['error']= validation_errors();
		}
		else
		{
			if (count($this->User_model->get_users($this->input->post()['email'])[0]) !=0 )
			{
				$user_object = $this->User_model->get_users($this->input->post()['email'])[0];
				$decoded_pass = $this->encrypt->decode($user_object->password);

				// if ($decoded_pass === $this->input->post()['password']) 
				if($this->input->post()['password'] === $user_object->password)
				{
					$user = array(
					'user_id' => $user_object->user_id,
					'email'=>$user_object->email,
					'login_status' =>true,
					'firstname'=>$user_object->firstname,
					'lastname'=>$user_object->lastname,
					'created_at'=>$user_object->created_at,
					'user_level'=>$user_object->user_level
					);

					$this->session->set_userdata('user_session', $user);
					redirect(base_url('index.php/users/show'));
				}
				else
				{
					$this->login['error'] = "Password entered is wrong.";	
				}
			}
			else
			{
				$this->login['error'] =  "Email does not exists";
			}
		}

			$this->load->view('signin',$this->login);
	}

	public function register()
	{
		$this->load->view('register');
	} 

	public function process_register()
	{
		$this->form_validation-> set_rules('register_email','Email', 'valid_email|required');
		$this->form_validation-> set_rules('register_password','Password', 'required|min_length[8]|matches[register_confirmpassword]');
		$this->form_validation-> set_rules('register_confirmpassword', 'Password Confirmation', 'required|min_length[8]');
		$this->form_validation-> set_rules('firstname','First Name Field','required');
		$this->form_validation-> set_rules('lastname','Last Name Field','required');

		if ($this->form_validation->run() === false) 
		{
			$this->register['error'] =  validation_errors();
		}
		else
		{
			$this->load->helper('date');
			if ($this->User_model->get_users($this->input->post()['register_email'])===false ||
				count($this->User_model->get_users($this->input->post()['register_email'])) == 0) 
			{
				$post_data = $this->input->post();
				$date_now = date('Y-m-d H:i:s',now());

				$post_data_formatted= array(
					"email"=>$post_data["register_email"],
					// "password"=>$this->encrypt->encode($post_data["register_password"]),
					"password"=>$post_data["register_password"],
					"firstname" =>$post_data["firstname"],
					"lastname"=>$post_data["lastname"],
					"created_at"=>$date_now,
					'user_level'=>'Normal'
					);

				$this->User_model->registration_query($post_data_formatted);

				$user_object  = $this->User_model->get_users($post_data_formatted["email"])[0];

				$user = array(
					'user_id' => $user_object->user_id,
					'email'=>$user_object->email,
					'login_status' =>true,
					'firstname'=>$user_object->firstname,
					'lastname'=>$user_object->lastname,
					'created_at'=>$user_object->created_at,
					'user_level'=>$user_object->user_level
					);

				$this->session->set_userdata('user_session', $user);
				// var_dump($this->session->userdata("login_status"));
				redirect(base_url('index.php/users/show'));
			}
			else
			{
				$this->register['error'] = "email already exist please choose a new one!";
			}
		}
		$this->load->view('register', $this->register);
	}

	public function signout()
	{
		$this->session->sess_destroy();
		$this->login['message'] =  "You are now signed out.";
		$this->load->view('signin', $this->login);
	}

}