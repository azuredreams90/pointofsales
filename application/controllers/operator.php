<?php 
	class Operator extends CI_Controller{

		function __construct()
		{
			parent::__construct();
			$this->load->model('model_operator');
			chek_session();
		}

		function index()
		{
			$this->load->library('pagination');

			$config['base_url'] = base_url().'index.php/operator/index';
			$config['total_rows'] = $this->model_operator->tampilkan_data()->num_rows();
			$config['per_page'] = 3;

			$this->pagination->initialize($config);

			$data['pagging'] = $this->pagination->create_links();
			$halaman = $this->uri->segment(3);
			$halaman  = $halaman==''?0:$halaman;
			$data['record'] = $this->model_operator->tampilkan_data_pangging($halaman,$config['per_page'])->result();
			//$this->load->view('operator/lihat_data',$data);
			$this->template->load('template','operator/lihat_data',$data);
		}

		function post()
		{
			if(isset($_POST['submit']))
			{
				$nama_lengkap = $this->input->post('nama_lengkap');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$level = $this->input->post('level');

				$this->model_operator->post($nama_lengkap,$username,$password,$level);
				redirect('operator');
			}
			else
			{
				//$this->load->view('operator/form_input');
				$this->template->load('template','operator/form_input');
			}
		}

		function edit()
		{
			if(isset($_POST['submit']))
			{
				$id = $this->input->post('id');
				$nama_lengkap = $this->input->post('nama_lengkap');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$this->model_operator->edit($id,$nama_lengkap,$username,$password);
				redirect('operator');
			}
			else
			{
				$id = $this->uri->segment('3');
				$data['record'] = $this->model_operator->get_one($id)->row_array();
				//$this->load->view('operator/form_edit',$data);
				$this->template->load('template','operator/form_edit',$data);
			}
		}

		function delete()
		{
			$id = $this->uri->segment('3');
			$this->model_operator->delete($id);
			redirect('operator');
		}
	}
?>