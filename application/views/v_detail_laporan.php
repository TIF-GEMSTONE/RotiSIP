          <div class="table-responsive">
      <form action="Pesanan" method="post">
      </form>
      <p align="center">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
          <th>No</th>
          <th>No Transaksi</th>
          <th>Nama Roti</th>
          <th>Jumlah</th>
          <th>Harga</th>
          <th>Total</th>
        </tr>
        <?php 
        $no = 1;
        foreach ($detail as $row){ ?>
        <tr>
          <td><?php echo $no;?></td>
          <td><?php echo $row->no_transaksi;?></td>
          <td><?php echo $row->nama_roti;?></td>
          <td><?php echo $row->jumlah;?></td>
          <td><?php echo $row->harga;?></td>
          <td><?php echo $row->total;?></td>
        </tr>
        <?php $no++; 
      }?>
      </table>
      <a class="btn btn-warning" href="<?php echo base_url()?>LaporanSIP">Kembali</a>
    </p>
        </div>
          </div>
        </div>
        
      </div>
    </div>

