<?php


	 include "koneksi.php";

	 class usr{}

	 $id= $_POST["id"];
	 $selesai = $_POST["selesai"];

	 if ((empty($id))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Id tidak dikenali";
	 	die(json_encode($response));
	 } 
	 else if ((empty($selesai))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom tidak boleh kosong";
	 	die(json_encode($response));
	 }

	 else {
		 if (!empty($id)){

		 		$query = mysqli_query($con, "UPDATE tabel_pesanan SET selesai = '$selesai' WHERE id_pesan='$id' ");

		 		if ($query) {
					$response = new usr();
					$response->success = 1;
					$response->message = "Pesanan selesai";
					die(json_encode($response));
					
				} else{ 
					$response = new usr();
					$response->success = 0;
					$response->message = "Proses Gagal";
					die(json_encode($response)); 
		
		 		}
		 		
		 	}
	 }

	 mysqli_close($con);

?>	