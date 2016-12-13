<?php 
	class Dashboard extends CI_Controller{

		function index()
		{
			//$this->load->view('view_dashboard');
			$this->template->load('template','view_dashboard');
			chek_session();
		}
	}
?>