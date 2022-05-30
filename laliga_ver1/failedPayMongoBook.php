<?php 
require "configs/db.php";
require "configs/server.php"; 
$sesUserType = $_SESSION['user_type'];
$sesUser = $_SESSION['user_username'];
$sesIdno =  $_SESSION['user_idno'];
$sesFname = $_SESSION['user_fname'];
$sesLname = $_SESSION['user_lname'];

echo $sesIdno;
echo $sesUser;
echo $sesUserType;


$sqlUpdateStatus = "UPDATE reservations_data SET res_status='failed' WHERE res_idno='$booking_idno'";
// for update
  if ($conn->query($sqlUpdateStatus) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <title>Successfull payment</title>
 </head>
 <body>
 
 </body>
 </html>