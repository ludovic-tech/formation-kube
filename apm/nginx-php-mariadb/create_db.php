<?php

if(isset($_POST['save'])){

// connect to database
include 'conn.php';

// capture data from form
$id = $_POST['id'];
$hostname = $_POST['hostname'];
$dc = $_POST['dc'];
$brand = $_POST['brand'];
$app = implode(", ", $_POST['app']);
$note = $_POST['note'];
$created = $_POST['created'];
$updated = $_POST['updated'];

// input data to database
mysqli_query($conn,"insert into server(id,hostname,dc,brand,app,note,created,updated) values('$id','$hostname','$dc','$brand','$app','$note',current_timestamp(),current_timestamp())") or die(mysqli_error($conn));

// redirect page to index.php
header("location:index.php");

}
?>
