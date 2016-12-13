<?php 
class Stok extends CI_Controller{
          
          function __construct()
          {
          	parent:: __construct();
          	$this->load->model('model_barang');
          	chek_session();
          }

          function index()
          {
          	$data['record']= $this->model_barang->tampilkan_data()->result();
          	$this->template->load('template','stok/lihat_data',$data);
          }

          function word()
          {
          	header("content-type=appalication/vnd.ms-word");
	header("content-disposition:attachment;filename=laporanstok.doc");
          	$data['record']= $this->model_barang->tampilkan_data()->result();
          	$this->load->view('stok/msword',$data);
          }
}
 ?>