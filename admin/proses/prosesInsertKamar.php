<?php
// Include DB connection file
include '../helper/connection.php';

if(isset($_POST['submit'])){
// Get the form value
    $kode = $_POST["kode_kamar"];
    $nama = $_POST["nama_kamar"];
    $kelas = $_POST["kelas"];
    $code = $_FILES["gambar"]["error"];  
    $tarif = $_POST["tarif"];
    $status = $_POST["status"];
    

    if($code == 0){
        $pesan = "";
        $nama_folder = "../tempat_upload";
        $tmp = $_FILES["gambar"]["tmp_name"];
        $nama_file = $_FILES["gambar"]["name"];
        $path = "$nama_folder/$nama_file";

        $tipe_file = array("image/jpeg", "image/gif","image/png");
        if(!in_array($_FILES["gambar"]["type"],$tipe_file)){
            $pesan = urldecode("File dengan nama tersebut sudah tersimpan");
            header("Location: ../admin.php?pesan=$pesan");
            die();
        }

        if(file_exists($path)){
            $pesan = ("File dengan nama tersebut sudah tersimpan, cobalagi");
            header("Location: index.php?pesan=$pesan");
            die();
        }

        // Insert query comman
        $query = "INSERT INTO tb_kamar (kode_kamar, nama_kamar, kelas, gambar, tarif, status) VALUES ('$kode', '$nama', '$kelas', '$nama_file','$tarif','$status')";
        // move_uploaded_file($_FILES["gambar"]["tmp_name"],"tempat_upload/" . $newFilename);

        if (mysqli_query($con, $query)) {
            ?>
            <script language="javascript">
                alert("Data berhasil dimasukkan");
                document.location="../formInsertKamar.php";
            </script>
            <?php
        } else {
            echo "gagal";
            // header("location:../login.php");
        }

        
        // move_uploaded_file($_FILES["gambar"]["tmp_name"],"tempat_upload/" . $newFilename);
        if(move_uploaded_file($tmp,$path)){
            $pesan = "Upload Sukses";
        }
    }else if($code === 4){
        $pesan = urldecode("Upload gagal, tidak terupload");
        headaer("Location: index.php?pesan=$pesan");
    }else{
        $pesan = "Upload gagal";
        header("Location: index.php?pesan=$pesan");
    }
}

// close mysql connection
mysqli_close($con); 

?>