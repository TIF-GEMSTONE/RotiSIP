
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tr>
                <th>No.</th>
                <th>Tgl Transaksi</th>
                <th>No Transaksi</th>
                <th>Jumlah Roti</th>
                <th>Total</th>
                <th colspan="1">Aksi</th>
              </tr>
            </thead>
              <?php
              $no = 1;
                foreach ($data as $data){ ?>
        <tr>
          <td><?php echo $no;?></td>
          <td><?= $tgl_transaksi[] = $data->tgl_transaksi;?></td>
          <td><?= $no_transaksi[] = $data->no_transaksi;?></td>
          <td><?= $jumlah[] = (float) $data->jumlah;?></td>
          <td><?= $total_jual[] = $data->total_jual;?></td>
          <td><a href="<?php echo base_url('LaporanSIP/detail/'.$data->no_transaksi);?>">Detail</a></td>
        </tr>
          <?php $no++; 
        } ?>
            </table>
        </div>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    
