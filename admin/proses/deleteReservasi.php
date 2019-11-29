<?php

include '../helper/connection.php';

$id = $_GET["id"];

$query = "UPDATE tb_reservasi SET flag = 0 WHERE id_reservasi = $id";

if (mysqli_query($con, $query)) {
    header("Location:../showReservasi.php");
} else {
    $error = urldecode("<div class='alert alert-danger' role='alert'>Data tidak berhasil di delete</div>");
    header("Location:../showReservasi.php?error=$error");
}

mysqli_close($con); 

?>