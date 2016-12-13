<?php 
	class Pembelian extends CI_Controller{

		function __construct()
		{
			parent:: __construct();
			$this->load->model(array('model_supplier','model_barang','model_transaksi_beli_detail'));
		}

		function index()
		{
			$data['supplier']=$this->model_supplier->tampilkan_data()->result();
			$data['barang'] = $this->model_barang->tampilkan_data()->result();
			$this->template->load('template','pembelian/form',$data);
		}

		function input_ajax()
		{
			echo $this->model_transaksi_beli_detail->post();

		}

		function load_temp()
		{
	echo"<table class='table table-bordered'>
			<tr>
			         <th>Kode Barang</th>
			         <th>Nama Barang</th>
			         <th>Qty</th>
			         <th>Harga Beli</th>
			         <th>Subtotal</th>
			         <th>Operasi</th>
			</tr>";
			$no=1;
		$data = $this->model_transaksi_beli_detail->tampil_temp()->result();
		foreach($data  as  $d)
		{
			echo"<tr id='hapus$d->belidetail_id'>
				<td>$no</td>
				<td>$d->nama_barang</td>
				<td>$d->qty</td>
				<td>$d->harga</td>
				<td>".($d->qty * $d->harga )."</td>
				<td><a onclick='hapus($d->belidetail_id)' style='cursor:pointer; text-decoration:none' class='glyphicon glyphicon-trash'></a></td>
			         </tr>";
			$no++;
		}
	echo"</table>";
		}

		function hapus()
		{
			$id  = $this->input->get_post('id');
			$this->model_transaksi_beli_detail->hapus_temp($id);
		}

		function selesai()
		{
			$id = $this->model_transaksi_beli_detail->chek_out();
			$this->model_transaksi_beli_detail->ubah_status($id);

		}
	}
 ?>