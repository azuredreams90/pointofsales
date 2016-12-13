<?php 
class Penjualan extends CI_Controller{

	function  __construct()
	{
		parent:: __construct();
		$this->load->model(array('model_costumer','model_barang','model_transaksi_jual_detail'));
	}

	function index()
	{
		$data['barang']= $this->model_barang->tampilkan_data()->result();
		$data['costumer']=$this->model_costumer->tampilkan_data()->result();
		$this->template->load('template','penjualan/form',$data);
	}

	function input_ajax()
	{
		$this->model_transaksi_jual_detail->input_ajax();
	}

	function tampil()
	{
	     echo"<table class='table table-bordered'>
	        <tr>
	        	<td>No</td>
	        	<th>Kode Barang</th>
	        	<th>Nama Barang</th>
	        	<th>Jumlah Barang</th>
	        	<th>Harga</th>
	        	<th>Subtotal</th>
	        </tr>";
	        $data = $this->model_transaksi_jual_detail->tampilkan_data()->result();
	        $no=1;
	        foreach($data as $d)
	        {
	        	echo"<tr class='hapus$d->jualdetail_id'>
	        		<td>$no</td>
			<td>$d->kode_barang</td>
			<td>$d->nama_barang</td>
			<td>$d->qty</td>
			<td>$d->harga_jual</td>
			<td>".($d->qty * $d->harga_jual)."</td>
			<td><a style='cursor:pointer; text-decoration: none' class='glyphicon glyphicon-trash' onclick='hapus($d->jualdetail_id)'></a></td>
	        	          </tr>";
	        	          $no++;
	        }
	     echo"</table>";
	}

	function delete()
	{
		$this->model_transaksi_jual_detail->delete();
	}

	function selesai()
	{
		$id = $this->model_transaksi_jual_detail->selesai();
		$this->model_transaksi_jual_detail->ubah_status($id);
	}
 }
 ?>
