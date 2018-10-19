
      <div class="col-md-20">
        <div class="panel panel-default">
          <div class="panel-body">
            <p><h3>Transaksi</h3></p>
    <p><a class="btn btn-primary" href="<?php echo base_url()?>Penjualan/input">Tambah</a></p>
      <p align="center">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
          <th>No Transaksi</th>
          <th>Tgl Transaksi</th>
          <th>Nama Pegawai</th>
          <th>Total</th>
        </tr>
        <?php
                $no = 1;
                foreach ($data as $row): ?>
        <tr>
          <td><?php echo $row->no_transaksi;?></td>
          <td><?php echo $row->tgl_transaksi;?></td>
          <td><?php echo $row->id_pegawai;?></td>
          <td><?php echo $row->total_jual;?></td>
        </tr>
        <?php $no++;
                endforeach;?>
      </table>
    </p>
          </div>
        </div>
      </div>
