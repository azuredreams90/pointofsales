<body onload="tampilkan_barang()"></body>
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
	function add_barang()
	{
                      var nama_barang = $("#nama_barang").val();
                      var qty = $("#qty").val();
                      $.ajax({
                      	type:"GET",
                      	data:"nama_barang="+nama_barang+"&qty="+qty,
                      	url:"penjualan/input_ajax",
                      	success:function(html)
                      	{
                      		tampilkan_barang();
                      	}
                      });   
	}

	function tampilkan_barang()
	{
		$.ajax({
			type:"GET",
			data:"",
			url:"penjualan/tampil",
			success:function(html)
			{
				$("#data_list").html(html);
			}
		})
	}

	function hapus(id)
	{
		$.ajax({
			type:"GET",
			data:"id="+id,
			url:"penjualan/delete",
			success:function(html)
			{
				$(".hapus"+id).hide(2000,function(){
					alert("Hapus Data Berhasil");
				})
			}
		})
	}

	function selesai()
	{
		var nama_costumer = $("#nama_costumer").val();
		$.ajax({
			type:"GET",
			data:"nama_costumer="+nama_costumer,
			url:"penjualan/selesai",
			success:function(success)
			{
				alert("Selesai");
				tampilkan_barang();
			}
		});
	}
</script>
<h3>Form Penjualan</h3>
<table class="table tabler-bordered">
	<tr>
		<td width="100">Costumer</td>
		<td>
			<div class="col-sm-4">
			<select id="nama_costumer" class="form-control">
				<option value="">--Pilih Nama Costumer--</option>
				<?php 
					foreach ($costumer as $c) {
						echo"<option value='$c->nama_costumer'>$c->nama_costumer</option>";
					}
				 ?>
			</select>
			</div>
		</td>
	</tr>
	<tr>
		<td>Barang</td>
		<td>
			<div class="col-sm-4">
				<select id="nama_barang" class="form-control">
					<option value="">-- Pilih Nama Barang --</option>
					<?php 
						foreach ($barang as $b) {
							echo"<option value='$b->nama_barang'>$b->nama_barang</option>";
						}
					 ?>
				</select>
			</div>
			<div class="col-sm-3" >
				<input type="text" class="form-control"  id="qty" placeholder="Masukan Jumlah Barang">
			</div>
		</td>
	</tr>
	<tr>
		<td colspan='2'>
			<input type="button" id="add" onclick="add_barang()" class="btn btn-primary btn-sm" value="Add Barang">
			<input type="button" id="selesai" onclick="selesai()" class="btn btn-primary btn-sm" value="Selesai">
			<?php echo anchor('penjualan','Kembali',array('class'=>'btn btn-primary btn-sm')); ?>
		</td>
	</tr>
</table>

<div id="data_list">
</div>