					<?php 
						error_reporting(0);
						$b=$roti->row_array();
					?>
					<table>
						<tr>
		                    <th style="width:200px;"></th>
		                    <th>Nama Barang</th>
		                    <th>Harga(Rp)</th>
		                    <th>Stok</th>
		                    <th>Jumlah</th>
		                </tr>
						<tr>
							<td style="width:200px;"></th>
							<td><input type="text" name="nama_roti" value="<?php echo $b['nama_roti'];?>" style="width:380px;margin-right:5px;" class="form-control input-sm" readonly></td>
		                    <td><input type="text" name="harga" value="<?php echo number_format($b['harga']);?>" style="width:120px;margin-right:5px;text-align:right;" class="form-control input-sm" readonly></td>
		                    <td><input type="text" name="stok" value="<?php echo $b['stok'];?>" style="width:40px;margin-right:5px;" class="form-control input-sm" readonly></td>
		                    <td><input type="number" name="qty" id="qty" value="1" min="1" max="<?php echo $b['stok'];?>" class="form-control input-sm" style="width:90px;margin-right:5px;" required></td>
		                    <td><button type="submit" class="btn btn-sm btn-primary">Ok</button></td>
						</tr>
					</table>
					