<?php 
	class Costumer extends CI_Controller{

		function __construct()
		{
			parent::__construct();
			$this->load->model('model_costumer');
			chek_session();
		}

		function index()
		{
			$this->load->library('pagination');

			$config['base_url'] = base_url().'index.php/costumer/index';
			$config['total_rows'] = $this->model_costumer->tampilkan_data()->num_rows();
			$config['per_page'] = 3;

			$this->pagination->initialize($config);

			$data['pagging']=$this->pagination->create_links();
			$halaman = $this->uri->segment(3);
			$halaman = $halaman==''?0:$halaman;
			$data['record'] = $this->model_costumer->tampilkan_data_pagging($halaman,$config['per_page'])->result();
			//$this->load->view('kategori/lihat_data',$data);
			$this->template->load('template','costumer/lihat_data',$data);
		}

		function post()
		{
			if(isset($_POST['submit']))
			{
				$nama_costumer = $this->input->post('nama_costumer');
				$alamat_costumer = $this->input->post('alamat_costumer');
				$telpon_costumer = $this->input->post('telpon_costumer');
				$kode_costumer = kode_costumer();
				$this->model_costumer->post($nama_costumer,$alamat_costumer,$telpon_costumer,$kode_costumer);
				redirect('costumer');

			}
			else
			{
				//$this->load->view('kategori/form_input');
				$this->template->load('template','costumer/form_input');
			}
		}

		function edit()
		{
			if(isset($_POST['submit']))
			{
				$id  = $this->input->post('id');
				$nama_costumer = $this->input->post('nama_costumer');
				$alamat_costumer = $this->input->post('alamat_costumer');
				$telpon_costumer = $this->input->post('telpon_costumer');
				$this->model_costumer->edit($id,$nama_costumer,$alamat_costumer,$telpon_costumer);
				redirect('costumer');
			}
			else
			{
				$id = $this->uri->segment('3');
				$data['record'] = $this->model_costumer->get_one($id)->row_array();
				//$this->load->view('kategori/form_edit',$data);
				$this->template->load('template','costumer/form_edit',$data);
			}
		}

		function delete()
		{
			$id = $this->uri->segment('3');
			$this->model_costumer->delete($id);
			redirect('costumer');
		}
	}
?>