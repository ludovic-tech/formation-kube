<?php
// connect to database
include 'conn.php';

// capture data from form
$id = $_POST['id'];
$hostname = $_POST['hostname'];
$dc = $_POST['dc'];
$brand = $_POST['brand'];
$app = implode(", ", $_POST['app']);
$note = $_POST['note'];
$updated = $_POST['updated'];

// update data
mysqli_query($conn,"update server set hostname='$hostname', dc='$dc', brand='$brand', app='$app', note='$note', updated=current_timestamp() where id='$id'");

// redirect page to index.php
header("location:index.php");

?>
