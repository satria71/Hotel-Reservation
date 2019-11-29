<!DOCTYPE html>
<html lang="en">
<head>
<title>Data Reservasi</title>
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
    <h3>Data Reservasi</h3>
<hr>

<div class="container">
<table class="table table-stripped table-hover datatab" align="center">
    <thead>
        <tr>
            <th>No</th>
            <th>Id Reservasi</th>
            <th>Nama Tamu</th>
            <th>Alamat</th>
            <th>Tipe Kamar</th>
            <th>Fasilitas</th>
            <th>Tanggal Check In</th>
            <th>Tanggal Check Out</th>
            <th>Lama Inap</th>
            <th>Total Biaya</th>
            <th>Action</th>                         
        </tr>
    </thead>  
<tbody>

<?php 
    $sql = "select id_reservasi, nama_tamu, nama_kamar, fasilitas, tanggal_check_in, tanggal_check_out, lama_inap, total_biaya, alamat
    from tb_kamar, tb_fasilitas, tb_reservasi
    where tb_kamar.kode_kamar = tb_reservasi.kode_kamar
    and tb_fasilitas.id_fasilitas = tb_reservasi.id_fasilitas and tb_reservasi.flag = 1";
    $query = mysqli_query($con, $sql);
    $no = 1;
    while ($data = mysqli_fetch_assoc($query)){
?>

<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $data['id_reservasi']; ?></td>
    <td><?php echo $data['nama_tamu']; ?></td>
    <td><?php echo $data['alamat']; ?></td>
    <td><?php echo $data['nama_kamar']; ?></td>
    <td><?php echo $data['fasilitas']; ?></td>
    <td><?php echo $data['tanggal_check_in']; ?></td>
    <td><?php echo $data['tanggal_check_out']; ?></td>
    <td><?php echo $data['lama_inap']; ?></td>
    <td><?php echo $data['total_biaya']; ?></td>
    <td>
    <!-- Button untuk modal -->
    <a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_reservasi']; ?>">Edit</a>
    <!-- </td>    
    <td> -->
    <?php
        $id_reservasi = $data["id_reservasi"];
        echo "<a href='proses/deleteReservasi.php?id=$id_reservasi' class='btn btn-danger'>Hapus</a>";
    ?>
    </td>
</tr>

<!-- Modal Edit Kamar-->
<div class="modal fade" id="myModal<?php echo $data['id_reservasi']; ?>" role="dialog">
    <div class="modal-dialog">

<!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Data Reservasi</h4>
            </div>
        <div class="modal-body">

        <form role="form" action="proses/prosesUpdateReservasi.php" method="post">

        <?php
        $id = $data['id_reservasi']; 
        $sql2 = "select id_reservasi, nama_tamu, nama_kamar, fasilitas, tanggal_check_in, tanggal_check_out, lama_inap, total_biaya
                from tb_kamar, tb_fasilitas, tb_reservasi
                where  tb_kamar.kode_kamar = tb_reservasi.kode_kamar
                and tb_fasilitas.id_fasilitas = tb_reservasi.id_fasilitas and id_reservasi='$id'";
        
        $query_edit = mysqli_query($con, $sql2);
        //$result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($query_edit)) {  
        ?>

            <div class="form-group">
                <label>Id Reservasi</label>
                <input type="text" name="id_reservasi" class="form-control" value="<?php echo $row['id_reservasi']; ?>" readonly="true">     
            </div>

            <div class="form-group">
                <label>Nama Pemesan</label>
                <input type="text" name="nama_tamu" class="form-control" value="<?php echo $row['nama_tamu']; ?>">     
            </div>

            <div class="form-group">
                <label>Nama Kamar</label>
                <select name="nama_kamar">
                <?php
                    include "helper/connection.php";
                    $sql="select*from tb_kamar";
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
            </div>

            <div class="form-group">
                <label>Fasilitas</label>
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
            </div>

            <div class="form-group">
                <label>Tanggal Check In</label>
                <input type="date" name="tgl_ci" class="form-control" value="<?php echo $row['tanggal_check_in']; ?>">      
            </div>

            <div class="form-group">
                <label>Tanggal Check Out</label>
                <input type="date" name="tgl_co" class="form-control" value="<?php echo $row['tanggal_check_out']; ?>">      
            </div>

            <div class="form-group">
                <label>Lama Inap</label>
                <input type="text" name="lama_inap" class="form-control" value="<?php echo $row['lama_inap']; ?>">      
            </div>

            <div class="form-group">
                <label>Total Biaya</label>
                <input type="text" name="total_biaya" class="form-control" value="<?php echo $row['total_biaya']; ?>">      
            </div>

            <div class="modal-footer">  
                <button type="submit" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        <?php 
        }
        //mysql_close($host);
        ?>        
        </form>
            </div>
        </div>

    </div>
</div>


<?php               
    } 
?>
</tbody>
</table>
</div>      
</div>

</body>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
$('.datatab').DataTable();
} );
</script>
</html>
