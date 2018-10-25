<div class="card mb-2">
        <div class="card-header">
          <i class="fa fa-table"></i>Tambah Data Roti</div>
        <div class="card-body">
          <div class="table-responsive">
          <div>
      <!-- Example DataTables Card-->
      <div class="jumbotron col-md-4" >
       <?=form_open_multipart('Dashboard/proses_input')?>
        <div class="form-group">
          <label for="nama">Nama :</label>
          <input type="text" name="nama_roti" class="form-control" placeholder="Masukan Nama Roti" id="nama_roti" required>
        </div>
        <div class="form-group">
          <label for="harga">Harga :</label>
          <input type="number" name="harga" class="form-control" placeholder="Masukan Harga Roti" id="harga" required>
        </div>
        <div class="form-group">
          <label for="userfile">Gambar :</label>
          <input type="file" name="userfile" class="file">
          <div class="input-group col-xs-12">
            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
          </div><br>
        </div>
            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
     </div>
           
        