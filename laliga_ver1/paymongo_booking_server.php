<?php 

require "configs/db.php";

// for Booking payment
if(isset($_POST['user_idno']) OR isset($_POST['co_idno']) OR isset($_POST['booking_idno']) OR isset($_POST['paymentSource']) OR isset($_POST['payment_type']) OR isset($_POST['purpose']) OR isset($_POST['paybook_amount']) OR isset($_POST['payment_status'])) {

  $user_idno = $_POST['user_idno'];
  $co_idno =  $_POST['co_idno'];
  $booking_idno = $_POST['booking_idno'];
  $paymentSource = $_POST['paymentSource'];
  $payment_type = $_POST['payment_type'];
  $purpose = $_POST['purpose'];
  $paybook_amount = $_POST['paybook_amount'];
  $payment_status = $_POST['payment_status']; 

$sqlInsertBookData = "INSERT INTO payment_court_tracker (user_idno, co_idno, booking_idno, paymentbook_source, payment_type, purpose, paybook_amount, payment_status) VALUES 
  ('$user_idno', '$co_idno', '$booking_idno', '$paymentSource', '$payment_type', '$purpose', '$paybook_amount', '$payment_status')";


$sqlUpdateStatus = "UPDATE reservations_data SET res_status='pendingpay' WHERE res_idno='$booking_idno'";

  if ($conn->query($sqlInsertBookData) === TRUE) {
  echo "New payment record created successfully";

// for update
  if ($conn->query($sqlUpdateStatus) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}



} else {
  echo "Error: " . $sqlInsertBookData . "<br>" . $conn->error;
}



} // END OF MAIN IF ELSE


 ?>