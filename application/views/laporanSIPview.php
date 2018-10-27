
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tr>
                <!-- <th>Tgl Transaksi</th> -->
                <th>No Transaksi</th>
                <th>Jumlah Roti</th>
                <th>Total</th>
                <th colspan="1">Aksi</th>
              </tr>
            </thead>
              <?php
                foreach ($data as $data){ ?>
        <tr>
          <!-- <td><?= $row['tgl_transaksi'];?></td> -->
          <td><?= $no_transaksi[] = $data->no_transaksi;?></td>
          <td><?= $jumlah[] = (float) $data->jumlah;?></td>
          <td><?= $total[] = (float) $data->total;?></td>
      <!-- <td><a href="<?php echo base_url('LaporanSIP/detail/'.$row['no_transaksi']);?>">Detail</a></td> -->
        </tr>
                <?php 
        } ?>
            </table>
        </div>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    
