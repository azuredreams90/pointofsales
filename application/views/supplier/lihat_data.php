<h3>Lihat Data Costumer</h3>

<?php echo anchor('supplier/post','Tambahkan Supplier',array('class'=>'btn btn-danger btn-sm'));?>

<hr>

<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Kode Supplier</th>
		<th>Nama supplier</th>
		<th>No Telpon</th>
		<th>Alamat Supplier</th>
		<th colspan='2'>Operasi</th>
	</tr>
	<?php 
	$no =1+ $this->uri->segment(3);
		foreach($record as $r)
		{
			echo"<tr>
					<td width='10'>$no</td>
					<td>".$r->kode_supplier."</td>
					<td>".$r->nama_supplier."</td>
					<td>".$r->telpon_supplier."</td>
					<td>".$r->alamat_supplier."</td>
					<td width='10'>".anchor('supplier/edit/'.$r->supplier_id, 'Edit')."</td>
					<td width='10'>".anchor('supplier/delete/'.$r->supplier_id,'Delete')."</td>
				</tr>";
			$no++;
		}
	?>
</table>

<?php echo $pagging; ?>