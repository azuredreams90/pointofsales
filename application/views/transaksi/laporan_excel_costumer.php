<table border='1'>
	<tr>
		<th colspan='4'><p align='center'>Laporan Excel</p></th>
	</tr>
	<tr>
		<th>No</th>
		<th>Tanggal Transaksi</th>
		<th>Operator</th>
		<th>Total Transaksi</th>
	</tr>
	<?php 
		$no=1;
		$total=0;
		foreach($laporan as $r)
		{
			echo"<tr>
					<td>$no</td>
					<td>".$r->tanggal_transaksi."</td>
					<td>".$r->nama_costumer."</td>
					<td>".$r->total."</td>		
				</tr>
				";
			$total = $total+$r->total;
			$no++;
		}
	 ?>
	 <tr>
		<td colspan='3'><p align='right'>Jumlah Pendapatan yang didapat</p></td>
		<td><?php echo $total; ?></td>
	</tr>
</table>