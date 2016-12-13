<?php 
class model_transaksi_jual_detail extends CI_Model{

       function input_ajax()
       {
       	$nama_barang = $this->input->get_post('nama_barang');
       	$qty = $this->input->get_post('qty');
       	$barang = $this->db->get_where('barang',array('nama_barang'=>$nama_barang))->row_array();
       	$data = array('barang_id'=>$barang['barang_id'],
       		            'harga_jual'=>$barang['harga'],
       		            'qty'=>$qty,
       		            'status'=>0);
       	$this->db->insert('transaksi_jual_detail',$data);
       }

       function tampilkan_data()
       {
       	$query="SELECT b.kode_barang, b.nama_barang, tj.harga_jual, tj.qty, tj.jualdetail_id
		   FROM transaksi_jual_detail as tj, barang as b
		   WHERE tj.barang_id = b.barang_id and tj.status=0";
       	
       	return $this->db->query($query);
       }

       function delete()
       {
       	$id = $this->input->get_post('id');
       	$this->db->where('jualdetail_id',$id);
       	$this->db->delete('transaksi_jual_detail');
       }

       function selesai()
       {
       	$nama_costumer = $this->input->get_post('nama_costumer');
       	$costumer = $this->db->get_where('costumer',array('nama_costumer'=>$nama_costumer))->row_array();
	$username = $this->session->userdata('username');
	$operator = $this->db->get_where('operator',array('username'=>$username))->row_array();        
       	$data = array('costumer_id'=>$costumer['costumer_id'],
       		            'tanggal_transaksi'=>tanggal(),
       		            'operator_id'=>$operator['operator_id']);
       	$this->db->insert('transaksi_jual',$data);
       	 $id = $this->db->get_where('transaksi_jual',$data)->row_array();
       	 return $id['transaksijual_id'];
       }

       function ubah_status($id)
       {
       	$query ="UPDATE transaksi_jual_detail SET status='1', transaksijual_id='$id'
       		   WHERE status=0";
       	$this->db->query($query);
       }

       function laporan_default()
              {
                     $query = "SELECT tj.tanggal_transaksi, c.nama_costumer, sum(tjd.qty * tjd.harga_jual) as total
                                      FROM transaksi_jual_detail as tjd, transaksi_jual as tj, costumer as c
                                      WHERE tjd.transaksijual_id = tj.transaksijual_id and tj.costumer_id = c.costumer_id
                                      GROUP BY tj.transaksijual_id";

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
