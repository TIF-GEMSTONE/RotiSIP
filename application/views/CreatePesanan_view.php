<form action="<?php echo base_url().'Pesanan/input'?>" method="post">
<div class="card mb-2">
  <div class="card-header">
    <h3> Input Pesanan</h3></div>
    <div class="card-body">
      <div class="table-responsive">
            <div class="container">

              
            
            <div class="row">
              <div class="col-lg-9"> 
                <label>No Transaksi</label>
                <input type="text" class="form-control" id="transaksi" name="id_pesan" placeholder="transaksi" style="width:200px;" value="<?php echo $kode;?>" readonly>
              </div>
            </div>

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
          

      <div class="row">
            <div class="col-lg-9">
            
            <form id="form_search" action="<?php echo site_url('Pesanan/get_autocomplete');?>" method="GET">
                <label>Cari Roti</label>
                <div class="input-group">
                    <input type="text" name="title" class="form-control" id="title" placeholder="nama_roti" style="width:200px;">
                    
                 </div>
            </form>

        </div>
        <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#title').autocomplete({
                source: "<?php echo site_url('Pesanan/get_autocomplete');?>",
      
                select: function (event, ui) {
                    $(this).val(ui.item.label);
                    $('[name="id_roti"]').val(ui.item.id_roti);
                    $('[name="nama_roti"]').val(ui.item.label);
                    $('[name="harga"]').val(ui.item.harga);
                
                }
            });
            });
        </script> 
        </div>
         <form id="form_input_detail" action="<?php echo site_url('Pesanan/inputdetail');?>" method="POST">
        <div class="form-group row">
            <div class="col-sm-3" >
                <label  for="nama">Nama Roti:</label>
                <input class="form-control" type="text" name="nama_roti" readonly>
                <input class="form-control" type="hidden" name="id_roti" readonly>
                <input type="hidden" class="form-control" id="no_transaksi" name="no_transaksi" placeholder="transaksi" style="width:200px;" value="<?php echo $kode;?>" readonly>
              </div>

              <div class="col-sm-3" >
                <label  for="nama">Harga:</label>
                <input class="form-control" type="text" name="harga" readonly >
              </div>
              
              <div class="col-lg-3">
              <label for="nomor">Jumlah: </label>
                <input class="form-control" placeholder="Masukan Jumlah Beli" type="text" name="jumlah">
                <span class="input-group-btn">
                        <button class="btn btn-info" type="submit">Submit</button>
                    </span>
                </div>
            </div>
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
                    <?php foreach ($tabel_detail_pesan as $items): ?>
                    
                    <tr>
                         <td><?=$items->id_roti;?></td>
                         <td><?=$items->nama_roti;?></td>
                         <td style="text-align:right;"><?php echo number_format($items->harga);?></td>
                         <td style="text-align:center;"><?php echo number_format($items->jumlah);?></td>
                         <td style="text-align:right;"><?php echo number_format($items->total);?></td>
                         <td style="text-align:center;"><a href="<?php echo base_url().'Pesanan/remove/'.$items->id_roti;?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                    </tr>
                    
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

            
            <table>
                <tr>
                    <td style="width:760px;" rowspan="2"></td>
                    <th style="width:140px;">Total(Rp)</th>
                    <th style="text-align:right;width:140px;"><input type="text" name="total2" value="<?php echo number_format($total[0]->total);?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" ></th>
                    <input type="hidden" id="total" name="total" value="<?php echo $total[0]->total;?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
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
                <tr>
                    <td></td>
                    <th><input type="hidden" class="form-control" id="id_pesan" name="id_pesan" placeholder="transaksi" style="width:200px;" value="<?php echo $kode;?>" readonly></th>
                    <th><button  name="btnTambah" class="btn btn-info btn-lg"> Simpan</button></th>
                </tr>
            </table>
            </form>
            <hr/>
        </div>
            
            
              

</div>
</div></div></div>
<script type="text/javascript">
        $(function(){
            $('#jml_uang').on("input",function(){
                var total=$('#total').val();
                var jumuang=$('#jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_uang2').val(hsl);
                $('#kembalian').val(hsl-total);
            })
            
        });
    </script>