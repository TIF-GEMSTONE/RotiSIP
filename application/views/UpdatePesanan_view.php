
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Data Pesanan</div>
        <div class="card-body">
          <div class="table-responsive">
                <div>
                <p>
                  <form method="post" action="<?php echo base_url()?>Pesanan/update">
                    Nama Pemesan: <input type="text" name="nama_pemesan" value="<?php echo @$user[0]['nama_pemesan']; ?>"><br/><br/>
                
                    No. Telp: <input type="text" name="no_telp" value="<?php echo @$user[0]['no_telp']; ?>"><br/><br/>

                    Nama Roti:
                      <?php
                      echo '<select name="roti">';
                          foreach($roti as $rows)
                          {
                              if($rows->id_roti==@$user[0]['id_roti']){
                                  echo '<option value="'.$rows->id_roti.'" selected="selected">'.$rows->nama_roti.'</option>';
                              }else{
                                  echo '<option value="'.$rows->id_roti.'">'.$rows->nama_roti.'</option>';
                              }
                          }
                          echo '</select>';
                      ?>
                      <br/><br/>

                    Jumlah Roti: <input type="text" name="jumlah_roti" value="<?php echo @$user[0]['jumlah_roti']; ?>"><br/><br/>
                
                    Tanggal Pesan: <input type="date" name="tgl_pesan" value="<?php echo @$user[0]['tgl_pesan']; ?>"><br/><br/>

                    Tanggal Ambil: <input type="date" name="tgl_ambil" value="<?php echo @$user[0]['tgl_ambil']; ?>"><br/><br/>

                    Jam Ambil: <input type="time" name="jam_ambil" value="<?php echo @$user[0]['jam_ambil']; ?>"><br/><br/>

                    <input type="submit" class="btn btn-success" name="btnTambah" value="Simpan"/>
                    <a class="btn btn-warning" href="<?php echo base_url()?>Pesanan">Kembali</a>

                </form>
                </p>
                </div>
          </div>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
 
</html>
