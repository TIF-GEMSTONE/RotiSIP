
          <!-- Card Columns Example Social Feed-->
          <div class="mb-0 mt-4">
            <i class="fa fa-newspaper-o"></i> Menu Roti</div>
          <hr class="mt-2">
          
          <div class="column">
              
              <p><a href="<?php echo base_url();?>Dashboard/input" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Tambah Data Roti</a></p>
          </div>
          <div class="card-columns">
            <div class="row" >
            <div class="container">
           <?php            
           foreach($produk as $p){            
            ?>
              
                <div class="container">
                <div class="column">
             <a href="#">
                <img width="150px" height="150px" src="<?php echo $p->gambar  ?> "  alt="">
                </a>
          </div>
              <div class="column">
                <h6><a href="#"><?php echo $p->nama_roti ?></a></h6>
                <h6>Rp. <?php echo number_format($p->harga,0,",","."); ?></h6>
                </p>
              </div>
            </div>
            
          <?php } ?>
   
          </div>
           </div>
           
            


