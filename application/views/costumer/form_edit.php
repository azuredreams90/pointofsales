<h3>Edit Costumer</h3>

<?php echo form_open('costumer/edit');?>
<input type="hidden" name="id" value="<?php echo $record['costumer_id'];?>">
	<table class="table table-bordered">
		<tr>
			<td width='130'>Nama Costumer</td>
			<td>
				<div class='col-sm-4'>
					<input type="text" name="nama_costumer" class="form-control" value="<?php echo $record['nama_costumer']; ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td width='130'>Alamat Costumer</td>
			<td>
				<div class='col-sm-4'>
					<textarea name="alamat_costumer" class="form-control"><?php echo $record['alamat'];?></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<td width='130'>Telpon Costumer</td>
			<td>
				<div class='col-sm-4'>
					<input type="text" name="telpon_costumer" class="form-control" value="<?php echo $record['telpon_costumer'];?>">
				</div>
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				<input type="submit" class="btn btn-primary btn-sm" name="submit" value="Edit Costumer">
				<?php echo anchor('costumer','Kembali',array('class'=>'btn btn-primary btn-sm'));?>
			</td>
		</tr>
	</table>

</form>