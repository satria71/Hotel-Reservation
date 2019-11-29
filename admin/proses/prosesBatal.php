<?php
//include('dbconnected.php');
include "../helper/connection.php";

//query update
$query = "UPDATE tb_batal SET status = 'Batal' WHERE id_reservasi='$_GET[id]' ";

if (mysqli_query($con, $query)) {
    $query = "UPDATE tb_reservasi SET flag = '0' WHERE id_reservasi='$_GET[id]' ";
    if (mysqli_query($con,$query)){
        header("location:../showPembatalan.php"); 
    }
}else{
echo "ERROR, data gagal diupdate". mysql_error();
}

mysqli_close($con); 

?>