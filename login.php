<?php
    // include('proses/prosesLogin.php'); // Includes Login Script
    
    # If user still in session, redirect to profile.php instead of login again
    if(isset($_SESSION['user'])){
        header("location: profile.php");
    }
    
    if(isset($_GET['pesan'])) {
        $mess = "<p> {$_GET['pesan']}</p>";
    } else {
        $mess = "";
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Login</title>
    <link rel="shortcut icon" type="image/png" href="img/logo2.png" />

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="admin/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body id="LoginForm">
<!-- Navigation -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark content-center fixed-top" style="height : 100px">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="index.php"><img src="img/logo1.png" alt=""></a>
        <!-- Links -->
        <ul class="navbar-nav" style="font-size: 26px">
            <li class="nav-item">
            <a class="nav-link" href="index.php" style="padding-right: 35px">Home</a>
            </li>
            <?php if(isset($_SESSION["nama"])): ?>
            <li class="nav-item">
            <a class="nav-link" href="formRiwayatTamu.php">Riwayat</a>
            </li>
            <?php else: ?>
            <li class="nav-item">
            <a class="nav-link" href="login.php" style="padding-right: 25px">Login</a>
            </li>
            <?php endif ?>
        </ul>
        </div>  
        
    </nav> 
<div class="container">
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h3>Login</h3>
                <p>Masukkan Username dan Password</p>
            </div>
                <form action="proses/prosesLogin.php" method="POST">
                <?php echo $mess; ?>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control"  placeholder="Password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    <div class="reg">
                    <br>
                    <span style="font-size:15px">Belum Punya Akun?</span><a href="formInsertTamu.php" style="color:red; font-size: 15px"> Register</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


</body>
        <!-- <form action="proses/prosesLogin.php" method="POST">
            <?php echo $mess; ?>
            Username : <input type="text" name="username" placeholder="Username Anda"><br/>
            Password : <input type="password" name="password" placeholder="Password Anda"><br/>
            <input type="submit" name="submit">
            <a href="formInsertTamu.php">insert tamu</a>
        </form> -->
</html>