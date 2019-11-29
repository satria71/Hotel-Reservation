<?php
session_start();
include 'helper/connection.php';
$username = $_SESSION["nama"];
if(!isset($_SESSION["nama"]) OR empty($_SESSION["nama"])){
    echo "<script>alert('Silahkan Login Dahulu!')</script>";
    echo "<script>location='login.php';</script>";
    exit();
}
?>


<!DOCTYPE html>
<head>
    <title>Hotelku</title>
    <link rel="shortcut icon" type="image/png" href="img/logo2.png" />
    
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark content-center fixed-top" style="height : 100px">
        <div class="container">
            <!-- Brand -->
        <a class="navbar-brand" href="profile.php"><img src="img/logo1.png" alt=""></a>
        <!-- Links -->
        <ul class="navbar-nav" style="font-size: 25px">
            <li class="nav-item">
            <a class="nav-link" href="profile.php" style="padding-right: 35px">Home</a>
            </li>
            <?php if(isset($_SESSION["nama"])): ?>
            <li class="nav-item">
            <a class="nav-link" href="formRiwayatTamu.php"style="padding-right: 35px">Riwayat</a>
            </li>
            <?php else: ?>
            <?php endif ?>
            <li class="nav-item">
            <a class="nav-link" style="padding-right: 35px; color: yellow"><?php echo $username; ?></a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
        </div>  
        
    </nav> 
    
    <section class="riwayat">
        <div class="container">
            <h3 style="margin-top:130px;">Riwayat Pemesanan <?php echo $_SESSION["nama"] ?></h3><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Kamar</th>
                        <th>Fasilitas</th>
                        <th>Tanggal Check In</th>
                        <th>Tanggal Check Out</th>
                        <th>Lama inap</th>
                        <th>Total Bayar</th>
                        <th>Aksi</th>
            
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor=1;
                    $id_pelanggan = $_SESSION["nama"];

                    $sql = "select id_reservasi, nama_tamu, nama_kamar, fasilitas, tanggal_check_in, tanggal_check_out, lama_inap, total_biaya
                    from tb_kamar, tb_fasilitas, tb_reservasi
                    where tb_kamar.kode_kamar = tb_reservasi.kode_kamar
                    and tb_fasilitas.id_fasilitas = tb_reservasi.id_fasilitas and tb_reservasi.flag=1 and nama_tamu='$id_pelanggan'";
                    $query = mysqli_query($con, $sql);
                    while($data = mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $data['nama_tamu']; ?></td>
                        <td><?php echo $data['nama_kamar']; ?></td>
                        <td><?php echo $data['fasilitas']; ?></td>
                        <td><?php echo $data['tanggal_check_in']; ?></td>
                        <td><?php echo $data['tanggal_check_out']; ?></td>
                        <td><?php echo $data['lama_inap']; ?></td>
                        <td>Rp. <?php echo $data['total_biaya']; ?></td>
                        <td>
                            <a href="batal.php?id=<?php echo $data['id_reservasi'] ?>" class="btn btn-danger">Batal</a>
                        </td>
                        
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
