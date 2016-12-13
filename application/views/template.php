<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Point Of Sales Application</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-static-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Point Of Sales</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><?php echo anchor('kategori','Kategori Barang');?></li>
            <li><?php echo anchor('barang','Data Barang');?></li>
            <li><?php echo anchor('costumer','Costumer'); ?></li>
            <li><?php echo anchor('supplier','Supplier'); ?></li>
            <li><?php echo anchor('operator',' Operator Sistem');?></li>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?php echo anchor('stok','Laporan Stok');?></li>
                <li><?php echo anchor('stok/word','Laporan Stok Word');?></li>
                <li><?php echo anchor('transaksi/laporancostumer','Laporan Penjualan Costumer');?></li>
                <li><?php echo anchor('transaksi/laporanexcelcostumer','Laporan Excel Penjualan Costumer');?></li>
                <li><?php echo anchor('transaksi/laporanpdfcostumer','Laporan Pdf Penjualan Costumer');?></li>
              <li><?php echo anchor('transaksi/laporansupplier','Laporan Pembelian Supplier');?></li>
              <li><?php echo anchor('transaksi/laporanexcelsupplier','Laporan Excel Pembelian Supplier');?></li>
              <li><?php echo anchor('transaksi/laporan','Laporan Transaksi');?></li>
                <li><?php echo anchor('transaksi/excel','Laporan Excel') ?></li>
                <li><?php echo anchor ('transaksi/pdf','Laporan PDF');?></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transaksi<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?php echo anchor('transaksi','Form Transaksi');?></li>
                 <li><?php echo anchor('pembelian','Pembelian Barang Supplier'); ?></li>
                 <li><?php echo anchor('penjualan','Penjualan Barang Costumer'); ?></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><?php echo anchor('auth/logout','Logout');?></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="container">

      <?php echo $contents;?>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
