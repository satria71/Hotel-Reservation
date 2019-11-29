<?php
//include('dbconnected.php');
include "../helper/connection.php";

$kode = $_POST['kode'];
$tipe = $_POST['tipe'];

$status = $_POST['status'];

if(!empty($_POST['fasilitas'])){
    $fasilitas = implode(', ', $_POST['fasilitas']);    
}else{
    $fasilitas = "Data kosong";
}

//query update
$query = "UPDATE tb_fasilitas SET tipe_fasilitas='$tipe' , fasilitas='$fasilitas', status='$status' WHERE id_fasilitas='$kode' ";

if (mysqli_query($con, $query)) {
# credirect ke page index
header("location:../showFasilitas.php"); 
}else{
echo "ERROR, data gagal diupdate". mysql_error();
}

mysqli_close($con); 

?>