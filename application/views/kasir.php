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

  <script src="<?= base_url('assets/jquery-2.1.4.min.js') ?>"></script>
  <script src="<?= base_url('assets/bootstrap-3.3.5/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= base_url('assets/datatables/js/dataTables.bootstrap.js') ?>"></script>
  <script src="<?= base_url('assets/maskMoney/jquery.maskMoney.min.js') ?>"></script>
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
      <!-- Breadcrumbs-->
      
      <!-- Icon Cards-->
      
          <!-- Card Columns Example Social Feed-->
          
              <!-- Example Social Card-->
            
            <!-- Example Social Card-->
            
            <!-- Example Social Card-->
          
          <!-- /Card Columns-->
       
      <!-- Example DataTables Card-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url();?>Login/Home">Home</a>
        </li>
        <li class="breadcrumb-item active">Penjualan</li>
      </ol>
      <!-- Example DataTables Card-->

     <h1>Transaksi</h1>
     <div class="col-md-9">
    <div class="panel panel-default">
     <div class="panel-body">
      <form class="form-horizontal" id="form_transaksi" role="form">
          <div class="col-md-8">
    <div class="form-group">
            <label class="control-label col-md-3" 
              for="id_barang">Id Roti :</label>
            <div class="col-md-5">
              <input list="list_barang" class="form-control reset" 
                placeholder="Isi id..." name="id_roti" id="id_roti" 
                autocomplete="off" onchange="showBarang(this.value)">
                    <datalist id="list_roti">
                     <?php foreach ($roti as $row){ ?>
                  <option value="<?php echo $row->id_roti;?>"><?php echo $row->nama_roti;?></option>
                  <?php }?>
                    </datalist>
            </div>
            
          </div>
<<<<<<< HEAD
          <div id="tabel_roti">
=======
          <div id="barang">
>>>>>>> b19d4534efa8c33f92b0427abaecb562a39cf837
            <div class="form-group">
              <label class="control-label col-md-3" 
                for="nama_barang">Nama Roti :</label>
              <div class="col-md-8">
                <input type="text" class="form-control reset" 
                  name="nama_roti" id="nama_roti" 
                  readonly="readonly">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" 
                for="harga">Harga (Rp) :</label>
              <div class="col-md-8">
                <input type="text" class="form-control reset" 
                  name="harga" id="harga" 
                  readonly="readonly">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" 
                for="qty">Quantity :</label>
              <div class="col-md-4">
                <input type="number" class="form-control reset" 
                  autocomplete="off" onchange="subTotal(this.value)" 
                  onkeyup="subTotal(this.value)" id="qty" min="0" 
                  name="qty" placeholder="Isi qty...">
              </div>
            </div>
          </div>
<<<<<<< HEAD

           <div class="form-group">
            <label class="control-label col-md-3" 
              for="sub_total">Sub-Total (Rp):</label>
            <div class="col-md-8">
              <input type="text" class="form-control reset" 
                name="sub_total" id="sub_total" 
                readonly="readonly">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-3 col-md-3">
                <button type="button" class="btn btn-primary" 
                id="tambah" onclick="addroti()">
                  <i class="fa fa-cart-plus"></i> Tambah</button>
            </div>
          </div>
            <!-- </div>
          </div> --><!-- end panel-->
          </div><!-- end col-md-8 -->
          <!-- <div class="col-md-4 mb">         <div class="col-md-12">
            <div class="form-group">
              <label for="total" class="besar">Total (Rp) :</label>
                <input type="text" class="form-control input-lg" 
                name="total" id="total" placeholder="0"
                readonly="readonly"  value="<?= number_format( 
                      $this->cart->total(), 0 , '' , '.' ); ?>">
                    </div>
                    </div>
            </div>
            <div class="form-group">
              <label for="bayar" class="besar">Bayar (Rp) :</label>
                <input type="text" class="form-control input-lg uang" 
                  name="bayar" placeholder="0" autocomplete="off"
                  id="bayar" onkeyup="showKembali(this.value)">
            </div>
            <div class="form-group">
              <label for="kembali" class="besar">Kembali (Rp) :</label>
                <input type="text" class="form-control input-lg" 
                name="kembali" id="kembali" placeholder="0"
                readonly="readonly">
            </div>
        </div>
          </div>
        </form> -->


  <div class="col-md-4 mb">
        <div class="col-md-12">
            <div class="form-group">
              <label for="total" class="besar">Total (Rp) :</label>
                <input type="text" class="form-control input-lg" 
                name="total" id="total" placeholder="0"
                readonly="readonly"  value="<?= number_format( 
                      $this->cart->total(), 0 , '' , '.' ); ?>">
            </div>
            <div class="form-group">
              <label for="bayar" class="besar">Bayar (Rp) :</label>
                <input type="text" class="form-control input-lg uang" 
                  name="bayar" placeholder="0" autocomplete="off"
                  id="bayar" onkeyup="showKembali(this.value)">
            </div>
            <div class="form-group">
              <label for="kembali" class="besar">Kembali (Rp) :</label>
                <input type="text" class="form-control input-lg" 
                name="kembali" id="kembali" placeholder="0"
                readonly="readonly">
            </div>
        </div>
          </div><!-- end col-md-4 -->
          </form>

          <table id="table_transaksi" class="table table-striped 
            table-bordered">
        <thead>
          <tr>
              <th>No</th>
              <th>Id Roti</th>
              <th>Nama Roti</th>
              <th>Harga</th>
              <th>Quantity</th>
              <th>Sub-Total</th>
              <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
      <div class="col-md-offset-8" style="margin-top:20px">
        <button type="button" class="btn btn-primary btn-lg" 
        id="selesai" disabled="disabled" 
        onclick="alert('Belum ada action untuk save pejualan')">
        Selesai <i class="fa fa-angle-double-right"></i></button>
      </div>
        </div>
      </div>
  </div>

  <script type="text/javascript">

  function showRoti(str) 
  {

      if (str == "") {
          $('#nama_roti').val('');
          $('#harga').val('');
          $('#jumlah_roti').val('');
          $('#sub_total').val('');
          $('#reset').hide();
          return;
      } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
             xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("tabel_roti").innerHTML = 
                xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "<?= base_url(
          'Penjualan/getroti') ?>/"+str,true);
        xmlhttp.send();
      }
  }

  function subTotal(jumlah_roti)
  {

    var harga = $('#harga').val().replace(".", "").replace(".", "");

    $('#sub_total').val(convertToRupiah(harga*jumlah_roti));
  }

  function convertToRupiah(angka)
  {

      var rupiah = '';    
      var angkarev = angka.toString().split('').reverse().join('');
      
      for(var i = 0; i < angkarev.length; i++) 
        if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
      
      return rupiah.split('',rupiah.length-1).reverse().join('');
  
  }

  var table;
    $(document).ready(function() {

      showKembali($('#bayar').val());

      table = $('#table_transaksi').DataTable({ 
        paging: false,
        "info": false,
        "searching": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' 
        // server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?= site_url('Penjualan/ajax_list_transaksi')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ 0,1,2,3,4,5,6 ], //last column
          "orderable": false, //set not orderable
        },
        ],

      });
    });

    function reload_table()
    {

      table.ajax.reload(null,false); //reload datatable ajax 
    
    }

    function addroti()
    {
        var id_roti = $('#id_roti').val();
        var jumlah_roti = $('#jumlah_roti').val();
        if (id_roti == '') {
          $('#id_roti').focus();
        }else if(jumlah_roti == ''){
          $('#jumlah_roti').focus();
        }else{
       // ajax adding data to database
          $.ajax({
            url : "<?= site_url('Penjualan/addroti')?>",
            type: "POST",
            data: $('#form_transaksi').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //reload ajax table
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding data');
            }
        });

          showTotal();
          showKembali($('#bayar').val());
          //mereset semua value setelah btn tambah ditekan
          $('.reset').val('');
        };
    }

    function deletebarang(id,sub_total)
    {
        // ajax delete data to database
          $.ajax({
            url : "<?= site_url('Penjualan/deleteroti')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

          var ttl = $('#total').val().replace(".", "");

          $('#total').val(convertToRupiah(ttl-sub_total));

          showKembali($('#bayar').val());
    }

    function showTotal()
    {

      var total = $('#total').val().replace(".", "").replace(".", "");

      var sub_total = $('#sub_total').val().replace(".", "").replace(".", "");

      $('#total').val(convertToRupiah((Number(total)+Number(sub_total))));

    }

    //maskMoney
  $('.uang').maskMoney({
    thousands:'.', 
    decimal:',', 
    precision:0
  });

  function showKembali(str)
    {
      var total = $('#total').val().replace(".", "").replace(".", "");
      var bayar = str.replace(".", "").replace(".", "");
      var kembali = bayar-total;

      $('#kembali').val(convertToRupiah(kembali));

      if (kembali >= 0) {
        $('#selesai').removeAttr("disabled");
      }else{
        $('#selesai').attr("disabled","disabled");
      };

      if (total == '0') {
        $('#selesai').attr("disabled","disabled");
      };
    }

  </script>
    <input type='submit' name='btnSubmit' value="Tambah"><br>
  </form>
>>>>>>> b19d4534efa8c33f92b0427abaecb562a39cf837
  
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
