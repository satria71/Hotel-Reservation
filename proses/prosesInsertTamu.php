<?php
// Include DB connection file
include '../helper/connection.php';

// Get the form value
$nama = $_POST["nama"];
$username = $_POST["username"];
$password = $_POST["password"];
$jk = $_POST["jk"];
$alamat = $_POST["alamat"];
$no_tlp = $_POST["no_tlp"];
$email = $_POST["email"];


// Insert query comman
$query = "INSERT INTO tb_tamu (nama_tamu,username,password,jk,alamat,no_tlp,email) VALUE ('$nama', '$username', '$password','$jk','$alamat','$no_tlp','$email');";
$query .= "INSERT INTO tb_login (nama,username, password) VALUE ('$nama','$username', '$password')";


// Do insert query
if (mysqli_multi_query($con, $query) == 1) {
    ?>
    <script language="javascript">
        alert("Data berhasil dimasukkan");
        document.location="../login.php";
    </script>
    <?php
} else {
    header("location:../login.php");
}

// close mysql connection
mysqli_close($con); 

?>