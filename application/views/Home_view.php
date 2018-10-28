        <!-- Menambahkan Data Roti -->
          <div class="column">
              <p>
                <a href="javascripts:;">
                <button data-toggle="modal" data-target="#tambah-data" class="btn btn-primary">
                  <i class="glyphicon glyphicon-pencil"></i>
                  Tambah Data Roti
                </button></a>
              </p>
          </div>
         
        <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="70%" cellspacing="0">
              <tr>
                <th style="text-align:left;">Id Roti </th>
                <th style="text-align:left;">Nama Roti</th>
                <th style="text-align:left;">Harga</th>
                <th colspan="2" style="text-align:center;">Aksi</th>
              </tr>
              <tr>
              <?php foreach ($produk as $p){ ?>
                <td style="text-align:left;"><?php echo $p->id_roti ?></td>
                <td style="text-align:left;"><?php echo $p->nama_roti ?></td>
                <td style="text-align:left;"><?php echo number_format($p->harga,0,",","."); ?></td>
                <td style="text-align:center;">
                  <a href="javascript:;"
                            data-id_roti="<?php echo $p->id_roti ?>"
                            data-nama_roti="<?php echo $p->nama_roti ?>"
                            data-harga="<?php echo $p->harga ?>"
                            data-toggle="modal" data-target="#edit-data">
                            <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-info">Edit</button></a></td>
                <td style="text-align:center;"><a href="<?php echo base_url().'Dashboard/hapus/'.$p->id_roti;?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> hapus</a></td>
              </tr>
            <?php   } ?>
             </table>
           </div> 
         </div>
           
           <!-- Modal Tambah -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                          <h4 class="modal-title">Tambah Data</h4>
                      </div>
                      <form class="form-horizontal" action="<?php echo base_url('Dashboard/tambah')?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Id Roti</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="id_roti" value="<?php echo $kode;?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Nama Roti</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="nama_roti" placeholder="Tuliskan Nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 col-sm-2 control-label">Harga</label>
                                    <div class="col-lg-10">
                                      <input type="number" class="form-control" name="harga" placeholder="Tuliskan Harga"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                            </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Modal Edit -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                      <h4 class="modal-title">Ubah Data</h4>
                  </div>
                  <form class="form-horizontal" action="<?php echo base_url('Dashboard/ubah')?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="modal-body">
                            <div class="form-group">
                                <label class="col-lg-4 col-sm-2 control-label">Nama Roti</label>
                                <div class="col-lg-10">
                                  <input type="hidden" id="id_roti" name="id_roti">
                                  <input class="form-control" id="nama_roti" name="nama_roti" placeholder="Tuliskan Nama"></input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 col-sm-2 control-label">Harga</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Tuliskan harga">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                          </div></form></div></div></div>

    <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
    <script>
      $(document).ready(function() {
          // Untuk sunting
          $('#edit-data').on('show.bs.modal', function (event) {
              var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
              var modal          = $(this)
 
              // Isi nilai pada field
              modal.find('#id_roti').attr("value",div.data('id_roti'));
              modal.find('#nama_roti').attr("value",div.data('nama_roti'));
              modal.find('#harga').html(div.data('harga'));
          });
      });
      $(document).ready(function() {
          // Untuk sunting
          $('#tambah-data').on('show.bs.modal', function (event) {
              var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
              var modal          = $(this)
 
              // Isi nilai pada field
              modal.find('#id_roti').attr("value",div.data('id_roti'));
              modal.find('#nama_roti').attr("value",div.data('nama_roti'));
              modal.find('#harga').html(div.data('harga'));
          });
      });
  </script>
