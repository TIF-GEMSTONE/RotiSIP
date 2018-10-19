      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Laporan Roti SIP</div>
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tr>
                <th>No Transaksi</th>
                <th>Nama Pegawai</th>
                <th>Tgl Transaksi</th>
                <th>Total</th>
        <th colspan="1"></th>
              </tr>
            </thead>
              <?php
                foreach ($data as $row){ ?>
        <tr>
          <td><?= $row['no_transaksi'];?></td>
          <td><?= $row['nama_pegawai'];?></td>
          <td><?= $row['tgl_transaksi'];?></td>
          <td><?= $row['total_jual'];?></td>
      <td><a href="<?php echo base_url('LaporanSIP/detail/'.$row['no_transaksi']);?>">Detail</a></td>
        </tr>
                <?php 
        } ?>
            </table>
        </div>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    