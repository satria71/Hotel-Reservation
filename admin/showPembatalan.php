<!DOCTYPE html>
<html lang="en">
<head>
<title>Data Pembatalan</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<?php
    include 'helper/connection.php';
?>

<div class="container" style="padding-top: 20px; padding-bottom: 20px;">
    <h3>Data Pembatalan</h3>
<hr>

<table class="table table-stripped table-hover datatab" align="center">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pemesan</th>
            <th>Kamar</th>
            <th>Fasilitas</th>
            <th>Tanggal Check In</th>
            <th>Tanggal Check Out</th>
            <th>Lama inap</th>
            <th>Total Bayar</th>
            <th> Status</th>
            <th>Aksi</th>                  
        </tr>
    </thead>  
    <tbody>
    <?php
        $nomor=1;

        $sql = "SELECT * FROM tb_batal";
        $query = mysqli_query($con, $sql);
        while($data = mysqli_fetch_assoc($query)){
        ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $data['nama_tamu']; ?></td>
            <td><?php echo $data['kode_kamar']; ?></td>
            <td><?php echo $data['id_fasilitas']; ?></td>
            <td><?php echo $data['tgl_check_in']; ?></td>
            <td><?php echo $data['tgl_check_out']; ?></td>
            <td><?php echo $data['lama_inap']; ?></td>
            <td>Rp. <?php echo $data['total_biaya']; ?></td>
            <td><?php echo $data['status']; ?></td>
            <td>
                <a href="proses/prosesBatal.php?id=<?php echo $data['id_reservasi'] ?>" class="btn btn-success">Konfirm</a>
            </td>
            
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>