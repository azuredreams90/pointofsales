	<h3>Lihat Data Operator</h3>

	<?php echo anchor('operator/post','Tambahkan Post Operator',array('class'=>'btn btn-danger btn-sm'));?>

	<hr>

	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Nama Lengkap</th>
			<th>Username</th>
			<th>Last_Login</th>
			<th colspan='2'>Operasi</th>
		</tr>
		<?php 
		$no=1;
			foreach($record as $r)
			{
				echo"<tr>
						<td width='20'>$no</td>
						<td width='130'>".$r->nama_lengkap."</td>
						<td>".$r->username."</td>
						<td>".$r->last_login."</td>
						<td width='20'>".anchor('operator/edit/'.$r->operator_id,"<span class='glyphicon glyphicon-edit'></span>",array('title'=>'Edit Data '.$r->nama_lengkap))."</td>
						<td width='20'>".anchor('operator/delete/'.$r->operator_id,"<span class='glyphicon glyphicon-trash'></span>",array('title'=>'Delete Data '.$r->nama_lengkap))."</td>
					</tr>";
			
		$no ++;
			}
		?>
	</table>

	<?php echo $pagging; ?>