<?php 
require "configs/db.php";
require "configs/server.php"; 
$sesUserType = $_SESSION['user_type'];
$sesUser = $_SESSION['user_username'];
$sesIdno =  $_SESSION['user_idno'];
$sesFname = $_SESSION['user_fname'];
$sesLname = $_SESSION['user_lname'];

 $sesIdno;
 $sesUser;
$sesUserType;


$sqlUpdateStatus = "UPDATE reservations_data SET res_status='success' WHERE res_status='pendingpay'";
// for update
  if ($conn->query($sqlUpdateStatus) === TRUE) {
  //echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}


// also update the payment_court_tracker base on BOOK_IDNO



 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Successfull payment</title>
  <style type="text/css">
    .success-booking {
      width:  60%;
      margin: auto;
      padding:  12px;
      text-align: center;
      color: #00FFC6;
      box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
    }
  </style>
 </head>
 <body>
<br>
<br>
<br>
<br>
 	<div class="success-booking">
    <div class=""><h1>Court successfully Book.</h1></div>
  </div>
 


 <script type="text/javascript">
     setTimeout(function() {
         window.location.href = `profile_ses_state.php`;
      },3000)
 </script>
 </body>
 </html>