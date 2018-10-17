<?php
include 'koneksi.php';
	
 class usr{}
	
	 $id = $_POST["id_sales"];
	 
	 $query = mysqli_query($con, "SELECT SUM(total_sales) AS TOTAL, nama_sales FROM tabel_transaksi_sales, tabel_sales WHERE tabel_sales.id_sales=tabel_transaksi_sales.id_sales AND tabel_sales.id_sales= '$id'");
	
	 $row = mysqli_fetch_array($query);
	
	 if (!empty($row)){
	 	$response = new usr();
	 	$response->nama = $row['nama_sales'];
	 	$response->total = $row['TOTAL'];
	 	die(json_encode($response));
		
	 } else { 
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "id salah";
	 	die(json_encode($response));
	 }
	

	
	 mysqli_close($con);

?>