<h3>Lihat Data Costumer</h3>

<?php echo anchor('costumer/post','Tambahkan Costumer',array('class'=>'btn btn-danger btn-sm'));?>

<hr>

<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Kode Costumer</th>
		<th>Nama Costumer</th>
		<th>No Telpon</th>
		<th>Alamat</th>
		<th colspan='2'>Operasi</th>
	</tr>
	<?php 
	$no =1+ $this->uri->segment(3);
		foreach($record as $r)
		{
			echo"<tr>
					<td width='10'>$no</td>
					<td>".$r->kode_costumer."</td>
					<td>".$r->nama_costumer."</td>
					<td>".$r->telpon_costumer."</td>
					<td>".$r->alamat."</td>
					<td width='10'>".anchor('costumer/edit/'.$r->costumer_id, 'Edit')."</td>
					<td width='10'>".anchor('costumer/delete/'.$r->costumer_id,'Delete')."</td>
				</tr>";
			$no++;
		}
	?>
</table>

<?php echo $pagging; ?>