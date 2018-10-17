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
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="<?php echo base_url ();?>Login/Home">Roti SIP</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

       <?php
        $this->load->view('Menu');
      ?>
      
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <div class="dropdown-divider"></div>
              <span class="text-danger">
            </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>Login/Logout">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="content-wrapper">
    <div class="container-fluid">

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url();?>Login/Home">Home</a>
        </li>
        <li class="breadcrumb-item active">Tables</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-2">
        <div class="card-header">
          <i class="fa fa-table"></i>Data Pesanan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
          <div>
          <p>
            <form method="post" action="input">
            <div class="container">
              
              <th>
            <div class="container">
            <div class="form-group row">
            <div class="col-xs-4">
            <label  for="nama">Nama Pemesan:</label>
            <input class="form-control" placeholder="Masukan Nama" type="text" name="nama_pemesan" value="<?php if(isset($data)) { echo $data[0]->nama_pemesan; } ?>">
            </div>
          </div>

              <div class="form-group row">
              <div class="col-xs-4">
              <label for="nomor">Nomer Telepon: </label>
              <input class="form-control" placeholder="Masukan Nomor" type="text" name="no_telp" value="<?php if(isset($data)) { echo $data[0]->no_telp; } ?>">
    
                </div>
          </div>

              <div class="form-group row">
              <div class="col-xs-4">
              <label for="roti">Nama Roti:</label>
                <select class="form-control" name="nama_roti">
                  <option value="0">-PILIH ROTI-</option>
                <?php foreach ($roti as $row){ ?>
                  <option value="<?php echo $row->id_roti;?>"><?php echo $row->nama_roti;?></option>
                  <?php }?>
                </select>
              </div>
            </div>
                

              <div class="form-group row">
              <div class="col-xs-4">
              <label for="Jumlah">Jumlah Roti: </label>
              <input class="form-control" placeholder="Masukan Jumlah" type="text" name="jumlah_roti" value="<?php if(isset($data)) { echo $data[0]->jumlah_roti; } ?>">
          </div>
          </div>

          </th>

          <td>     
            <!-- <div class="container"> 
              <div class="form-group row">
              <div class="col-xs-4">
              <label for="Pesan">Tanggal Pesan:</label>
              <input class="form-control" type="date" name="tgl_pesan" value="<?php if(isset($data)) { echo $data[0]->tgl_pesan; } ?>">
            </div>
          </div>
        </div> -->

            <div class="container">
              <div class="form-group row">
              <div class="col-xs-4">
              <label for="Pesan">Tanggal Ambil:</label>
              <input class="form-control" type="date" name="tgl_ambil" value="<?php if(isset($data)) { echo $data[0]->tgl_ambil; } ?>">
            </div>
          </div>
        </div>

            <div class="container">
              <div class="form-group row">
              <div class="col-xs-4">
              <label for="Pesan">Jam Ambil:</label>
              <input class="form-control" type="time" name="jam_ambil" value="<?php if(isset($data)) { echo $data[0]->jam_ambil; } ?>">
          </div>
        </div>
      </div>

      <div class="container">
              <div class="form-group row">
              <div class="col-xs-4">
              <label for="alamat">Alamat</label>
              <input class="form-control" type="textarea" name="alamat" value="<?php if(isset($data)) { echo $data[0]->alamat_antar; } ?>">
          </div>
        </div>
      </div>

              <input type="submit" class="btn btn-success" name="btnTambah" value="Simpan"/>
              <a class="btn btn-warning" href="<?php echo base_url()?>Pesanan">Kembali</a>


              </div>
            </td>
          </form>
          </p>
    </div>
        </div>

          </div>
        </div>

      </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url ('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url ('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url ('asstes/vendor/chart.js/Chart.min.js')?>"></script>
    <script src="<?php echo base_url ('asstes/vendor/datatables/jquery.dataTables.js')?>"></script>
    <script src="<?php echo base_url ('asstes/vendor/datatables/dataTables.bootstrap4.js')?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url ('asstes/js/sb-admin.min.js')?>"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url ('asstes/js/sb-admin-datatables.min.js')?>"></script>
    <script src="<?php echo base_url ('asstes/vendor/chart.js/Chart.min.js')?>"></script>
  </div>
</body>

</html>
