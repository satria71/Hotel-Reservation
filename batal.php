<?php
// Include DB connection file
include 'helper/connection.php';



    // $id = $_GET['id_reservasi'];
    // Insert query comman
    $query = "INSERT INTO tb_batal (id_reservasi,nama_tamu,kode_kamar,id_fasilitas,tgl_check_in,tgl_check_out,
    lama_inap,total_biaya) SELECT id_reservasi,nama_tamu,kode_kamar,id_fasilitas,tanggal_check_in,tanggal_check_out,
    lama_inap,total_biaya FROM tb_reservasi WHERE id_reservasi='$_GET[id]'";

    // Do insert query
    if (mysqli_query($con, $query)) {
?>
    <script language="javascript">
	    alert("Request akan diproses");
	    document.location="profile.php";
    </script>
<?php
    } else {
?>
    <script language="javascript">
	    alert("Pembatalan gagal");
	    
    </script>
<?php
    }
?>

<?php
// close mysql connection
mysqli_close($con); 

?>

