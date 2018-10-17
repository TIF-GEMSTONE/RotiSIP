<?php  
	//Import File Koneksi Database
	include 'koneksi.php';
	
	$id_sales = $_POST['id_sales'];

	//Membuat SQL Query
	$query = "SELECT * FROM tabel_pesanan, tabel_sales, tabel_roti WHERE tabel_pesanan.id_sales=tabel_sales.id_sales AND tabel_pesanan.id_roti=tabel_roti.id_roti AND tabel_pesanan.id_sales = '$id_sales' AND selesai='0' ORDER BY id_pesan DESC ";

	$sql= mysqli_query($con,$query);
	
	//Membuat Array Kosong 
	$result = array();
	
	while($row = mysqli_fetch_array($sql)){ 
		array_push($result,array(
			"id"=>$row['id_pesan'],
			"id_roti"=>$row['id_roti'],
			"nama_roti"=>$row['nama_roti'],
			"nama_pemesan"=>$row['nama_pemesan'],
			"no_telp"=>$row['no_telp'],
			"alamat_antar"=>$row['alamat_antar'],
			"tanggal_ambil"=>$row['tgl_ambil'],
			"jumlah_roti"=>$row['jumlah_roti']
			));
	}
	
	//Menampilkan Array dalam Format JSON
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);