<h3>Edit Barang</h3>
<?php echo form_open('barang/edit');?>
	<input type="hidden" name="id" value="<?php echo $record['barang_id'];?>">
	<table class='table table-bordered'>
		<tr>
			<td width='100'>Nama Barang</td>
			<td><input type="text" name="nama_barang" class="form-control" value="<?php echo $record['nama_barang'];?>"></td>
		</tr>
		<tr>
			<td width='100'>Kategori Barang</td>
			<td>
				<select name="kategori" class="form-control">
					<?php 
						foreach($kategori as $k)
						{
							echo"<option value='$k->kategori_id'";
							echo $record['kategori_id'] == $k->kategori_id?'selected':'';
							echo">$k->nama_kategori</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td width='100'>Harga</td>
			<td><input type="text" name="harga" class="form-control" value="<?php echo $record['harga'];?>"></td>
		</tr>
		<tr>
			<td colspan='2'>
				<input type="submit" name="submit" class="btn btn-primary btn-sm" value="Edit Barang">
				<?php echo anchor('barang','Kembali',array('class'=>'btn btn-primary btn-sm'));?>
			</td>
		</tr>
	</table>

</form>