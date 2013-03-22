<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('main.php');

// testing profile testing1234@gmail.com password testing1234
// url http://localhost:8888/index.php/user/login

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
				
				$this->load->helper('date');
				$post_data = $this->input->post();
				$date_now = date('Y-m-d H:i:s',now());

				$post_data_formatted= array(
					"email"=>$post_data["register_email"],
					"password"=>$this->encrypt->encode($post_data["register_password"]),
					"firstname" =>$post_data["firstname"],
					"lastname"=>$post_data["lastname"],
					"created_datetime"=>$date_now
					);
				$this->User_model->registration_query($post_data_formatted);

				$user_object  = $this->User_model->get_users($post_data_formatted["email"])[0];

				$user = array(
					'id' => $user_object->id,
					'email'=>$user_object->email,
					'login_status' =>true,
					'firstname'=>$user_object->firstname,
					'lastname'=>$user_object->lastname,
					'created_datetime'=>$user_object->created_datetime
					);
					$this->session->set_userdata('user_session', $user);
					redirect(base_url('index.php/user/profile'));
			}
			else
			{
				$this->register['error'] = "email already exist please choose a new one!";
			} // end of register if switch
		}
		
		$this->load->view('login',$this->register);
	} // end of process_resgister

	public function process_login()
	{
		$this->form_validation-> set_rules('email','Email', 'valid_email|required');
		$this->form_validation-> set_rules('password','Password', 'min_length[8]|required');

		if ($this->form_validation->run() === false) 
		{
			$this->login['error']= validation_errors();
		}
		else
		{
			if (count($this->User_model->get_users($this->input->post()['email'])[0]) !=0 )
			{
				$decoded_pass = $this->encrypt->decode($this->User_model->get_users($this->input->post()['email'])[0]->password);

				if ($decoded_pass === $this->input->post()['password']) 
				{
					$user_object  = $this->User_model->get_users($this->input->post()['email'])[0];
					$user = array(
					'id' => $user_object->id,
					'email'=>$user_object->email,
					'login_status' =>true,
					'firstname'=>$user_object->firstname,
					'lastname'=>$user_object->lastname,
					'created_datetime'=>$user_object->created_datetime
					);

					$this->session->set_userdata('user_session', $user);
					redirect(base_url('index.php/user/profile'));
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

			$this->load->view('login',$this->login);
	} // end of process login
	public function profile()
	{
		echo "Hello, you are loggedin as ".$this->user_session['email'];
		$user_data['all'] = $this->User_model->get_users($this->user_session['email'])[0];
		$user_data['session_rest'] = $this->user_session_rest;
		$this->load->view('profile',$user_data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->login['message'] =  "You are now logged out.";
		$this->load->view('login', $this->login);
	}
}