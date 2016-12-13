<h3>Tambahkan Costumer</h3>

<?php echo form_open('costumer/post');?>

	<table class="table table-bordered">
		<tr>
			<td width='130'>Nama Costumer</td>
			<td><div class="col-sm-4"><input class="form-control" type="text" name="nama_costumer" placeholder="Nama Costumer"></div></td>
		</tr>
		<tr>
			<td width='130'>Alamat Costumer</td>
			<td><div class="col-sm-4"><textarea name="alamat_costumer" class="form-control" placeholder="Alamat Costumer"></textarea></div></td>
		</tr>
		<tr>
			<td width='130'>Telpon Costumer</td>
			<td><div class="col-sm-4"><input type="text" class="form-control" name="telpon_costumer" placeholder="Telpon Costumer"></div></td>
		</tr>
		<tr>
			<td colspan='2'>
				<input type="submit" name="submit" class="btn btn-primary btn-sm" value="Simpan Costumer">
				<?php echo anchor('costumer','Kembali',array('class'=>'btn btn-primary btn-sm'));?>
			</td>
		</tr>
	</table>

</form>