<h3>Edit Supplier</h3>

<?php echo form_open('supplier/edit');?>
<input type="hidden" name="id" value="<?php echo $record['supplier_id'];?>">
	<table class="table table-bordered">
		<tr>
			<td width='130'>Nama Supplier</td>
			<td>
				<div class='col-sm-4'>
					<input type="text" name="nama_supplier" class="form-control" value="<?php echo $record['nama_supplier']; ?>">
				</div>
			</td>
		</tr>
		<tr>
			<td width='130'>Alamat Supplier</td>
			<td>
				<div class='col-sm-4'>
					<textarea name="alamat_supplier" class="form-control"><?php echo $record['alamat_supplier'];?></textarea>
				</div>
			</td>
		</tr>
		<tr>
			<td width='130'>Telpon Supplier</td>
			<td>
				<div class='col-sm-4'>
					<input type="text" name="telpon_supplier" class="form-control" value="<?php echo $record['telpon_supplier'];?>">
				</div>
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				<input type="submit" class="btn btn-primary btn-sm" name="submit" value="Edit Supplier">
				<?php echo anchor('supplier','Kembali',array('class'=>'btn btn-primary btn-sm'));?>
			</td>
		</tr>
	</table>

</form>