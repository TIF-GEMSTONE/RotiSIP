<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="sip">
  <meta name="author" content="sip">
  <title>SIP</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url ('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url ('assets/vendor/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url ('assets/vendor/datatables/dataTables.bootstrap4.css');?>" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url ('assets/css/sb-admin.css');?>" rel="stylesheet">
  <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
     <link rel="stylesheet" href="<?php echo base_url('assets/js/jquery-ui.min.css'); ?>" /> <!-- Load file css jquery-ui -->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script> <!-- Load file jquery -->
</head>
<style>
 * {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial;
}

.header {
    text-align: center;
    padding: 32px;
}

.row {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    -ms-flex-wrap: wrap; /* IE10 */
    flex-wrap: wrap;
    padding: 10px;
}

/* Create four equal columns that sits next to each other */
.column {
    -ms-flex: 50%; /* IE10 */
    flex: 50%;
    max-width: 50%;
    padding: 0 4px;
}

.column img {
    margin-top: 8px;
    vertical-align: middle;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 800px) {
    .column {
        -ms-flex: 50%;
        flex: 50%;
        max-width: 50%;
    }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .column {
        -ms-flex: 100%;
        flex: 100%;
        max-width: 100%;
    }
}
</style>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="<?php echo base_url ();?>Dashboard/Home">Roti SIP</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo base_url();?>Penjualan">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Penjualan</span>
          </a>
        </li>
       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="<?php echo base_url();?>Pesanan">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Pesanan</span>
          </a>
        </li>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
            <a class="nav-link" href="<?php echo base_url();?>Grafik">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Grafik Penjualan</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
            <a class="nav-link" href="<?php echo base_url();?>LaporanSIP">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Laporan</span>
          </a>
        </li>
        
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>Login/Logout">Logout</a>
        </li>
      </ul>
    </div>
  </nav>


  <div class="content-wrapper">
    <div class="container-fluid">
      
<!-- ================================CONTAINER============================================================ -->

  <?php if(isset($data)){
    ?>
        <form class="form-horizontal" method="post" action="">
            <div class="control-group">
                        <div class="form-group">
                          <label class="col-lg-4 col-sm-2 control-label"><h3>Detail Transaksi</h3></label>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-sm-2 control-label">Tanggal</label>
                            <div class="col-lg-10">
                              <input class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="<?php echo $data[0]->tgl_transaksi?>" readonly></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 col-sm-2 control-label">No. Transaksi</label>
                            <div class="col-lg-10">
                              <input class="form-control" id="no_transaksi" name="no_transaksi" value="<?php echo $data[0]->no_transaksi?>" readonly></input>
                            </div>
                        </div>
<!--                         <div class="form-group">
                            <label class="col-lg-4 col-sm-2 control-label">Jumlah</label>
                            <div class="col-lg-10">
                                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo $row->jumlah?>" readonly></input>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <label class="col-lg-4 col-sm-2 control-label">Total Jual</label>
                            <div class="col-lg-10">
                              <input class="form-control" id="total_jual" name="total_jual" value="<?php echo $row->total_jual?>" readonly ></input>
                            </div>
                        </div> -->
                        <div class="form-group">
                          <div class="col-lg-10">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            
                            <tr>
                              <th>Nama Roti</th>
                              <th>Harga</th>
                              <th>Jumlah</th>
                              <th>Total</th>
                            </tr>
                            <tr>
                              <?php foreach ($data as $row) : ?>
                              <td><?php echo $row->nama_roti; ?></td>
                              <td><?php echo $row->harga; ?></td>
                              <td><?php echo $row->jumlah; ?></td>
                              <td><?php echo $row->total; ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                              <th colspan="3">Total Beli</th>
                              <th><?php echo $data[0]->total_jual?> </th>
                            </tr>
                          
                          </table>
                        </div>
                      </div>
</form>
                      <div class="form-group row">
                        <!-- <div class="col-sm-1">
                          <a href="<?php echo site_url('LaporanSIP/index/')?>"><button class="btn-info">Kembali</button></a>
                        </div> -->
                        <div class="col-sm-1">
                          <button onClick="window.print();" class="btn-info">CETAK</button>
                        </div>
                      </div>
                    </div>

        

<?php }
?>