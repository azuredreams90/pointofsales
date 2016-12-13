<h3>Lihat Data Stok</h3>

<hr>

<table  border="1">
	<tr>
		<th>No</th>
		<th>Kode Barang</th>
		<th>Nama Barang</th>
		<th>Kategori Barang</th>
		<th>Stok</th>
	</tr>
	<?php
		$no=1; 
		foreach($record as $r)
		{
			echo"<tr>
					<td width='20'>$no</td>
					<td>".$r->kode_barang."</td>
					<td>".$r->nama_barang."</td>
					<td>".$r->nama_kategori."</td>
					<td>".chek_stok($r->barang_id)."</td>
				</tr>";
			$no++;
		}
		
	?>
</table>
