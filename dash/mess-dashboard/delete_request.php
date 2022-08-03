<?php session_start(); ?>

<?php

include('../../config.php');

$id = $_GET['id'];
$result=mysqli_query($conn, "DELETE FROM menu WHERE id=$id");
echo "<script type='text/javascript'>alert('Your Request is deleted Successfully !!!');document.location='viewmenu.php';</script>";

?>

