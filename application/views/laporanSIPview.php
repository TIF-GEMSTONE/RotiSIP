

<form method="get" action="<?php echo base_url('LaporanSIP/cetak')?>">
        <label>Filter Berdasarkan</label><br>
        <select name="filter" id="filter">
            <option value="">Pilih</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
        </select>
        <br /><br />
        <div id="form-tanggal">
            <label>Tanggal</label><br>
            <input type="text" name="tanggal" class="input-tanggal" />
            <br /><br />
        </div>
        <div id="form-bulan">
            <label>Bulan</label><br>
            <select name="bulan">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>
        <div id="form-tahun">
            <label>Tahun</label><br>
            <select name="tahun">
                <option value="">Pilih</option>
                <?php
                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                }
                ?>
            </select>
            <br /><br />
        </div>
        <button type="submit" class="btn btn-info">Tampilkan</button>
        <a href="<?php echo base_url('LaporanSIP'); ?>">Reset Filter</a>
    </form>
    <hr />
    
    <b><?php echo $ket; ?></b><br /><br />
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <tr>
        <th>Tgl Transaksi</th>
        <th>No. Transaksi</th>
        <th>Jumlah Roti</th>
        <th>Total</th>
        <th style="text-align:center;">Detail</th>
    </tr>
    <tr>
        <?php
          if( ! empty($transaksi)){
          foreach($transaksi as $data){
          $tgl = date('d-m-Y', strtotime($data->tgl_transaksi)); 
        ?>
          <td style="text-align:left;"><?php echo $tgl ?></td>
          <td style="text-align:left;"><?php echo $data->no_transaksi ?></td>
          <td style="text-align:left;"><?php echo $data->jumlah ?></td>
          <td style="text-align:left;"><?php echo $data->total_jual ?></td>
          <td style="text-align:center;"> 
            <a class="btn btn-mini" href="<?php echo site_url('LaporanSIP/detail/'.$data->no_transaksi)?>">
                        <button class="btn btn-info">Detail</button></a>
                    </td>
        </tr>
        <?php   }} ?>
        
        <?php
          if( ! empty($transaksi)){
          foreach($pesanan as $data){
          $tgl = date('d-m-Y', strtotime($data->tgl_transaksi)); 
        ?>
          <td style="text-align:left;"><?php echo $tgl ?></td>
          <td style="text-align:left;"><?php echo $data->no_transaksi ?></td>
          <td style="text-align:left;"><?php echo $data->jumlah ?></td>
          <td style="text-align:left;"><?php echo $data->total_jual ?></td>
          <td style="text-align:center;"> 
            <a class="btn btn-mini" href="<?php echo site_url('LaporanSIP/detail/'.$data->no_transaksi)?>">
                        <button class="btn btn-info">Detail</button></a>
                    </td>
        </tr>
        <?php   }} ?>
      </table>
<!--       <a href="<?php echo base_url()?>LaporanSIP/cetak" target="_blank" ><button class="btn btn-info"> Cetak</button></a> -->

   
   <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
    <!-- <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script> -->
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>

    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });
        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }
            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })     
   </script>
    
</table>
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Roti SIP 2018</small>
        </div>
      </div>
    </footer>
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
    <script src="<?php echo base_url ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url ('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url ('assets/vendor/chart.js/Chart.min.js')?>"></script>
    <script src="<?php echo base_url ('assets/vendor/datatables/jquery.dataTables.js')?>"></script>
    <script src="<?php echo base_url ('assets/vendor/datatables/dataTables.bootstrap4.js')?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url ('assets/js/sb-admin.min.js')?>"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url ('assets/js/sb-admin-datatables.min.js')?>"></script>
    <script src="<?php echo base_url ('assets/vendor/chart.js/Chart.min.js')?>"></script>
  </div>
</body>

</html>