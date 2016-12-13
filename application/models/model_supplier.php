<?php 
	class Model_supplier extends CI_Model{

		function tampilkan_data()
		{
			return $this->db->get('supplier');
		}

		function tampilkan_data_pagging($halaman,$batas)
		{
			return $this->db->query("SELECT * FROM supplier LIMIT $halaman,$batas");
		}

		function post($nama_supplier,$alamat_supplier,$telpon_supplier,$kode_supplier)
		{
			return $this->db->insert('supplier',array('kode_supplier'=>$kode_supplier,
													  'nama_supplier'=>$nama_supplier,
													  'alamat_supplier'=>$alamat_supplier,
													  'telpon_supplier'=>$telpon_supplier));
		}

		function get_one($id)
		{
			return $this->db->get_where('supplier',array('supplier_id'=>$id));
		}

		function edit($id,$nama_supplier,$alamat_supplier,$telpon_supplier)
		{
			$this->db->where('supplier_id',$id);
			$this->db->update('supplier',array('nama_supplier'=>$nama_supplier,
											   'alamat_supplier'=>$alamat_supplier,
											   'telpon_supplier'=>$telpon_supplier));

		}

		function delete($id)
		{
			$this->db->where('supplier_id',$id);
			$this->db->delete('supplier');
		}
	}
?>