
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Data Pesanan</div>
        <div class="card-body">
          <div class="table-responsive">
      <form action="Pesanan" method="post">
      </form>
      <p align="center">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
          <th>No</th>
          <th>Id Pesan</th>
          <th>Nama Pemesan</th>
          <th>Nama Roti</th>
          <th>Jumlah</th>
        </tr>
        <?php 
        $no = 1;
        foreach ($detail as $row){ ?>
        <tr>
          <td><?php echo $no;?></td>
          <td><?php echo $row->id_pesan;?></td>
          <td><?php echo $row->nama_pemesan;?></td>
          <td><?php echo $row->nama_roti;?></td>
          <td><?php echo $row->jumlah;?></td>
        </tr>
        <?php 
      }?>
      </table>
      <a class="btn btn-warning" href="<?php echo base_url()?>Pesanan">Kembali</a>
    </p>
        </div>
          </div>
        </div>
        
      </div>
    </div>

