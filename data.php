<?php
    session_start();
    $username = $_SESSION["nama"];
?>
<html>
<head> 
    <title>User</title>
</head>

<body>
    <h1>Selamat Datang <?php echo $username; ?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>