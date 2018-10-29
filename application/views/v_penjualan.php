
    
 <!-- Navigation -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
            <center><?php echo $this->session->flashdata('msg');?></center>
                <h1 class="page-header">Transaksi
                    <small>Penjualan</small>
                    <a href="#" data-toggle="modal" data-target="#largeModal" class="pull-right"><small>Cari Roti</small></a>
                </h1> 
            </div>
        </div>

        <!-- coding untuk searching -->
        <div class="form-group row">
        <!-- <div class="row"> -->
            <div class="col-sm-3">
                <label>No Transaksi</label>
                <input type="text" class="form-control" id="transaksi" placeholder="transaksi" style="width:200px;" value="<?php echo $kode;?>" readonly>
            </div>

            
            <form id="form_search" action="<?php echo site_url('Penjualan/get_autocomplete');?>" method="GET">
                <div class="col-sm-6">
                <label>Cari Roti</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="nama_roti" style="width:200px;">
            </form>
            </div>
        </div>

        <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#title').autocomplete({
                source: "<?php echo site_url('Penjualan/get_autocomplete');?>",
      
                select: function (event, ui) {
                    $(this).val(ui.item.label);
                    $('[name="id_roti"]').val(ui.item.id_roti);
                    $('[name="nama_roti"]').val(ui.item.label);
                    $('[name="harga"]').val(ui.item.harga);
                

                }
            });
            });
        </script> 

        <form id="form_input_detail" action="<?php echo site_url('Penjualan/inputdetail');?>" method="POST">
            <div class="form-group row">
                
                    <input class="form-control" type="hidden" name="id_roti" readonly>
                 
                  <div class="col-sm-3" >
                    <label  for="nama">Nama Roti:</label>
                    <input class="form-control" type="text" name="nama_roti" readonly >
                    <input type="hidden" class="form-control" name="no_transaksi" id="no_transaksi" value="<?php echo $kode;?>" readonly>
                  </div>

                  <div class="col-sm-3" >
                    <label  for="nama">Harga:</label>
                    <input class="form-control" type="text" name="harga" readonly >
                  </div>
                  
                  <div class="col-lg-6">
                  <label for="nomor">Jumlah: </label>
                  <input class="form-control" placeholder="Masukan Jumlah Beli" type="text" name="jumlah" style="width: 50%"><button class="btn btn-info" type="submit">Submit</button>
                  </div>
                  
            </div>
        </form>

        <!-- tampilan tabel roti yang dibeli -->

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
                    <?php foreach ($tabel_detail_sip as $items){ ?>

                    <tr>
                         <td><?php echo $items->id_roti;?></td>
                         <td><?php  echo $items->nama_roti;?></td>
                         <td style="text-align:right;"><?php echo number_format($items->harga);?></td>
                         <td style="text-align:center;"><?php echo number_format($items->jumlah);?></td>
                         <td style="text-align:right;"><?php echo number_format($items->total);?></td>
                         <td style="text-align:center;"><a href="<?php echo base_url().'Penjualan/remove/'.$items->id_roti;?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                    </tr>
                    <?php $i++; ?>
                    <?php } ?>
                </tbody>
            </table>

            <form action="<?php echo base_url().'Penjualan/simpan_penjualan'?>" method="post">
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
                    <th></th>
                    <th><button type="submit" class="btn btn-info btn-lg"> Simpan</button></th>
                </tr>

            </table>
            </form>
            <hr/>
        </div>
        <!-- /.row -->
        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Data Roti</h3>
            </div>
                <div class="modal-body" style="overflow:scroll;height:500px;">

                  <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                    <thead>
                        <tr>
                            <th style="text-align:center;width:40px;">No</th>
                            <th style="width:120px;">ID Roti</th>
                            <th style="width:240px;">Nama Roti</th>
                            
                            <th style="width:100px;">Harga</th>
                            <th style="width:100px;text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                <?php
                    $no=0;
                  if( ! empty($list)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                    foreach($list as $data){ // Lakukan looping pada variabel siswa dari controller
                      echo "<tr>";
                      echo "<td>".$no."</td>";
                      echo "<td>".$data->id_roti."</td>";
                      echo "<td>".$data->nama_roti."</td>";
                      echo number_format("<td>".$data->harga."</td>");
                      // echo "<td>".$data->telp."</td>";
                      // echo "<td>".$data->alamat."</td>";
                      echo "</tr>";
                    }
                  }else{ // Jika data tidak ada
                    echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
                  }
                  ?>
                   <!--  <?php 
                        $no=0;
                        foreach ($data->result_array() as $a):
                            $no++;
                            $id=$a['id_roti'];
                            $nm=$a['nama_roti'];
                            $harga=$a['harga'];
                    ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $no;?></td>
                            <td><?php echo $id;?></td>
                            <td><?php echo $nm;?></td>
                            <td style="text-align:right;"><?php echo 'Rp '.number_format($harga);?></td>
                            <td style="text-align:center;">

                            <form action="<?php echo base_url().'Penjualan/add_to_cart'?>" method="post">

                            <input type="hidden" name="id_roti" value="<?php echo $id?>">
                            <input type="hidden" name="nama_roti" value="<?php echo $nm;?>">
                            <input type="hidden" name="harga" value="<?php echo number_format($harga);?>">
                            <input type="hidden" name="qty" value="1" required>
                                <button type="submit" class="btn btn-xs btn-info" title="Pilih"><span class="fa fa-edit"></span> Pilih</button>
                            </form>
                            </td>
                        </tr> -->
                    <?php endforeach;?>
                    </tbody>
                </table>          

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    
                </div>
            </div>
            </div>
        </div>

    </div>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>

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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(function(){
            $('.jml_uang').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('#jml_uang2').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ''
            });
            $('#kembalian').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('.harga').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            //Ajax kabupaten/kota insert
            $("#id_roti").focus();
            $("#id_roti").on("input",function(){
                var id_roti = {id_roti:$(this).val()};
                   $.ajax({
               type: "POST",
               url : "<?php echo base_url().'Penjualan/get_roti';?>",
               data: id_roti,
               success: function(msg){
               $('#detail_roti').html(msg);
               }
            });
            }); 

            $("#id_roti").keypress(function(e){
                if(e.which==13){
                    $("#jumlah").focus();
                }
            });
        });
    </script>