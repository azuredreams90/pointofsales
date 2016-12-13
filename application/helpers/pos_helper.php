<?php 
	function chek_session()
	{
		$CI =& get_instance();
		$chek = $CI->session->userdata('status_login');

		if($chek !='oke')
		{
			redirect('auth/login');
		}
	}

	function chek_session_login()
	{
		$CI =& get_instance();
		$chek = $CI->session->userdata('status_login');

		if($chek == 'oke')
		{
			redirect('dashboard');
		}
	}

	function tanggal()
	{
		$tanggal = date('Y-m-d');
		return $tanggal;
	}

	function tanggal_indonesia($tanggal)
	{
		$tgl = substr($tanggal,8,2);
		$bln = substr($tanggal,5,2);
		$thn = substr($tanggal,0,4);

		return $tgl."-".bulan($bln)."-".$thn;

		
		
	}

	function bulan($bln)
					{
					switch ($bln) {
						case 1:
						return 'Januari';
						break;
					
						case 2:
						return 'Febuari';
						break;

						case 3:
						return 'Maret';
						break;

						case 4:
						return 'April';
						break;

						case 5:
						return 'Mei';
						break;

						case 6:
						return 'June';
						break;

						case 7:
						return 'July';
						break;

						case 8:
						return 'Agustus';
						break;

						case 9:
						return 'September';
						break;

						case 10:
						return 'Oktober';
						break;

						case 11:
						return 'November';
						break;

						case 12:
						return 'Desember';
						break;
					  			  }

					}

	function kode_barang()
	{
		$CI =& get_instance();
		$chek = $CI->db->query("SELECT kode_barang FROM barang ORDER BY barang_id DESC");
		if($chek->num_rows()>0)
		{
			$chek = $chek->row_array();
			$get_code = $chek['kode_barang'];
			$last_code = substr($get_code,2,3)+1;
			$new_code = "BR".sprintf("%03s",$last_code);
			return $new_code;
		}
		else
		{
			return "BR001";
		}
	}

	function kode_costumer()
	{
		$CI =& get_instance();
		$chek = $CI->db->query("SELECT kode_costumer FROM costumer ORDER BY costumer_id DESC");

		if($chek->num_rows()>0)
		{
			$chek = $chek->row_array();
			$get_code = $chek['kode_costumer'];
			$last_code = substr($get_code,2,3)+1;
			$new_code = "CS".sprintf('%03s',$last_code);
			return $new_code;
		}
		else
		{
			return "CS001";
		}
	}

	function kode_supplier()
	{
		$CI =& get_instance();
		$chek = $CI->db->query("SELECT kode_supplier FROM supplier ORDER BY supplier_id DESC");	
		
		if($chek->num_rows()>0)
		{
			$chek = $chek->row_array();
			$get_code = $chek['kode_supplier'];
			$last_code = substr($get_code,2,3)+1;
			$new_code = "SP".sprintf('%03s',$last_code);
			return $new_code;
		}
		else
		{
			return"SP001";
		}
	}

	function chek_stok($barang_id)
	{
		$CI =& get_instance();
		$beli = "SELECT sum(qty) as jumlah FROM transaksi_beli_detail where barang_id='$barang_id'";
		$beli= $CI->db->query($beli)->row_array();
		$jual = "SELECT sum(qty) as jumlah FROM transaksi_jual_detail where barang_id='$barang_id'";
		$jual= $CI->db->query($jual)->row_array();
		return $beli['jumlah']-$jual['jumlah'];
	}
?>