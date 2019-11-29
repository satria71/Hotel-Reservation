<?php
    session_start();
    $username = $_SESSION["nama"];
?>

<?php
    include 'helper/connection.php';

    $kode_kamar = $_GET["id"];

    $query = "SELECT * FROM tb_kamar WHERE kode_kamar = '$kode_kamar'";
    $result = mysqli_query($con, $query);

    $item = ''; 
    if(mysqli_num_rows($result) == 1) {
        $item = mysqli_fetch_assoc($result);
    } else {
        echo "Barang tidak ditemukan";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Hotelku</title>
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


        <form action="proses/prosesInsertReservasi.php" method="POST">
        <div class="container">
        <h3 style="margin-top:70px;">Form insert Reservasi</h3><br>
        <div class="form-group">
            <label>Nama Tamu :</label>
            <input type="text" name="nama_tamu" class="form-control">
        </div>
        <div class="form-group">
            <label>Alamat :</label>
            <input type="text" name="alamat" class="form-control">
        </div>

            Kamar : 
            <select name="nama_kamar" readonly="true">
                <option value="<?php echo $item['kode_kamar'] ?>"><?php echo $item['nama_kamar'] ?></option>;
            </select><br>
            <input type="hidden" name="tarif" value="<?=$item['tarif']?>">
            
            Fasilitas : 
            <select name="fasilitas">
			<?php
				include "helper/connection.php";
				$sql="select*from tb_fasilitas";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result)!=''){
                    while($tampil=mysqli_fetch_array($result, MYSQLI_NUM)){
            ?>
                        <option value="<?php echo $tampil[0] ?>"><?php echo $tampil[1] ?></option>;
                    <?php
                    }
                }else{
                    ?>
                    <option> Tidak ada data </option>
            <?php
                }
			?>
            </select><br/>
            <div class="form-group">
                <label>Tanggal Check In</label>
                <input type="date" name="tgl_ci" class="form-control" id="date1" placeholder="Tanggal Check In">
            </div>
            <div class="form-group">
                <label>Tanggal Check Out</label>
                <input type="date" name="tgl_co" class="form-control" id="date2" placeholder="Tanggal Check Out">
            </div>
            <script>
                let a = '';
                let b = '';
                $('#date1').focusout(function() {
                    a = $('#date1').val();
                        if (a !== '' && b !== '') {
                        const date1 = new Date(a);
                        const date2 = new Date(b);
                        const diffTime = Math.abs(date2.getTime() - date1.getTime());
                        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                        $('#lama_inap').html(diffDays);
                    }
                    console.log(a)
                });
                $('#date2').focusout(function() {
                    b = $('#date2').val();
                    console.log(b)
                        if (a !== '' && b !== '') {
                        const date1 = new Date(a);
                        const date2 = new Date(b);
                        const diffTime = Math.abs(date2.getTime() - date1.getTime());
                        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                        $('#lama_inap').val(diffDays);
                    }
                });
            </script>
            <div class="form-group">
                <label>Lama Inap</label>
                <input type="number" name="lama_inap" id="lama_inap" class="form-control" placeholder="Lama Inap" readonly="true">
            </div>
            <div>
                <input class="btn btn-success" type="submit" name="submit" value="Simpan">
            </div>
            <!-- Tanggal Check In : <input type="date" name="tgl_ci" ><br/>
            Tanggal Check Out : <input type="date" name="tgl_co" ><br/>
            Lama Inap : <input type="text" name="lama_inap" ><br/>
            <input type="submit" name="submit"> -->
        </div>
            
        </form>
        
    
      <!-- Footer -->
      <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>  
    <footer class="py-10 bg-dark fixed-bottom">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Hotelku 2018</p>
      </div>
      <!-- /.container -->
    </footer>
    </body>
</html>