<?php 
	class Supplier extends CI_Controller{

		function __construct()
		{
			parent::__construct();
			$this->load->model('model_supplier');
			chek_session();
		}

		function index()
		{
			$this->load->library('pagination');

			$config['base_url'] = base_url().'index.php/supplier/index';
			$config['total_rows'] = $this->model_supplier->tampilkan_data()->num_rows();
			$config['per_page'] = 3;

			$this->pagination->initialize($config);

			$data['pagging']=$this->pagination->create_links();
			$halaman = $this->uri->segment(3);
			$halaman = $halaman==''?0:$halaman;
			$data['record'] = $this->model_supplier->tampilkan_data_pagging($halaman,$config['per_page'])->result();
			//$this->load->view('kategori/lihat_data',$data);
			$this->template->load('template','supplier/lihat_data',$data);
		}

		function post()
		{
			if(isset($_POST['submit']))
			{
				$nama_supplier = $this->input->post('nama_supplier');
				$alamat_supplier = $this->input->post('alamat_supplier');
				$telpon_supplier = $this->input->post('telpon_supplier');
				$kode_supplier = kode_supplier();
				$this->model_supplier->post($nama_supplier,$alamat_supplier,$telpon_supplier,$kode_supplier);
				redirect('supplier');

			}
			else
			{
				//$this->load->view('kategori/form_input');
				$this->template->load('template','supplier/form_input');
			}
		}

		function edit()
		{
			if(isset($_POST['submit']))
			{
				$id  = $this->input->post('id');
				$nama_supplier = $this->input->post('nama_supplier');
				$alamat_supplier = $this->input->post('alamat_supplier');
				$telpon_supplier = $this->input->post('telpon_supplier');
				$this->model_supplier->edit($id,$nama_supplier,$alamat_supplier,$telpon_supplier);
				redirect('supplier');
			}
			else
			{
				$id = $this->uri->segment('3');
				$data['record'] = $this->model_supplier->get_one($id)->row_array();
				//$this->load->view('kategori/form_edit',$data);
				$this->template->load('template','supplier/form_edit',$data);
			}
		}

		function delete()
		{
			$id = $this->uri->segment('3');
			$this->model_supplier->delete($id);
			redirect('supplier');
		}
	}
?>