<?php
include '../../config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Display PDF</title>
</head>

<body>

<!-- ------------------------------------------------------Displaying Address Proof--------------------------------------------------- -->
  <?php
  if (isset($_GET['aid'])) {
    $id = $_GET['aid'];
    $sql = "select * from registration where id=" . $id;
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
  ?>
      <embed type="application/pdf" src="../../pdf/<?php echo $row['address_doc']; ?>" width="100%" height="1000">

<!-- ---------------------------------------------------Displaying Admission Fee Receipt------------------------------------------------ -->
  <?php
    }
  }elseif(isset($_GET['fid'])) {
    $id = $_GET['fid'];
    $sql = "select * from registration where id=" . $id;
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
  ?>
   <embed type="application/pdf" src="../../pdf/<?php echo $row['fee_doc']; ?>" width="100%" height="1000">

<!-- ------------------------------------------------------Displaying Marksheet--------------------------------------------------- -->
  <?php
    }
  }elseif(isset($_GET['cid'])) {
    $id = $_GET['cid'];
    $sql = "select * from roomchange where id=" . $id;
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
      ?>
         <embed type="application/pdf" src="../../pdf/<?php echo $row['cgpafile'];?>" width= "100%" height="1000" >

<!-- ------------------------------------------------------Displaying main Hostel Fee Receipt--------------------------------------------------- -->
     <?php
      } 
  }elseif(isset($_GET['hid'])) {
    $id = $_GET['hid'];
    $sql = "select * from registration where id=" . $id;
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
      ?>
         <embed type="application/pdf" src="../../pdf/<?php echo $row['hostel_fee'];?>" width= "100%" height="1000" >

<!-- ------------------------------------------------------Displaying Students Hostel Fee Receipt--------------------------------------------------- -->         
     <?php
      } 
    }elseif(isset($_GET['ids'])) {
    $id = $_GET['ids'];
    $sql = "select * from fees where id=" . $id;
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
      ?>
         <embed type="application/pdf" src="../../pdf/<?php echo $row['receipt'];?>" width= "100%" height="1000" >
     <?php

      } 
    }
  ?>




</body>

</html>