<?php  
	//Import File Koneksi Database
	include 'koneksi.php';
	
	$id_sales = $_POST['id_sales'];

	//Membuat SQL Query
	$query = "SELECT * FROM tabel_transaksi_sales
			JOIN tabel_sales on tabel_transaksi_sales.id_sales=tabel_sales.id_sales
			WHERE tabel_transaksi_sales.id_sales = '$id_sales' 
			ORDER BY no_transaksi DESC ";
	
	//Mendapatkan Hasil
	$sql= mysqli_query($con,$query);
	
	//Membuat Array Kosong 
	$result = array();
	
	while($row = mysqli_fetch_array($sql)){
		
		//Memasukkan Nama dan ID kedalam Array Kosong yang telah dibuat 
		array_push($result,array(
			"no_transaksi"=>$row['no_transaksi'],
			"tanggal"=>$row['tgl_transaksi'],
			"total_sales"=>$row['total_sales']));
	}
	
	//Menampilkan Array dalam Format JSON
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
?>

 