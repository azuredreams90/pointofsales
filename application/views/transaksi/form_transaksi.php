	<h3>Form Transaksi</h3>
	
	<?php echo form_open('transaksi');?>

		<table class="table table-bordered">
			<tr class="success">
				<th>Form</th>
			</tr>
			<tr>
				<td>
					<div class="col-sm-6"><input list="barang" name="barang" placeholder="Masukan Nama Barang" class="form-control"></div>
					<div class="col-sm-1"><input type="text" name="qty" placeholder="Qty" class="form-control"></div>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="Simpan" class="btn btn-default btn-sm">
					<?php echo anchor('transaksi/selesai_belanja','Selesai Belanja',array('class'=>'btn btn-default btn-sm'));?>
				</td>
			</tr>
		</table>
	</form>

	<table class="table table-bordered">
		<tr class="success">
			<th colspan='6'>Detail Transaksi</th>
		</tr>
		<tr>
			<th>No</th>
			<th>Nama Barang</th>
			<th>Qty</th>
			<th>Harga</th>
			<th>Sub Total</th>
			<th>Cancel</th>
		</tr>
		<?php
		$no =1;
		$total = 0;
			foreach($detail as $r)
			{
				echo"<tr>
						<td>$no</td>
						<td>$r->nama_barang</td>
						<td>$r->qty</td>
						<td>$r->harga</td>
						<td>".$r->qty * $r->harga."</td>
						<td>".anchor('transaksi/hapusitem/'.$r->t_detail_id,'Hapus')."</td>
					</tr>";
					$no++;
					$total = $total+($r->qty * $r->harga);
			}
		?>
		<tr>
			<td colspan='5'><p align='right'>Total</p></td>
			<td><?php echo $total;?></td>
		</tr>
	</table>

	<datalist id="barang">
		<?php 
			foreach($barang as $b)
			{
				echo"<option value='$b->nama_barang'>";
			}
		?>
	</datalist>