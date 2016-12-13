<?php 
	class Auth extends CI_Controller{

		function __construct()
		{
			parent::__construct();
			$this->load->model('model_operator');
		}

		function login()
		{

			if(isset($_POST['submit']))
			{
				
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$this->model_operator->login($username,$password);
				$hasil = $data['record'] = $this->model_operator->login($username,$password);
				
				if($hasil == 1)
				{
					$username = $this->input->post('username');
					$this->session->set_userdata(array('status_login'=>'oke','username'=>$username));
					redirect('dashboard');
				}
				else
				{
					redirect('auth/login');
				}
			}
			else
			{
				//$this->load->view('form_login');	
				$this->template->load('template2','form_login');
				chek_session_login();
			}
		}

		function logout()
		{
			$this->session->sess_destroy();
			redirect('auth/login');
		}
	}
?>