<!DOCTYPE html>
<html lang="en">
<head>
<title>Data Tamu</title>
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
    <h3>Data Tamu</h3>
<hr>

<table class="table table-stripped table-hover datatab" align="center">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Tamu</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Email</th>
            <th>Action</th>                         
        </tr>
    </thead>  
<tbody>
<?php 
    $sql = "select * from tb_tamu where flag = 1";
    $query = mysqli_query($con, $sql);
    $no = 1;
    while ($data = mysqli_fetch_assoc($query)){
?>

<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $data['nama_tamu']; ?></td>
    <td><?php echo $data['jk']; ?></td>
    <td><?php echo $data['alamat']; ?></td>
    <td><?php echo $data['no_tlp']; ?></td>
    <td><?php echo $data['email']; ?></td>
    <td>
    <!-- Button untuk modal -->
    <a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_tamu']; ?>">Edit</a>
    <?php
        $id_tamu = $data["id_tamu"];
        echo "<a href='proses/deleteTamu.php?id=$id_tamu' class='btn btn-danger'>Delete</a>";
    ?>
    </td>
</tr>

<!-- Modal Edit Kamar-->
<div class="modal fade" id="myModal<?php echo $data['id_tamu']; ?>" role="dialog">
    <div class="modal-dialog">

<!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Data Tamu</h4>
            </div>
        <div class="modal-body">

        <form role="form" action="proses/prosesUpdateTamu.php" method="get">

        <?php
        $id = $data['id_tamu']; 
        $sql2 = "SELECT * FROM tb_tamu WHERE id_tamu='$id'";
        $query_edit = mysqli_query($con, $sql2);
        //$result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($query_edit)) {  
        ?>

            <div class="form-group">
                <input type="hidden" name="id_tamu" class="form-control" value="<?php echo $row['0']; ?>" readonly="true">     
            </div>

            <div class="form-group">
                <label>Nama Tamu</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $row['2']; ?>">      
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <input type="text" name="jk" class="form-control" value="<?php echo $row['5']; ?>">      
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $row['6']; ?>">      
            </div>

            <div class="form-group">
                <label>No Telepon</label>
                <input type="text" name="no_tlp" class="form-control" value="<?php echo $row['7']; ?>">      
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $row['8']; ?>">      
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

</body>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
$('.datatab').DataTable();
} );
</script>

</html>
