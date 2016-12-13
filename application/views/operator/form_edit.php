<h3>Edit Data Operator</h3>
<?php echo form_open('operator/edit');?>
<input type="hidden" name="id" value="<?php echo $record['operator_id']; ?>">
	<table class="table table-bordered">
		<tr>
			<td width='100'>Nama Lengkap</td>
			<td><input type="text" name="nama_lengkap" class="form-control" value="<?php echo $record['nama_lengkap']; ?>"></td>
		</tr>
		<tr>
			<td width='100'>Username</td>
			<td><input type="text" name="username" class="form-control" value="<?php echo $record['username']; ?>"></td>
		</tr>
		<tr>
			<td width='100'>Password</td>
			<td><input type="password" name="password" class="form-control" placeholder="Password"></td>
		</tr>
		<tr>
			<td>Level</td>
			<td>
				<div class="col-sm-3">
					<?php $level = array('penjualan'=>'Penjualan','pembelian'=>'Pembelian');
						echo form_dropdown('level', $level, $record['level'],'class="form-control"');
					?>

				</div>
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				<input type="submit" name="submit" class="btn btn-primary btn-sm" value="Edit Data Operator">
				<?php echo anchor('operator','Kembali',array('class'=>'btn btn-primary btn-sm'));?>
			</td>
		</tr>
	</table>
</form>