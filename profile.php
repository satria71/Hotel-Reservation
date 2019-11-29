<?php
    session_start();
    $username = $_SESSION["nama"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Profile - Hotelku</title>
<link rel="shortcut icon" type="image/png" href="img/logo2.png" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
      integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
      crossorigin="anonymous"
    />

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

    <!-- Header with Background Image -->
    <header class="business-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- <img src="img/1.jpg" alt="pemandangan"> -->
          </div>
        </div>
      </div>
    </header>
    <br>
    <!-- Page Content -->
    <div class="container">

    <p align="center"><a class="btn btn-success" href="showKamar.php" style="font-size: 26px">Show All Rooms</a></p>

    <div class="row">
        <div class="col-sm-8"style="margin-right: 50px">
          <h2 class="mt-4">About Us</h2>
          <p style="text-align: justify">The hotel offers 280 well-appointed guest rooms and suites, each room are remarkably spacious, complete with premium amenities that are essential to both business and leisure travelers. All the facilities and services at The Trans Luxury Hotel have been designed to set the property in a class of its own. The panoramic restaurant and lounge on level 18 with sweeping views of the city, the open-air sandy beach pool with sun lounges, the elegant day spa, the high tech fitness centre, the luxurious room amenities, all ensure the most memorable stay for an extraordinary escape or an impeccable run event at Bandung's most iconic luxury hotel.</p>
        </div>
        <div class="col-sm-3" style="text-align: justify">  
          <h2 class="mt-4">Contact Us</h2>
          <address>
            <strong>Sabana Hotel</strong>
            <br>Jl. Musfofa Pakiskembar
            <br>
            Pakis, Kode Pos 5456
            <br>
          </address>
          <address>
            <div class="hub">
            <h3 class="sosmed">Hubungi Kami</h3><br>
              <a class="sosmed" href="https://facebook.com/" target="_blank"><i class="fab fa-facebook fa-2x" style="color: grey"></i></a>
              <a class="sosmed" href="https://instagram.com/" target="_blank"><i class="fab fa-instagram fa-2x" style="margin-left: 7%; color: grey"></i></i></a>
              <a class="sosmed" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter-square fa-2x" style="margin-left: 7%; color: grey"></i></a>
              <a class="sosmed" href="https://web.whatsapp.com/" target="_blank"><i class="fab fa-whatsapp fa-2x" style="margin-left: 7%; color: grey"></i></a>
            </div>
            <!-- <abbr title="Email">Inbox :</abbr>
            <a href="mailto:#">sabanahotel.htl.com</a> -->
          </address>
        </div>
      </div>
      <br><br><br>
      <!-- /.row -->

<?php
  include 'helper/connection.php';

    $sql = "select nama_kamar, gambar from tb_kamar where flag = 1 and kode_kamar = 'K001'";
    $query = mysqli_query($con, $sql);
    if($row = mysqli_fetch_assoc($query)){
      $image = $row["gambar"];
      $kamar = $row["nama_kamar"];  
?>
      <div style="text-align: center"><h3>Explore Our Rooms And Suites</h3></div>
      <div class="row">
        <div class="col-sm-4 my-4 float-right">
          <div class="card">
          <?php
            echo "
            <img class='card-img-top float-right' src='admin/tempat_upload/".$image."' alt='gambar'>
            "
          ?>
            <div class="card-body">
              <h4 class="card-title"><?php echo $kamar ?></h4>
              <p class="card-text" style="text-align: justify">A 40sqm modern room with luxury touch in every corner. Our Premier Room offers the most exclusive room and bathroom design with separated standing high pressure rain shower cabin and bath tub. This room also equipped with a 46’ LED interactive high definition television with more than 60 channels, I-Home docking station, electric power curtain, and to ensure your comfort, we also provide exclusively customized luxury linen with Egyptian cotton bed sheet, duvet, pillows, all stuffed with down feathers which were selected only from the gooses’ neck to get you through the night.</p>
            </div>
            <div class="card-footer text-center">
              <a href="showKamar.php" class="btn btn-primary">Book Now</a>
            </div>
          </div>
        </div>
<?php
    }
?>
<?php

    $sql = "select nama_kamar, gambar from tb_kamar where flag = 1 and kode_kamar = 'K002'";
    $query = mysqli_query($con, $sql);
    if($row = mysqli_fetch_assoc($query)){
      $image = $row["gambar"];
      $kamar = $row["nama_kamar"];  
?>
        <div class="col-sm-4 my-4 float-right">
          <div class="card">
          <?php
            echo "
            <img class='card-img-top float-right' src='admin/tempat_upload/".$image."' alt='gambar'>
            "
          ?>
            <div class="card-body">
              <h4 class="card-title"><?php echo $kamar ?></h4>
              <p class="card-text" style="text-align: justify">An elegant and luxurious suite with separate bedroom, spacious living room and dining area, Celebrity Suite is ideal for you who desire extra space. Not only you will have the access to experience our Private Reception services and access to The Club Lounge, this 95sqm room will surely escalate your stay with all the luxury things that you need including a 24 hours personal butler service.</p>
            </div>
            <div class="card-footer text-center">
              <a href="showKamar.php" class="btn btn-primary">Book Now</a>
            </div>
          </div>
        </div>
<?php
    }
?>
<?php

$sql = "select nama_kamar, gambar from tb_kamar where flag = 1 and kode_kamar = 'K003'";
$query = mysqli_query($con, $sql);
if($row = mysqli_fetch_assoc($query)){
  $image = $row["gambar"];
  $kamar = $row["nama_kamar"];  
?>
    <div class="col-sm-4 my-4 float-right">
      <div class="card">
      <?php
        echo "
        <img class='card-img-top float-right' src='admin/tempat_upload/".$image."' alt='gambar'>
        "
      ?>
        <div class="card-body">
          <h4 class="card-title"><?php echo $kamar ?></h4>
          <p class="card-text" style="text-align: justify">Inspired by the perfection of the real luxury experience, the Presidential Suite is a perfect choice for you who always have the winner of its class. This 200sqm room will certainly complete your definition of luxury. Completed with a separate bedroom and expansive working area, luxurious marble bathroom with private Jacuzzi and shower, spacious living room and dining room with well-equipped pantry, yes, a truly unparalleled luxury!</p>
        </div>
        <div class="card-footer text-center">
          <a href="showKamar.php" class="btn btn-primary">Book Now</a>
        </div>
      </div>
    </div>
<?php
}
?>

      </div>
      <!-- /.row -->



    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-10 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Hotelku 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
