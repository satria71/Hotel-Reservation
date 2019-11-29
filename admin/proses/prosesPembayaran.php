<?php
//include('dbconnected.php');
include "../helper/connection.php";

//query update
$query = "UPDATE tb_pembayaran SET status = 'Terbayar' WHERE id_reservasi='$_GET[id]' ";

if (mysqli_query($con, $query)) {
header("location:../showPembayaran.php"); 
}else{
echo "ERROR, data gagal diupdate". mysql_error();
}

mysqli_close($con); 

?>