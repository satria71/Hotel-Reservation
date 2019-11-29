<?php
if(isset($_POST["submit"])){
    print_r($_POST);
    print_r($_FILES);  
}
?>

<html>
    <head>
        <title>Simple Login 2 - Using MySQL Database</title>
    </head>
    <body>
        <form action="proses/prosesInsertGallery.php" method="POST" enctype="multipart/form-data">
            <h1>Form insert Gallery</h1>
            Kode Kamar : <input type="text" name="kode_kamar" ><br/>
            Nama Kamar : <input type="text" name="nama_kamar" ><br/>
            Kelas : <input type="text" name="kelas" ><br/>
            Gambar : <input type="file" name="gambar" ><br>
            Tarif : <input type="text" name="tarif" ><br/>
            Status : <input type="text" name="status" ><br/>
            <input type="submit" name="submit">
        </form>
    </body>
</html>