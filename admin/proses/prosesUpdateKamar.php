<?php
//include('dbconnected.php');
include "../helper/connection.php";

$kode = $_GET['kode_kamar'];
$nama = $_GET['nama_kamar'];
$kelas = $_GET['kelas'];
$tarif = $_GET['tarif'];
$status = $_GET['status'];

//query update
$query = "UPDATE tb_kamar SET nama_kamar='$nama' , kelas='$kelas', tarif='$tarif', status='$status' WHERE kode_kamar='$kode' ";

if (mysqli_query($con, $query)) {
 # credirect ke page index
 header("location:../showKamar.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysql_error();
}

//mysql_close($host);
?>