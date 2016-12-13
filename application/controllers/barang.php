<?php 
	class Barang extends CI_Controller{

		function __construct()
		{
			parent::__construct();
			chek_session();
			$this->load->model('model_barang');
		}

		function index()
		{
			$this->load->library('pagination');
			$config['base_url'] = base_url().'index.php/barang/index';
			$config['total_rows'] = $this->model_barang->tampilkan_data()->num_rows();
			$config['per_page'] = 3;

			$this->pagination->initialize($config);

			$data['pagging'] = $this->pagination->create_links();
			$halaman = $this->uri->segment(3);
			$halaman = $halaman == ''?0:$halaman;
			$data['record'] = $this->model_barang->tampilkan_data_pagging($halaman,$config['per_page'])->result();
			//$this->load->view('barang/lihat_data',$data);
			$this->template->load('template','barang/lihat_data',$data);
		}

		function post()
		{
			if(isset($_POST['submit']))
			{
				$nama_barang = $this->input->post('nama_barang');
				$kategori = $this->input->post('kategori');
				$harga = $this->input->post('harga');
				$kode_barang = kode_barang();
				$this->model_barang->post($kategori,$nama_barang,$harga,$kode_barang);
				redirect('barang');
			}
			else
			{
				$this->load->model('model_kategori');
				$data['kategori'] = $this->model_kategori->tampilkan_data()->result();
				//$this->load->view('barang/form_input',$data);
				$this->template->load('template','barang/form_input',$data);
			}
		}

		function edit()
		{
			if(isset($_POST['submit']))
			{
				$id = $this->input->post('id');
				$nama_barang = $this->input->post('nama_barang');
				$kategori = $this->input->post('kategori');
				$harga = $this->input->post('harga');
				$this->model_barang->edit($id,$kategori,$nama_barang,$harga);
				redirect('barang');
			}
			else
			{
				$id = $this->uri->segment('3');
				$data['record'] = $this->model_barang->get_one($id)->row_array();
				$this->load->model('model_kategori');
				$data['kategori'] = $this->model_kategori->tampilkan_data()->result();
				//$this->load->view('barang/form_edit',$data);
				$this->template->load('template','barang/form_edit',$data);
			}
		}

		function delete()
		{
			$id = $this->uri->segment('3');
			$this->model_barang->delete($id);
			redirect('barang');
		}
	}
?>