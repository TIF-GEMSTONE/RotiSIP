<?php
include "koneksi.php";

 class usr{}
	
	 $id = $_POST["id_sales"];
	 
	 $query = mysqli_query($con, "SELECT * FROM tabel_sales WHERE id_sales = '$id'");
	
	 $row = mysqli_fetch_array($query);
	
	 if (!empty($row)){
	 	$response = new usr();
	 	$response->nama = $row['nama_sales'];
	 	die(json_encode($response));
		
	 } else { 
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "id salah";
	 	die(json_encode($response));
	 }
	
	 mysqli_close($con);

?>