<?php
// Include DB connection file
include '../helper/connection.php';


// Get the form value
if(isset($_POST['submit'])){
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $jabatan = $_POST["jabatan"];
    $alamat = $_POST["alamat"];
    $no_tlp = $_POST["no_tlp"];
    $level = $_POST["level"];
    


    // Insert query comman
    $query = "INSERT INTO tb_karyawan (nip, nama_karyawan, username, password, jabatan, alamat, no_tlp, level) VALUE ('$nip', '$nama', '$username', '$password','$jabatan','$alamat','$no_tlp','$level');";
    $query .= "INSERT INTO tb_login (nama,username, password, level) VALUE ('$nama','$username', '$password', '$level' )";

    // $result = mysqli_multi_query($con, $query);

    // Do insert query
    if (mysqli_multi_query($con, $query) == 1) {
        ?>
        <script language="javascript">
            alert("Data berhasil dimasukkan");
            document.location="../formInsertKaryawan.php";
        </script>
        <?php
    } else {
        header("location:../login.php");
    }
}

// close mysql connection
mysqli_close($con); 

?>