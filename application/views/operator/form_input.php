<h3>Input Data Operator</h3>
<?php echo form_open('operator/post');?>
	<table class="table table-bordered">
		<tr>
			<td width='20'>Nama Lengkap</td>
			<td><input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap"></td>
		</tr>
		<tr>
			<td width='20'>Username</td>
			<td><input type="text" class="form-control" name="username" placeholder="Username"></td>
		</tr>
		<tr>
			<td width='20'>Password</td>
			<td><input type="password" class="form-control" name="password" placeholder="Password"></td>
		</tr>
		<tr>
			<td>Level</td>
			<td>
				<div class="col-sm-3">
				<?php $level=array('penjualan'=>'Penjualan','pembelian'=>'Pembelian'); 
				echo form_dropdown('level', $level, '','class="form-control"');
				?>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				<input type="submit" name="submit" value="Simpan Data Operator" class="btn btn-primary btn-sm">
				<?php echo anchor('operator','Kembali',array('class'=>'btn btn-primary btn-sm'))?>
			</td>
		</tr>
	</table>
</form>