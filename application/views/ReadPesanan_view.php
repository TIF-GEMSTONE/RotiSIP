
          <div class="table-responsive">
              <p><a class="btn btn-primary" href="<?php echo base_url()?>Pesanan/input">Tambah Pesanan</a></p>
      <form action="Pesanan" method="post">
      </form>
      <p align="center">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
          <th>No.</th>
          <th>Id Pesan</th>
          <th>Nama Pemesan</th>
          <th>No. Telp</th>
          <th>Tgl Pesan</th>
          <th>Tgl Ambil</th>
          <th>Jam Ambil</th>
          <th colspan="2"> <center> Aksi </center></th>
        </tr>
        <?php 
        $no = 1;
        foreach ($data as $row){ ?>
        <tr>
          <td><?php echo $no;?></td>
          <td><?php echo $row->id_pesan;?></td>
          <td><?php echo $row->nama_pemesan;?></td>
          <td><?php echo $row->no_telp;?></td>
          <td><?php echo $row->tgl_pesan;?></td>
          <td><?php echo $row->tgl_ambil;?></td>
          <td><?php echo $row->jam_ambil;?></td>
        
          <td><a href="<?php echo base_url(); ?>Pesanan/detail/<?php echo $row->id_pesan;?>">Detail</a></td>
          <td><a href="<?php echo base_url(); ?>Pesanan/delete/<?php echo $row->id_pesan;?>">Selesai</a></td>
        </tr>
        <?php $no++;
      }?>
      </table>
    </p>
        </div>
          </div>
        </div>
        
      </div>
    </div>
    