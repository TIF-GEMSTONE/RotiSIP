<?php


	 include "koneksi.php";

	 class usr{}
    //  $id = $_POST["id_pesan"];
	 $nama_pemesan = $_POST["nama_pemesan"];
	 $no_telp = $_POST["no_telp"];
	 $alamat_antar = $_POST["alamat_antar"];
	 $tanggal_ambil = $_POST["tanggal_ambil"];
	 $id_sales = $_POST["id_sales"];
	 $id_roti = $_POST["id_roti"];
	 $jumlah_roti = $_POST["jumlah_roti"];
    
    if ((empty($nama_pemesan))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom nama tidak boleh kosong";
	 	die(json_encode($response));
	 } 
	 else if ((empty($no_telp))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom no_telp tidak boleh kosong";
	 	die(json_encode($response));
	 } 
	 else if ((empty($alamat_antar))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom alamat tidak boleh kosong";
	 	die(json_encode($response));
	 }
	 else if ((empty($tanggal_ambil))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom tanggal tidak boleh kosong";
	 	die(json_encode($response));
	 }
	 else if ((empty($id_sales))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom id_sales tidak boleh kosong";
	 	die(json_encode($response));
	 }
	 else if ((empty($id_roti))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom id_roti tidak boleh kosong";
	 	die(json_encode($response));
	 }
	 else if ((empty($jumlah_roti))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom jumlah tidak boleh kosong";
	 	die(json_encode($response));
	 }

	 else {
		 		$query = mysqli_query($con, "INSERT INTO tabel_pesanan (id_pesan, nama_pemesan, no_telp, alamat_antar, tgl_ambil, id_sales, id_roti, jumlah_roti, selesai) VALUES (NULL, '$nama_pemesan','$no_telp','$alamat_antar', '$tanggal_ambil','$id_sales', '$id_roti', '$jumlah_roti', '0')");
                
                $query1 = mysqli_query($con, "SELECT * FROM tabel_pesanan, tabel_roti WHERE nama_pemesan = '$nama_pemesan' AND tabel_pesanan.id_roti=tabel_roti.id_roti AND tabel_pesanan.id_roti = '$id_roti' ");
	            
	            $row = mysqli_fetch_array($query1);
	            
		 		if ($query){
		 			$response = new usr();
		 			$response->success = 1;
		 			$response->message = "Pesanan berhasil";
		 			$response->id = $row['id_pesan'];
		 			$response->nama_pemesan = $row['nama_pemesan'];
	 	            $response->no_telp= $row['no_telp'];
	 	            $response->alamat_antar=$row['alamat_antar'];
	 	            $response->tanggal_ambil=$row['tgl_ambil'];
	 	            $response->id_sales=$row['id_sales'];
	 	            $response->nama_roti=$row['nama_roti'];
	 	            $response->id_roti=$row['id_roti'];
	 	            $response->jumlah_roti=$row['jumlah_roti'];
		 			die(json_encode($response));

		 		} else {
		 			$response = new usr();
		 			$response->success = 0;
		 			$response->message = "Tidak Masuk";
		 			die(json_encode($response));
		 		}
		 	}

	 

	 mysqli_close($con);

?>	