
<div class="card mb-2">
  <div class="card-header">
    <h3> Input Pesanan</h3></div>
    <div class="card-body">
      <div class="table-responsive">
            <div class="container">

            <form method="post" action="input">   

            <div class="form-group row">
              <div class="col-sm-4" >
                <label  for="nama">Nama Pemesan:</label>
                <input class="form-control" placeholder="Masukan Nama" type="text" name="nama_pemesan" value="<?php if(isset($data)) { echo $data[0]->nama_pemesan; } ?>">
              </div>
              
              <div class="col-sm-4">
              <label for="nomor">Nomer Telepon: </label>
                <input class="form-control" placeholder="Masukan Nomor" type="text" name="no_telp" value="<?php if(isset($data)) { echo $data[0]->no_telp; } ?>">
                </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-4">
                <label for="alamat">Alamat</label>
                <input class="form-control" type="textarea" name="alamat" value="<?php if(isset($data)) { echo $data[0]->alamat_antar; } ?>">
              </div>          
   
              <div class="col-sm-2">
                <label for="Pesan">Jam Ambil:</label>
                <input class="form-control" type="time" name="jam_ambil" value="<?php if(isset($data)) { echo $data[0]->jam_ambil; } ?>">
              </div>

              <div class="col-sm-3">
                <label for="Pesan">Tanggal Ambil:</label>
                <input class="form-control" type="date" name="tgl_ambil" value="<?php if(isset($data)) { echo $data[0]->tgl_ambil; } ?>">
              </div>
            </div>

            </div>
          </form>

      <div class="row">
        <div class="col-lg-12">
            <a href="#" data-toggle="modal" data-target="#largeModal" class="pull-right"><small>Cari Roti</small></a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
            <form action="<?php echo base_url().'Penjualan/add_to_cart'?>" method="post">
            <table>
                <tr>
                    <th>Cari Roti</th>
                </tr>
                <tr>
                    <th><input type="text" placeholder="nama roti" name="nama_roti" id="nama_roti" class="form-control input-sm"></th>                     
                </tr>
                    <div id="detail_roti" style="position:absolute;">
                    </div>
            </table>
             </form>

            <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                <thead>
                    <tr>
                        <th>ID Roti</th>
                        <th>Nama Roti</th>
                        <th style="text-align:center;">Harga(Rp)</th>
                        <th style="text-align:center;">Qty</th>
                        <th style="text-align:center;">Sub Total</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $items): ?>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                    <tr>
                         <td><?=$items['id'];?></td>
                         <td><?=$items['name'];?></td>
                         <td style="text-align:right;"><?php echo number_format($items['amount']);?></td>
                         <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>
                         <td style="text-align:center;"><a href="<?php echo base_url().'Penjualan/remove/'.$items['rowid'];?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                    </tr>
                    
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <form action="<?php echo base_url().'Penjualan/simpan_penjualan'?>" method="post">
            <table>
                <tr>
                    <td style="width:760px;" rowspan="2"><button type="submit" class="btn btn-info btn-lg"> Simpan</button></td>
                    <th style="width:140px;">Total(Rp)</th>
                    <th style="text-align:right;width:140px;"><input type="text" name="total2" value="<?php echo number_format($this->cart->total());?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                    <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                </tr>
                <tr>
                    <th>Bayar(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                    <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                </tr>
                <tr>
                    <td></td>
                    <th>Kembalian(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                </tr>
            </table>
            </form>
            <hr/>
        </div>
            
            <input type="submit" class="btn btn-success" name="btnTambah" value="Simpan"/>
              <a class="btn btn-warning" href="<?php echo base_url()?>Pesanan">Kembali</a>

</div>
</div></div></div>