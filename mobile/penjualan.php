<?php
include "koneksi.php";

     class usr{}
     $id_sales = $_POST['id_sales'];
     $id_stok_sales = $_POST['id_stok_sales'];
	 $idroti = $_POST['id_roti'];
	 $jumlah_roti = $_POST['jumlah_roti'];
// 	 $total = $_POST['total_sales'];



if ((empty($jumlah_roti))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Jumlah roti tidak boleh kosong";
	 	die(json_encode($response));
	 } 
	 
	 else{
	     $query1 = mysqli_query($con, "INSERT INTO tabel_transaksi_sales (no_transaksi, id_sales) VALUES (NULL, '$id_sales' ) ");
	     
        $row = mysqli_fetch_array($query);
     		if ($query1){
     			$response = new usr();
     			$response->success = 1;
     			$response->message = "Beli 1 berhasil";
     			$response->no_transaksi = $row['no_transaksi'];
     			$response->id_sales = $row['id_sales'];
             	die(json_encode($response));
             	
     			$query2 = mysqli_query($con, "INSERT INTO tabel_detail_sales (no_transaksi, id_stok_sales, id_roti, jumlah_roti ) VALUES ('$no_transaksi', '$id_stok_sales', '$id_roti', '$jumlah_roti' )");
                $row = mysqli_fetch_array($query2);
                    if($query2){
                        $response = new usr();
             			$response->success = 1;
             			$response->message = "Beli 2 berhasil";
             			$response->no_transaksi = $row['no_transaksi'];
             			$response->id_stok_sales = $row['id_stok_sales'];
             			$response->id_roti = $row['id_roti'];
             			$response->jumlah_roti = $row['jumlah_roti'];
             			die(json_encode($response));
                    }else{
                        $response = new usr();
             			$response->success = 0;
             			$response->message = "Query 1 tidak masuk";
             			die(json_encode($response));
                    }
                    
     		} else {
     			$response = new usr();
     			$response->success = 0;
     			$response->message = "Query 1 tidak masuk";
     			die(json_encode($response));
     		}
		 	}
            
            $query = mysqli_query($con, "SELECT * FROM tabel_roti, tabel_sales, tabel_transaksi_sales, tabel_detail_sales, tabel_stok_sales WHERE tabel_sales.id_sales=tabel_transaksi_sales.id_sales AND tabel_roti.id_roti=tabel_detail_sales.id_roti AND tabel_transaksi_sales.no_transaksi=tabel_detail_sales.no_transaksi AND tabel_sales.id_sales=tabel_stok_sales.id_stok_sales AND tabel_transaksi_sales.id_sales='$id_sales' ");
            
	 mysqli_close($con);


?>