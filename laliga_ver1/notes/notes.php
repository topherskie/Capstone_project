<?php 

	// $id = $_POST['id'];
   // $rate = $_POST['rate'];
   // $rsvdate = date('Y-m-d', strtotime($_POST["rsvdate"]));
   // $rsvstart = $_POST["rsvstart"];
   // $rsvend = $_POST["rsvend"];
   // $diff = abs((strtotime($rsvstart))-(strtotime($rsvend)));
   // //duration of the reservation
   // $duration = floor($diff/60);
   // //payment formula: rate/hour % 60 mins * duration
   // $payment = (($rate / 60)*$duration);
   // //current date and time
   // $fullDate = date('Y-m-d') ." ". date('H:i');
   // //allocated time limit for reservatoin cancelation.
   // $rsvDatestart = $rsvdate ." ". $rsvstart;
   // $tDiff = abs((strtotime($fullDate))-(strtotime($rsvDatestart))); 
   // $allocation = floor($tDiff/60); 


/*
	res_idno
	bc_idno
	co_idno
	user_idno
	res_date
	res_start_time
	res_end_time
	res_totalpayment
	res_totalhrs_duration
	res_status
	res_address
	res_courtname
	res_timestamp
	res_time_approved	

*/




/*
get all data from other table with foreign key 
https://stackoverflow.com/questions/24332294/how-to-get-all-data-from-2-tables-using-foreign-key

*/



// BETTER CHECKING BEFORE RENDERING DATA

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
  
  while($row = mysqli_fetch_assoc($result)) {
   
   echo $row['user_uid'] . "<br>";
	
 }

} // end of main

	
 ?>

 