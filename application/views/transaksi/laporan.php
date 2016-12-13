<h3>Laporan Transaksi</h3>
<?php echo form_open('transaksi/laporan') ?>
<table class="table table-bordered">
	<tr>
		<td>
			<div class="col-sm-4"><input type="text" name="tanggal_mulai" class="form-control" placeholder="Tanggal Mulai"></div>
			<div class="col-sm-4"><input type="text" name="tanggal_berakhir" class="form-control" placeholder="Tanggal Berakhir"></div>
		</td>
	</tr>
	<tr>
		<td colspan='2'><input type="submit" name="submit" value="Proses" class="btn btn-primary btn-sm"></td>
	</tr>
</table>
</form>


<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Tanggal Transaksi</th>
		<th>Operator</th>
		<th>Total Transaksi</th>
	</tr>
	<?php 
	$no=1;
	$total = 0;
		foreach($laporan as $l)
		{
			echo"<tr>
					<td>$no</td>
					<td>$l->tanggal_transaksi</td>
					<td>$l->nama_lengkap</td>
					<td>$l->total</td>
				</tr>";
	$no++;
	$total = $total + $l->total;
		}
	?>
				<tr>
					<td colspan='3'><p align='right'>Jumlah Pendapatan yang di dapat</p></td>
					<td><?php echo $total;?></td>
				</tr>
</table>