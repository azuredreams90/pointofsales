<?php 
	class Model_kategori extends CI_Model{

		function tampilkan_data()
		{
			return $this->db->get('kategori_barang');
		}

		function tampilkan_data_pagging($halaman,$batas)
		{
			return $this->db->query("SELECT * FROM kategori_barang LIMIT $halaman,$batas");
		}

		function post($nama_kategori)
		{
			return $this->db->insert('kategori_barang',array('nama_kategori'=>$nama_kategori));
		}

		function get_one($id)
		{
			return $this->db->get_where('kategori_barang',array('kategori_id'=>$id));
		}

		function edit($id,$nama_kategori)
		{
			$this->db->where('kategori_id',$id);
			$this->db->update('kategori_barang',array('nama_kategori'=>$nama_kategori));

		}

		function delete($id)
		{
			$this->db->where('kategori_id',$id);
			$this->db->delete('kategori_barang');
		}
	}
?>