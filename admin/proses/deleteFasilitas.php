<?php

include '../helper/connection.php';

$id = $_GET["id"];

$query = "UPDATE tb_fasilitas SET flag = 0 WHERE id_fasilitas = $id";

if (mysqli_query($con, $query)) {
    header("Location:../showFasilitas.php");
} else {
    $error = urldecode("<div class='alert alert-danger' role='alert'>Data tidak berhasil di delete</div>");
    header("Location:../showFasilitas.php?error=$error");
}

mysqli_close($con); 

?>