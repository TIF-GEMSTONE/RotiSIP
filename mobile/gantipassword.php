<?php


	 include "koneksi.php";

	 class usr{}

	 $id = $_POST["id_sales"];
	 $passlama = $_POST["passLama"];
	 $passbaru = $_POST["passBaru"];
	 $passrebaru = $_POST["passRebaru"];

	 if ((empty($passlama))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom tidak boleh kosong";
	 	die(json_encode($response));
	 } 
	 else if ((empty($passbaru))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom tidak boleh kosong";
	 	die(json_encode($response));
	 } 
	 else if ((empty($passrebaru))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom tidak boleh kosong";
	 	die(json_encode($response));
	 }

	 else {
		 if (!empty($passlama) && $passbaru == $passrebaru){

		 		$query = mysqli_query($con, "UPDATE tabel_sales SET password = '".$passbaru."' WHERE id_sales='".$id."' ");

		 		if ($query) {
					$response = new usr();
					$response->success = 1;
					$response->message = "Ganti Password Berhasil";
					die(json_encode($response));
				} else{ 
					$response = new usr();
					$response->success = 0;
					$response->message = "Ganti Password Gagal";
					die(json_encode($response)); 
		
		 		
		 		}
		 	}
	 }

	 mysqli_close($con);

?>	