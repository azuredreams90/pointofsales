<?php 
	class Transaksi extends CI_Controller{

		function __construct()
		{
			parent::__construct();
			$this->load->model(array('model_barang','model_transaksi','model_transaksi_jual_detail','model_transaksi_beli_detail'));
			chek_session();
		}

		function index()
		{
			if(isset($_POST['submit']))
			{
				$this->model_transaksi->simpan_data();
				redirect('transaksi');
			}
			else
			{
				$data['barang'] = $this->model_barang->tampilkan_data()->result();
				$data['detail'] = $this->model_transaksi->tampilkan_detail_transaksi()->result();
				$this->template->load('template','transaksi/form_transaksi',$data);
			}
		}

		function hapusitem()
		{
			$id = $this->uri->segment('3');
			$this->model_transaksi->hapusitem($id);
			redirect('transaksi');
		}

		function selesai_belanja()
		{
			$username = $this->session->userdata('username');
			$id_op = $this->db->get_where('operator',array('username'=>$username))->row_array();
			$data = array('tanggal_transaksi'=>date('Y-m-d'),'operator_id'=>$id_op['operator_id']);
			$this->model_transaksi->selesai_belanja($data);
			redirect('transaksi');
		}

		function laporan()
		{	
			if(isset($_POST['submit']))
			{
				$tanggal_mulai = $this->input->post('tanggal_mulai');
				$tanggal_berakhir = $this->input->post('tanggal_berakhir');
				$data['laporan'] = $this->model_transaksi->laporan_periode($tanggal_mulai,$tanggal_berakhir)->result();
				$this->template->load('template','transaksi/laporan',$data);
			}
			else
			{
				
				$data['laporan'] = $this->model_transaksi->laporan_default()->result();
				$this->template->load('template','transaksi/laporan',$data);
			}
		}

		function excel()
		{
			header("content-type=appalication/vnd.ms-excel");
			header("content-disposition:attachment;filename=laporantransaksi.xls");
			$data['laporan'] = $this->model_transaksi->laporan_default()->result();
			$this->load->view('transaksi/laporan_excel',$data);
		}

		function pdf()
		{
			$this->load->library('cfpdf');
			$pdf = new FPDF('P','mm','A4');
			$pdf->AddPage();
			$pdf->SetFont('Arial','B','L');
			$pdf->SetFontSize(14);
	        $pdf->Text(10, 10, 'LAPORAN TRANSAKSI');
	        $pdf->SetFont('Arial','B','L');
	        $pdf->SetFontSize(10);
	        $pdf->Cell(10, 10,'','',1);
	        $pdf->Cell(10, 7, 'No', 1,0);
	        $pdf->Cell(27, 7, 'Tanggal', 1,0);
	        $pdf->Cell(30, 7, 'Operator', 1,0);
	        $pdf->Cell(38, 7, 'Total Transaksi', 1,1);
	        // tampilkan dari database
	        $pdf->SetFont('Arial','','L');
	        $data=  $this->model_transaksi->laporan_default();
	        $no=1;
	        $total=0;
	        foreach ($data->result() as $r)
	        {
	            $pdf->Cell(10, 7, $no, 1,0);
	            $pdf->Cell(27, 7, $r->tanggal_transaksi, 1,0);
	            $pdf->Cell(30, 7, $r->nama_lengkap, 1,0);
	            $pdf->Cell(38, 7, $r->total, 1,1);
	            $no++;
	            $total=$total+$r->total;
	        }
	        // end
	        $pdf->Cell(67,7,'Total',1,0,'R');
	        $pdf->Cell(38,7,$total,1,0);
	        $pdf->Output();
		}

		function laporancostumer()
		{
			if(isset($_POST['submit']))
			{
				$tanggal_mulai = $this->input->post('tanggal_mulai');
				$tanggal_berakhir = $this->input->post('tanggal_berakhir');
				$data['laporan'] = $this->model_transaksi_jual_detail->laporan_periode($tanggal_mulai,$tanggal_berakhir)->result();
				$this->template->load('template','transaksi/laporancostumer',$data);
			}
			else
			{
				
				$data['laporan'] = $this->model_transaksi_jual_detail->laporan_default()->result();
				$this->template->load('template','transaksi/laporancostumer',$data);
			}
		}

		function laporanexcelcostumer()
		{
			header("content-type=appalication/vnd.ms-excel");
			header("content-disposition:attachment;filename=laporantransaksi.xls");
			$data['laporan'] = $this->model_transaksi_jual_detail->laporan_default()->result();
			$this->load->view('transaksi/laporan_excel_costumer',$data);
		}

		function laporanpdfcostumer()
		{
			$this->load->library('cfpdf');
			$pdf = new FPDF('P','mm','A4');
			$pdf->AddPage();
			$pdf->SetFont('Arial','B','L');
			$pdf->SetFontSize(14);
	        $pdf->Text(10, 10, 'LAPORAN PEMBELIAN COSTUMER');
	        $pdf->SetFont('Arial','B','L');
	        $pdf->SetFontSize(10);
	        $pdf->Cell(10, 10,'','',1);
	        $pdf->Cell(10, 7, 'No', 1,0);
	        $pdf->Cell(27, 7, 'Tanggal', 1,0);
	        $pdf->Cell(30, 7, 'Nama Costumer', 1,0);
	        $pdf->Cell(38, 7, 'Total Transaksi', 1,1);
	        // tampilkan dari database
	        $pdf->SetFont('Arial','','L');
	        $data=  $this->model_transaksi_jual_detail->laporan_default();
	        $no=1;
	        $total=0;
	        foreach ($data->result() as $r)
	        {
	            $pdf->Cell(10, 7, $no, 1,0);
	            $pdf->Cell(27, 7, $r->tanggal_transaksi, 1,0);
	            $pdf->Cell(30, 7, $r->nama_costumer, 1,0);
	            $pdf->Cell(38, 7, $r->total, 1,1);
	            $no++;
	            $total=$total+$r->total;
	        }
	        // end
	        $pdf->Cell(67,7,'Total',1,0,'R');
	        $pdf->Cell(38,7,$total,1,0);
	        $pdf->Output();
		}

		function laporansupplier()
		{
			if(isset($_POST['submit']))
			{
				$tanggal_mulai = $this->input->post('tanggal_mulai');
				$tanggal_berakhir = $this->input->post('tanggal_berakhir');
				$data['laporan'] = $this->model_transaksi_jual_detail->laporan_periode($tanggal_mulai,$tanggal_berakhir)->result();
				$this->template->load('template','transaksi/laporancostumer',$data);
			}
			else
			{
				
				$data['laporan'] = $this->model_transaksi_beli_detail->laporan_default()->result();
				$this->template->load('template','transaksi/laporansupplier',$data);
			}
		}
	}
?>