<?php
include 'koneksi.php';

if(mysqli_connect_errno()){
	die('Unable to connect to database'.mysqli_connect_error());
}

$stmt = $con->prepare("SELECT nama_roti, harga, gambar FROM tabel_roti;");
$stmt->execute();
$stmt->bind_result($nama, $harga, $gambar);

$menu = array();

while ($stmt->fetch()) {
	$temp = array();
	$temp['nama_roti']=$nama;
	$temp['harga']=$harga;
	$temp['gambar']=$gambar;

	array_push($menu,$temp);
}
echo json_encode($menu);

?>