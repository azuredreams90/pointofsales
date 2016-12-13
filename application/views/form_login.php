<?php echo form_open('auth/login');?>
	<table class="table table-bordered">
		<tr>
			<td>Username</td>
			<td><input type="text" class="form-control" name="username" placeholder="Username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" class="form-control" placeholder="Password"></td>
		</tr>
		<tr>
			<td colspan='2'><input type="submit" class="btn btn-default btn-sm" name="submit" value="Login"></td>
		</tr>
	</table>
</form>