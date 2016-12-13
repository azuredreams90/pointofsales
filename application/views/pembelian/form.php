<body onload="load_temp()">
	
</body>
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
	function add_barang()
	{
		

		if(nama_barang='')
		{
			alert("Anda harus memilih barang");	
		}
		else
		{
			var nama_barang = $("#nama_barang").val();
			var qty = $("#qty").val();
			var harga = $("#harga").val();

			$.ajax({
			type:"GET",
			url:"pembelian/input_ajax",
			data:"nama_barang="+nama_barang+"&qty="+qty+"&harga="+harga,
			success:function(html)
			{
				load_temp();
			}
				});
		}
		
	}

	function load_temp()
	{
		$.ajax({
			type:"GET",
			url:"pembelian/load_temp",
			data:"",
			success:function(html)
			{
				$("#list").html(html);
			}
		});
	}

	function hapus(id)
	{
		$.ajax({
			type:"GET",
			url:"pembelian/hapus",
			data:"id="+id,
			success:function(html)
			{
				$("#hapus"+id).hide(2000,function(){
					alert("Data Telah Di Hapus");
				});
			}
		});
	}

	function simpan()
	{
		var nama_supplier = $("#nama_supplier").val();
		var nama_barang = $("#nama_barang").val();
		var qty = $("#qty").val();
		var harga = $("#harga").val();

		if(nama_supplier == '' || nama_barang =='' || qty=='' || harga=='')
		{
			alert("Isikan nama Barang ,supplier,harga,QTY telebih dahulu");
			die;
		}
		else
		{
			$.ajax({
			type:"GET",
			data:"nama_supplier="+nama_supplier,
			url:"pembelian/selesai",
			success:function(html)
			{
				alert("Proses Simpan Berhasil");
				load_temp();
			}
				});
		}
		
	}
</script>
<h3>Form Transaksi Pembelian</h3>
<?php echo form_open('pembelian') ?>
<table class="table table-bordered">
	<tr>
		<td>Supplier</td>
		<td><div class="col col-sm-6">
			<select id="nama_supplier" class="form-control">
				<option value="">-- Pilih Nama Supplier --</option>
				<?php 
				foreach($supplier as $s)
				{
				   echo"<option value='$s->nama_supplier'>$s->nama_supplier</option>";
				}
				 ?>
				
			</select>
		</div></td>
	</tr>
	<tr>
		<td>Barang</td>
		<td>
			<div class="col col-sm-4">
				<select id="nama_barang" class="form-control">
					<option value="">-- Pilih nama barang yang ingin di pesan --</option>
					<?php 
						foreach($barang as $b)
						{
							echo"<option value='$b->nama_barang'>$b->nama_barang</option>";
						}
					 ?>
				</select>
			</div>
			<div class="col col-sm-1"><input type="text" id="qty" class="form-control" name="qty" placeholder="QTY"></div>
			<div class="col col-sm-3"><input type="text" id="harga" class="form-control" name="harga" placeholder="Harga"></div>
		</td>
	</tr>
	<tr>
		<td colspan='2'>
			<input type="button" onclick="simpan()" class="btn btn-primary" value="Simpan">
			<input type="button" onclick="add_barang()" onclick="add_barang()" name="add" class="btn btn-primary" value="Add Barang">
			<?php echo anchor('pembelian','Kembali',array('class'=>'btn btn-primary'));?>
		</td>
	</tr>
</table>
</form>

<div id="list">
	
</div>