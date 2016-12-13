<?php 
	class Model_barang extends CI_Model{

		function tampilkan_data()
		{
			$query = "SELECT b.barang_id, b.nama_barang, b.kode_barang, b.harga, kb.nama_kategori
					  FROM barang as b, kategori_barang as kb
					  WHERE b.kategori_id = kb.kategori_id";
			
			return $this->db->query($query);
		}

		function tampilkan_data_pagging($halaman,$batas)
		{
			$query = "SELECT b.kode_barang, b.barang_id, b.nama_barang, b.harga, kb.nama_kategori
					  FROM barang as b, kategori_barang as kb
					  WHERE b.kategori_id = kb.kategori_id
					  LIMIT $halaman,$batas";
			
			return $this->db->query($query);
		}

		function post($kategori,$nama_barang,$harga,$kode_barang)
		{
			return $this->db->insert('barang',array('kode_barang'=>$kode_barang,
													'kategori_id'=>$kategori,
													'nama_barang'=>$nama_barang,
													'harga'=>$harga
													));
		}

		function get_one($id)
		{
			return $this->db->get_where('barang',array('barang_id'=>$id));
		}

		function edit($id,$kategori,$nama_barang,$harga)
		{
			$this->db->where('barang_id',$id);
			$this->db->update('barang',array('kategori_id'=>$kategori,'nama_barang'=>$nama_barang,'harga'=>$harga));
		}

		function delete($id)
		{
			$this->db->where('barang_id',$id);
			$this->db->delete('barang');
		}
	}
?>