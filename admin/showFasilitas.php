<!DOCTYPE html>
<html lang="en">
<head>
<title>Data Fasilitas</title>
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
    <h3>Data Fasilitas</h3>
<hr>

<table class="table table-stripped table-hover datatab" align="center">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Fasilitas</th>
            <th>Tipe Fasilitas</th>
            <th>Fasilitas</th>
            <th>Status</th>
            <th>Action</th>                         
        </tr>
    </thead>  
<tbody>

<?php 
    $sql = "select * from tb_fasilitas where flag = 1";
    $query = mysqli_query($con, $sql);
    $no = 1;
    while ($data = mysqli_fetch_assoc($query)){
?>

<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $data['id_fasilitas']; ?></td>
    <td><?php echo $data['tipe_fasilitas']; ?></td>
    <td><?php echo $data['fasilitas']; ?></td>
    <td><?php echo $data['status']; ?></td>
    <td>
    <!-- Button untuk modal -->
    <a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['id_fasilitas']; ?>">Edit</a>
    <?php
        $id_fasilitas = $data["id_fasilitas"];
        echo "<a href='proses/deleteFasilitas.php?id=$id_fasilitas' class='btn btn-danger'>Delete</a>";
    ?>
    </td>
</tr>

<!-- Modal Edit Kamar-->
<div class="modal fade" id="myModal<?php echo $data['id_fasilitas']; ?>" role="dialog">
    <div class="modal-dialog">

<!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Data Fasilitas</h4>
            </div>
        <div class="modal-body">

        <form role="form" action="proses/prosesUpdateFasilitas.php" method="post">

        <?php
        $id = $data['id_fasilitas']; 
        $sql2 = "SELECT * FROM tb_fasilitas WHERE id_fasilitas='$id'";
        $query_edit = mysqli_query($con, $sql2);
        //$result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($query_edit);
        $ex = explode(', ', $row['fasilitas']);
        ?>

            <div class="form-group">
                <label>Kode Fasilitas</label>
                <input type="text" name="kode" class="form-control" value="<?php echo $row['0']; ?>" readonly="true">     
            </div>

            <div class="form-group">
                <label>Tipe Fasilitas</label>
                <input type="text" name="tipe" class="form-control" value="<?php echo $row['1']; ?>">      
            </div>

            <div class="form-group">
                <label>Fasilitas</label><br>
                <input type="checkbox" name="fasilitas[]" value="Bantal" <?php
                in_array('Bantal', $ex) ? print 'checked' : ' ' ?>>Bantal<br>
                <input type="checkbox" name="fasilitas[]" value="Guling" <?php
                in_array('Guling', $ex) ? print 'checked' : ' ' ?>>Guling<br>      
            </div>

            <div class="form-group">
                <label>Status</label>
                <input type="text" name="status" class="form-control" value="<?php echo $row['3']; ?>">      
            </div>

            <div class="modal-footer">  
                <button type="submit" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

               
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
