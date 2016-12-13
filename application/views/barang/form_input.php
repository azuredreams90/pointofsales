<h3>Tambahkan Barang</h3>
<?php echo form_open('barang/post');?>

	<table class="table table-bordered">
		<tr>
			<td width='100'>Nama Barang</td>
			<td><input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang"></td>
		</tr>
		<tr>
			<td width='100'>Kategori Barang</td>
			<td>
				<select name="kategori" class="form-control">
					<?php 
						foreach($kategori as $k)
						{
							echo"<option value='$k->kategori_id'>$k->nama_kategori</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td width='100'>Harga</td>
			<td><input type="text" class="form-control" name="harga" placeholder="Harga"></td>
		</tr>
		<tr>
			<td colspan='2'>
				<input type="submit" name="submit" value="Simpan Barang" class="btn btn-primary btn-sm"> 
				<?php echo anchor('barang','Kembali',array('class'=>'btn btn-primary btn-sm'));?>
			</td>
		</tr>
	</table>

</form>