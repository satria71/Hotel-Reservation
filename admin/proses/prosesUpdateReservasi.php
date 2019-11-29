<?php
//include('dbconnected.php');
include "../helper/connection.php";

$id = $_POST['id_reservasi'];
$nama_tamu = $_POST['nama_tamu'];
$nama_kamar = $_POST['nama_kamar'];
$fasilitas = $_POST['fasilitas'];
$tgl_ci = $_POST['tgl_ci'];
$tgl_co = $_POST['tgl_co'];
$lama_inap = $_POST['lama_inap'];
$total_biaya = $_POST['total_biaya'];

//query update
$query = "UPDATE tb_reservasi SET nama_tamu='$nama_tamu' , kode_kamar='$nama_kamar', id_fasilitas='$fasilitas', tanggal_check_in='$tgl_ci', tanggal_check_out='$tgl_co', lama_inap='$lama_inap', total_biaya='$total_biaya' WHERE id_reservasi='$id' ";

if (mysqli_query($con, $query)) {
 # credirect ke page index
 header("location:../showReservasi.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysql_error();
}

mysqli_close($con); 

?>