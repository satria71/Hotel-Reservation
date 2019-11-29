<?php
// Include DB connection file
include '../helper/connection.php';

// Get the form value


if(isset($_POST['submit'])){
    $kode = $_POST["kode_fasilitas"];
    $tipe = $_POST["tipe"];
    $fasilitas = implode(', ', $_POST['fasilitas']);
    $status = $_POST["status"];
    $flag = $_POST["flag"];
    
    $query = "INSERT INTO tb_fasilitas (id_fasilitas, tipe_fasilitas, fasilitas, status, flag) VALUES ('$kode', '$tipe', '$fasilitas','$status','$flag')";
    // $query = "INSERT INTO employees(name) VALUES ('".$checkbox1[$i]."')";
    // mysqli_query($query) or die (mysqli_error());
    if (mysqli_query($con, $query)) {
        ?>
        <script language="javascript">
            alert("Data berhasil dimasukkan");
            document.location="../formInsertFasilitas.php";
        </script>
        <?php
    } else {
        echo "gagal";
        // header("location:../login.php");
    }
}
    

// Insert query comman



// Do insert query


// close mysql connection
mysqli_close($con); 

?>