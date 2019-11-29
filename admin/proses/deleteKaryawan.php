<?php

include '../helper/connection.php';

$id = $_GET["id"];

$query = "UPDATE tb_karyawan SET flag = 0 WHERE nip = $id";

if (mysqli_query($con, $query)) {
    header("Location:../showKaryawan.php");
} else {
    $error = urldecode("<div class='alert alert-danger' role='alert'>Data tidak berhasil di delete</div>");
    header("Location:../showKaryawan.php?error=$error");
}

mysqli_close($con); 

?>