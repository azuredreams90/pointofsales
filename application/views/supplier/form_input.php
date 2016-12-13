<h3>Tambahkan Supplier</h3>

<?php echo form_open('supplier/post');?>

	<table class="table table-bordered">
		<tr>
			<td width='130'>Nama Supplier</td>
			<td><div class="col-sm-4"><input class="form-control" type="text" name="nama_supplier" placeholder="Nama Supplier"></div></td>
		</tr>
		<tr>
			<td width='130'>Alamat Supplier</td>
			<td><div class="col-sm-4"><textarea name="alamat_supplier" class="form-control" placeholder="Alamat Supplier"></textarea></div></td>
		</tr>
		<tr>
			<td width='130'>Telpon Supplier</td>
			<td><div class="col-sm-4"><input type="text" name="telpon_supplier" class="form-control" placeholder="Telpon Supplier"></div></td>
		</tr>
		<tr>
			<td colspan='2'>
				<input type="submit" name="submit" class="btn btn-primary btn-sm" value="Simpan Supplier">
				<?php echo anchor('supplier','Kembali',array('class'=>'btn btn-primary btn-sm'));?>
			</td>
		</tr>
	</table>

</form>