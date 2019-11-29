<?php
    session_start();
    $username = $_SESSION["nama"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Daftar Kamar - Hotelku</title>
<link rel="shortcut icon" type="image/png" href="img/logo2.png" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Custom styles for this template -->
<link href="admin/css/business-frontpage.css" rel="stylesheet">
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
    
<?php
    include 'helper/connection.php';
?>

<div class="container" style="padding-top: 60px; padding-bottom: 20px">
    <h3>Data Kamar</h3>
<hr>

<table class="table table-stripped table-hover datatab">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Kamar</th>
            <th>Tipe Kamar</th>
            <th>Kelas</th>
            <th>Gambar</th>
            <th>Tarif</th>
            <th>Status</th>
            <th>Booking</th>                         
        </tr>
    </thead>  
<tbody>

<?php 
    $sql = "select * from tb_kamar where flag = 1";
    $query = mysqli_query($con, $sql);
    $no = 1;
    while ($data = mysqli_fetch_assoc($query)){
    $image = $data["gambar"];
?>

<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $data['kode_kamar']; ?></td>
    <td><?php echo $data['nama_kamar']; ?></td>
    <td><?php echo $data['kelas']; ?></td>
    <?php
    echo "<td>" ."<img src='admin/tempat_upload/".$image."' width='150'  height='auto' alt='gambar'>"."</td>";
    ?>
    <td><?php echo $data['tarif']; ?></td>
    <td><?php echo $data['status']; ?></td>
    <?php
    $kode_kamar = $data["kode_kamar"];
    echo "
    <td>
       <a href='formInsertReservasi.php?id=$kode_kamar' class='btn btn-warning'>Booking</a>
    </td>";
    ?>
</tr>
<?php               
    } 
?>
</tbody>
</table>          
</div>

  <!-- Footer -->
  <footer class="py-10 bg-dark fixed-bottom">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Hotelku 2018</p>
      </div>
      <!-- /.container -->
    </footer>

</body>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
$('.datatab').DataTable();
} );
</script>
</html>
