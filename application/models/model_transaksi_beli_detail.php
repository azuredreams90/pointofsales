<?php 
class Model_transaksi_beli_detail extends CI_Model{

	function post()
	{
		$harga = $this->input->get_post('harga');
		$qty = $this->input->get_post('qty');
		$nama_barang = $this->input->get_post('nama_barang');
		$barang_id = $this->db->get_where('barang',array('nama_barang'=>$nama_barang))->row_array();
		$data = array('barang_id'=>$barang_id['barang_id'],
			            'harga'=>$harga,
			            'qty'=>$qty,
			            'status'=>0);
		//status 0  belum di kriim status 1 sudah dikirim
		$this->db->insert('transaksi_beli_detail',$data);
	}

	function tampil_temp()
	{
		$query="SELECT b.kode_barang, b.nama_barang, td.*
			   FROM transaksi_beli_detail as td, barang as b
			  WHERE td.barang_id = b.barang_id AND status = 0";

		return 	$this->db->query($query);
	}

	function hapus_temp($id)
	{
		$this->db->where('belidetail_id',$id);
		$this->db->delete('transaksi_beli_detail');
	}

	function chek_out()
	{
		$nama_supplier = $this->input->get_post('nama_supplier');
		$chek = $this->db->get_where('supplier',array('nama_supplier'=>$nama_supplier))->row_array();
		$data = array('tanggal'=>tanggal(), 'supplier_id'=>$chek['supplier_id']);
		$this->db->insert('transaksi_beli',$data);
		$get_id = $this->db->get_where('transaksi_beli',$data)->row_array();
		return $get_id['transaksibeli_id'];

	}

	function ubah_status($id)
	{
		$query = "UPDATE transaksi_beli_detail
			     SET transaksibeli_id='$id', status='1'
			     WHERE status=0";

		$this->db->query($query);
	}

	function laporan_default()
              {
                     $query = "SELECT tb.tanggal, s.nama_supplier, sum(tbd.qty * tbd.harga) as total
			FROM transaksi_beli as tb, transaksi_beli_detail as tbd, supplier as s
			WHERE tbd.transaksibeli_id = tb.transaksibeli_id and tb.supplier_id = s.supplier_id
			GROUP BY tb.transaksibeli_id";

                     return $this->db->query($query);
              }

       function laporan_periode($tanggal_mulai,$tanggal_berakhir)
              {

                     $query = "SELECT tj.tanggal_transaksi, c.nama_costumer, sum(tjd.qty * tjd.harga_jual) as total
                                      FROM transaksi_jual_detail as tjd, transaksi_jual as tj, costumer as c
                                      WHERE tjd.transaksijual_id = tj.transaksijual_id and tj.costumer_id = c.costumer_id and tj.tanggal_transaksi between '$tanggal_mulai'and'$tanggal_berakhir'
                                      GROUP BY tj.transaksijual_id";

                     return $this->db->query($query);
              }
}
 ?>
