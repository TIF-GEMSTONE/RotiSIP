
    <div class="container">
        <div class="row">
            <h2>Search Result</h2>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data as $row):?>
                    <tr>
                        <td><?php echo $row->id_roti;?></td>
                        <td><?php echo $row->nama_roti;?></td>
                        <td><?php echo $row->harga;?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
 
    <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
