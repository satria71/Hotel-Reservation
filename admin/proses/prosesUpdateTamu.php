<?php
//include('dbconnected.php');
include "../helper/connection.php";

$id = $_GET['id_tamu'];
$nama = $_GET['nama'];
$jk = $_GET['jk'];
$alamat = $_GET['alamat'];
$no_tlp = $_GET['no_tlp'];
$email = $_GET['email'];

//query update
$query = "UPDATE tb_tamu SET nama_tamu='$nama' , jk='$jk', alamat='$alamat', no_tlp='$no_tlp', email='$email' WHERE id_tamu='$id' ";

if (mysqli_query($con, $query)) {
 # credirect ke page index
 header("location:../showTamu.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysql_error();
}

mysqli_close($con); 

?>