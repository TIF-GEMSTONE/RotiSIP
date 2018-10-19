
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Laporan</div>
        <div class="card-body">
          <div class="table-responsive">
      <form action="LaporanSIP" method="post">
      </form>
      <p align="center">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
          <th>No Transaksi</th>
          <th>Nama Roti</th>
          <th>Jumlah Roti</th>
          <th>Harga Roti</th>
      <th>Total Transaksi</th>
        </tr>
        <?php 
        $no = 1;
        foreach ($detail as $row){ ?>
        <tr>
          <td><?= $row['no_transaksi'];?></td>
          <td><?= $row['nama_roti'];?></td>
          <td><?= $row['jumlah_roti'];?></td>
          <td><?= $row['harga'];?></td>
      <td><?= $row['total'];?></td>

        </tr>
        <?php 
      }?>
      </table>
      <a class="btn btn-warning" href="<?php echo base_url()?>LaporanSIP">Kembali</a>
    </p>
        </div>
          </div>
        </div>