<?php 
	class Model_operator extends CI_Model{

		function login($username,$password)
		{
			$chek = $this->db->get_where('operator',array('username'=>$username,
														  'password'=>md5($password)));

			if($chek->num_rows()>0)
			{
				$this->db->where('username',$username);
				$this->db->update('operator',array('last_login'=>date('Y-m-d')));
				return 1;
			}
			else
			{
				return 0;
			}
		}

		function tampilkan_data()
		{
			return $this->db->get('operator');
		}

		function post($nama_lengkap,$username,$password,$level)
		{
			return $this->db->insert('operator',array('nama_lengkap'=>$nama_lengkap,
													  'username'=>$username,
													  'password'=>md5($password),
													  'last_login'=>date('Y-m-d'),
													  'level'=>$level));
		}

		function tampilkan_data_pangging($halaman,$batas)
		{
			return $this->db->query("SELECT * FROM operator LIMIT $halaman,$batas");
		}

		function get_one($id)
		{
			return $this->db->get_where('operator',array('operator_id'=>$id));
		}

		function edit($id,$nama_lengkap,$username,$password)
		{
			if(empty($password))
			{
				$this->db->where('operator_id',$id);
				$this->db->update('operator',array('nama_lengkap'=>$nama_lengkap,
											       'username'=>$username));
			}
			else
			{
				$this->db->where('operator_id',$id);
				$this->db->update('operator',array('nama_lengkap'=>$nama_lengkap,
											       'username'=>$username,
											       'password'=>md5($password)));
			}
			
		}

		function delete($id)
		{
			$this->db->where('operator_id',$id);
			$this->db->delete('operator');
		}
	}
?>