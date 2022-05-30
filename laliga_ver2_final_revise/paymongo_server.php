<?php 
require "config/db.php";

error_reporting(0);
// for subscriptions
if(isset($_POST['userPayIdno']) OR isset($_POST['userPayses'])  OR isset($_POST['paymentSource']) OR isset($_POST['dateStarted']) OR isset($_POST['paymentType']) OR isset($_POST['paymentAmount']) OR isset($_POST['paymentStatus']) OR isset($_POST['subscriptionDuration'])) {
	$userPayIdno = $_POST['userPayIdno'];
	$userPayses = $_POST['userPayses'];
	$paymentSource = $_POST['paymentSource'];
	$dateStarted = $_POST['dateStarted'];
	$paymentType = $_POST['paymentType'];
	$paymentAmount = $_POST['paymentAmount'];
	$paymentStatus = $_POST['paymentStatus'];
	$subscriptionDuration = $_POST['subscriptionDuration'];
	$paymentPurpose = "subscription";


	$sqlPaymentTracker = "INSERT INTO payment_tracker (user_id, user_username, payment_source, date_sub_started, payment_type, purpose, payment_amount, payment_status, subscription_duration) VALUES ('$userPayIdno', '$userPayses', '$paymentSource', '$dateStarted', '$paymentType', '$paymentPurpose', '$paymentAmount', '$paymentStatus', '$subscriptionDuration')";


	if ($conn->query($sqlPaymentTracker) === TRUE) {
  echo "New payment record created successfully";
} else {
  echo "Error: " . $sqlPaymentTracker . "<br>" . $conn->error;
}

} // end of main if else








 ?>