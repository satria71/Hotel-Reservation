<?php

include '../helper/connection.php';

$id = $_GET["id"];

$query = "UPDATE tb_tamu SET flag = 0 WHERE id_tamu = $id";

if (mysqli_query($con, $query)) {
    header("Location:../showTamu.php");
} else {
    $error = urldecode("<div class='alert alert-danger' role='alert'>Data tidak berhasil di delete</div>");
    header("Location:../showTamu.php?error=$error");
}

mysqli_close($con); 

?>