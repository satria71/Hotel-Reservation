<?php
// Include DB connection file
include '../helper/connection.php';

// Get the form value


if(isset($_POST['submit'])){
    $kode_kamar = $_POST['kode_kamar'];
    $code = $_FILES["gambar"]["error"];  

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

        $query = "INSERT INTO tb_gallery (kode_kamar,gambar) VALUES ('$kode_kamar', '$nama_file')";

        if (mysqli_query($con, $query)) {
            header("location:../admin.php");
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
    
    // $query = "INSERT INTO employees(name) VALUES ('".$checkbox1[$i]."')";
    // mysqli_query($query) or die (mysqli_error());
    
}
    
mysqli_close($con); 

?>