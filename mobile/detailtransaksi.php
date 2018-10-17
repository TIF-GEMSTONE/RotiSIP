<?php 	
	include 'koneksi.php';
	if(mysqli_connect_errno()){
	die('Unable to connect to database'.mysqli_connect_error());
}
	//Mendapatkan Nilai Dari Variable nis yang ingin ditampilkan
	$no = $_POST['no_transaksi'];

	$stmt = $con->prepare("SELECT nama_roti, harga, jumlah_roti, sub_total_sales FROM tabel_transaksi_sales , tabel_detail_sales , tabel_roti , tabel_sales WHERE tabel_transaksi_sales.no_transaksi=tabel_detail_sales.no_transaksi AND tabel_detail_sales.id_roti=tabel_roti.id_roti AND tabel_transaksi_sales.id_sales=tabel_sales.id_sales AND tabel_detail_sales.no_transaksi='$no';");
	$stmt->execute();
	$stmt->bind_result($nama, $harga, $jumlah, $subtotal);
	$detail = array();

	while ($stmt->fetch()) {
		$temp = array();
		$temp['nama_roti']=$nama;
		$temp['harga']=$harga;
		$temp['jumlah_roti']=$jumlah;
		$temp['sub_total_sales']=$subtotal;

		array_push($detail,$temp);
	}
	echo json_encode(array('result'=>$detail));
	
	
?>

	