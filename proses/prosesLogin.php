<?php
    include('../helper/connection.php');
    session_start();
    $error = '';

    if(isset($_POST["submit"])){
        if(!empty($_POST["username"]) || !empty($_POST["password"])) {
            # Get username and password from user
            $username = $_POST["username"];
            $password = $_POST["password"];
            
            # Create a connection to mysql database
            # mysql_connect parameter
            # mysql_connect(db_url, db_username, db_password, db_name)
            $con = mysqli_connect("localhost", "root", "", "db_hotel");

            # Check connection to database
            if(!$con) {
                die("Connection failed : " .mysqli_connect_error());
            }

            $query = "SELECT * FROM tb_login WHERE username='$username' AND password='$password'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);

            if(mysqli_num_rows($result) == 1) {
                $row_akun = mysqli_fetch_array($result); 
                $_SESSION["akun_id"] = $row["id"];
                $_SESSION["nama"] = $row["nama"];
                $_SESSION["username"] = $row["username"]; 
                $_SESSION["level"] = $row["level"];
               
                if($_SESSION["level"] == "1") { 
                    header("location:../admin/admin.php"); 
                }else { 
                    header("location:../profile.php"); 
                }
 
                // if($username == 1){
                //     $_SESSION["user"] = $username;
                //     $_SESSION["level"] = $row["level"];
                //     header("Location: profile.php");
                // }else if(mysqli_num_rows($result2) == 1){
                //     if($username == 1){
                //         $_SESSION["user"] = $username;
                //         $_SESSION["level"] = $row["level"];
                //         header("Location: admin.php");
                //     }
                // }
                
            } else {
                $error = urlencode("Username atau password salah!");
                header("Location: ../login.php?pesan=$error");
            }

            # Close connection to database
            mysqli_close($con);

        } else {
            $error = urlencode("Username atau password kosong!");
            header("Location: ../login.php?pesan=$error");
        }
    }
?>