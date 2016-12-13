<h3>Tambahkan Kategori</h3>

<?php echo form_open('kategori/post');?>

	<table class="table table-bordered">
		<tr>
			<td width='130'>Nama Kategori</td>
			<td><div class="col-sm-4"><input class="form-control" type="text" name="nama_kategori" placeholder="Nama Kategori"></div></td>
		</tr>
		<tr>
			<td colspan='2'>
				<input type="submit" name="submit" class="btn btn-primary btn-sm" value="Simpan Kategori">
				<?php echo anchor('kategori','Kembali',array('class'=>'btn btn-primary btn-sm'));?>
			</td>
		</tr>
	</table>

</form>