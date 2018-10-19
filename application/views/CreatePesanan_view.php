
      <div class="card mb-2">
        <div class="card-header">
          <i class="fa fa-table"></i>Data Pesanan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
          <div>
          <p>
            
            <div class="container">
              <th>
            <div class="container">
            <div class="form-group row">
            <div class="col-xs-4">
            <form method="post" action="input">   
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

