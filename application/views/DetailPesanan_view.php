
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
          <th>Total</th>
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
          <td><?php echo $row->total;?></td>
        </tr>
        <?php $no++;?>
        <?php 
      }?>
      </table>
      <form action="<?php echo base_url().'Pesanan/selesai'?>" method="post">
            <table>
                <tr>
                    <td style="width:760px;" rowspan="2"></td>
                    <th style="width:140px;">Total(Rp)</th>
                    <th style="text-align:right;width:140px;">
                      <input class="form-control input-sm" type="text" name="total2" value="<?php echo($detail[0]->grand_total);?>" style="text-align:right;margin-bottom:5px;" ></th>
                    <input type="hidden" id="total" name="total" value="<?php echo($detail[0]->grand_total);?>"  class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                    <input type="hdden" id="id_pesan" name="id_pesan" value="<?php echo($detail[0]->id_pesan);?>"  class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                </tr>
                <tr>
                    <th>Dp (Rp)</th>
                    <th style="text-align:right;"><input type="text" id="dp" name="dp" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" value="<?php echo($detail[0]->dp);?>" required></th>
                    <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" value="<?php echo($detail[0]->dp);?>" style="text-align:right;margin-bottom:5px;" required>
                </tr>
                <tr>
                    <td></td>
                    <th>Pelunasan (Rp)</th>
                    <th style="text-align:right;"><input type="text" id="pelunasan" name="pelunasan" value="<?php echo abs($detail[0]->pelunasan);?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                </tr>
                <tr>
                    <td></td>
                    <th>Bayar (Rp)</th>
                    <th style="text-align:right;"><input type="text" id="bayar" name="bayar" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                </tr>
                <tr>
                    <td></td>
                    <th>Kembali (Rp)</th>
                    <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian"  class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                </tr>
                <tr>
                    <td></td>
                    <th></th>
                    <th><button type="submit" class="btn btn-info btn-lg"> Selesai</button></th>
                </tr>

            </table>
            </form>
      <a class="btn btn-warning" href="<?php echo base_url()?>Pesanan">Kembali</a>
    </p>
        </div>
          </div>
        </div>
        
      </div>
    </div>
    <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>
    <script type="text/javascript">
        $(function(){
            $('#bayar').on("input",function(){
                var total=$('#pelunasan').val();
                var jumuang=$('#bayar').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_uang2').val(hsl);
                $('#kembalian').val(total - hsl);
            });
            
        });
    </script>

