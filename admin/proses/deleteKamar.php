<?php

include '../helper/connection.php';

$id = $_GET["id"];

$query = "UPDATE tb_kamar SET flag = 0 WHERE kode_kamar = $id";

if (mysqli_query($con, $query)) {
    header("Location:../showKamar.php");
} else {
    $error = urldecode("<div class='alert alert-danger' role='alert'>Data tidak berhasil di delete</div>");
    header("Location:../showKamar.php?error=$error");
}

mysqli_close($con); 

?>