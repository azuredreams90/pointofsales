<h3>Edit Kategori</h3>

<?php echo form_open('kategori/edit');?>
<input type="hidden" name="id" value="<?php echo $record['kategori_id'];?>">
	<table class="table table-bordered">
		<tr>
			<td width='130'>Nama Kategori</td>
			<td>
				<div class='col-sm-4'>
					<input type="text" name="nama_kategori" class="form-control" value="<?php echo $record['nama_kategori']; ?>"></td>
				</div>
		</tr>
		<tr>
			<td colspan='2'>
				<input type="submit" class="btn btn-primary btn-sm" name="submit" value="Edit Kategori">
				<?php echo anchor('kategori','Kembali',array('class'=>'btn btn-primary btn-sm'));?>
			</td>
		</tr>
	</table>

</form>