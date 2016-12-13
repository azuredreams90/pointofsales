<h3>Lihat Data Barang</h3>

<?php echo anchor('barang/post','Tambahkan Data Barang',array('class'=>'btn btn-danger btn-sm'));?>

<hr>

<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Kode Barang</th>
		<th>Nama Barang</th>
		<th>Kategori Barang</th>
		<th>Harga</th>
		<th colspan='2'>Operasi</th>
	</tr>
	<?php
		$no=1+$this->uri->segment(3); 
		foreach($record as $r)
		{
			echo"<tr>
					<td width='20'>$no</td>
					<td>".$r->kode_barang."</td>
					<td>".$r->nama_barang."</td>
					<td>".$r->nama_kategori."</td>
					<td>".$r->harga."</td>
					<td width='20'>".anchor('barang/edit/'.$r->barang_id,'Edit')."</td>
					<td width='20'>".anchor('barang/delete/'.$r->barang_id,'Delete')."</td>
				</tr>";
			$no++;
		}
		
	?>
</table>

<?php echo $pagging; ?>