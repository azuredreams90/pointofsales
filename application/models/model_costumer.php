<?php 
	class Model_costumer extends CI_Model{

		function tampilkan_data()
		{
			return $this->db->get('costumer');
		}

		function tampilkan_data_pagging($halaman,$batas)
		{
			return $this->db->query("SELECT * FROM costumer LIMIT $halaman,$batas");
		}

		function post($nama_costumer,$alamat_costumer,$telpon_costumer,$kode_costumer)
		{
			return $this->db->insert('costumer',array('kode_costumer'=>$kode_costumer,
													  'nama_costumer'=>$nama_costumer,
													  'alamat'=>$alamat_costumer,
													  'telpon_costumer'=>$telpon_costumer));
		}

		function get_one($id)
		{
			return $this->db->get_where('costumer',array('costumer_id'=>$id));
		}

		function edit($id,$nama_costumer,$alamat_costumer,$telpon_costumer)
		{
			$this->db->where('costumer_id',$id);
			$this->db->update('costumer',array('nama_costumer'=>$nama_costumer,
											   'alamat'=>$alamat_costumer,
											   'telpon_costumer'=>$telpon_costumer));

		}

		function delete($id)
		{
			$this->db->where('costumer_id',$id);
			$this->db->delete('costumer');
		}
	}
?>