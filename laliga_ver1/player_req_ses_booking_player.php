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


$sqlViewAllBookingRequest = "SELECT * FROM reservations_data INNER JOIN user ON reservations_data.user_idno=user.user_idno WHERE reservations_data.user_idno='$sesIdno'";
$resultViewAllBookingRequest = mysqli_query($conn, $sqlViewAllBookingRequest);




// DECLINE BOOKING EVENT
$bookCancel = 'cancel';

if(isset($_POST['btnDecline'])) {
$bookStatus = $_POST['bookStatus'];
$bookResIdno = $_POST['bookResIdno'];
$bookUserIdno = $_POST['bookUserIdno'];




$sqlUpdateStatusRes = "UPDATE reservations_data_history  set res_status='$bookCancel' 
WHERE res_idno='$bookResIdno' AND user_idno='$bookUserIdno'";

if ($conn->query($sqlUpdateStatusRes) === TRUE) {
  echo "Record updated successfully";

 $sqlDeleteRes = "DELETE FROM reservations_data WHERE res_idno='$bookResIdno' AND user_idno='$bookUserIdno'";
 $conn->query($sqlDeleteRes);

} else {
  echo "Error updating record: " . $conn->error;
}


} // end of main IF ELSE



 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Booking Request</title>
 </head>
 <body>
 

 <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Reservation ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Reservation Date</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
      <th scope="col">Total Payment</th>
      <th scope="col">Total Hours</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php
  while($rowBooking = $resultViewAllBookingRequest->fetch_assoc()): ?>
   
   <?php if($rowBooking['res_status'] == 'pendingpay'): ?>
    <tbody>
    <tr>
      <th scope="row"><?php echo $rowBooking['res_idno']; ?></th>
      <td><?php echo $rowBooking['user_fname'] . ' ' . $rowBooking['user_lname']; ?></td>
      <td><?php echo $rowBooking['res_date']; ?></td>
      <td><?php echo $rowBooking['res_start_time']; ?></td>
      <td><?php echo $rowBooking['res_end_time']; ?></td>
      <td><?php echo $rowBooking['res_total_payment']; ?></td>
      <td><?php echo $rowBooking['res_hrs_duration']; ?></td>
       <td><?php echo $rowBooking['res_status']; ?></td>
      <td>
        <form method="POST" action="player_req_ses_booking.php">
          <input type="hidden" name="bookStatus" value="<?php echo $rowBooking['res_status']; ?>">
          <input type="hidden" name="bookResIdno" value="<?php echo $rowBooking['res_idno']; ?>">
          <input type="hidden" name="bookUserIdno" value="<?php echo $rowBooking['user_idno']; ?>">
          <h5>Can no longer cancel this request. </h5>
         <!--  <p>You have 12 hrs before it expires</p> -->
        </form>
        <a href="pay_gateway_ses_state.php" target="_blank" >Pay Now</a>
      </td>
      <td></td>
    </tr>
  </tbody>
<?php elseif($rowBooking['res_status'] == 'success'): ?>

  <tbody>
    <tr>
      <th scope="row"><?php echo $rowBooking['res_idno']; ?></th>
      <td><?php echo $rowBooking['user_fname'] . ' ' . $rowBooking['user_lname']; ?></td>
      <td><?php echo $rowBooking['res_date']; ?></td>
      <td><?php echo $rowBooking['res_start_time']; ?></td>
      <td><?php echo $rowBooking['res_end_time']; ?></td>
      <td><?php echo $rowBooking['res_total_payment']; ?></td>
      <td><?php echo $rowBooking['res_hrs_duration']; ?></td>
       <td><?php echo $rowBooking['res_status']; ?></td>
      <td>
        <form method="POST" action="player_req_ses_booking.php">
          <input type="hidden" name="bookStatus" value="<?php echo $rowBooking['res_status']; ?>">
          <input type="hidden" name="bookResIdno" value="<?php echo $rowBooking['res_idno']; ?>">
          <input type="hidden" name="bookUserIdno" value="<?php echo $rowBooking['user_idno']; ?>">
          <h5>Successful Payment</h5>
        </form>
      </td>
      <td></td>
    </tr>
  </tbody>

   <?php else: ?>

    <tbody>
    <tr>
      <th scope="row"><?php echo $rowBooking['res_idno']; ?></th>
      <td><?php echo $rowBooking['user_fname'] . ' ' . $rowBooking['user_lname']; ?></td>
      <td><?php echo $rowBooking['res_date']; ?></td>
      <td><?php echo $rowBooking['res_start_time']; ?></td>
      <td><?php echo $rowBooking['res_end_time']; ?></td>
      <td><?php echo $rowBooking['res_total_payment']; ?></td>
      <td><?php echo $rowBooking['res_hrs_duration']; ?></td>
       <td><?php echo $rowBooking['res_status']; ?></td>
      <td>
        <form method="POST" action="player_req_ses_booking_decline.php">
          <input type="hidden" name="bookStatus" value="<?php echo $rowBooking['res_status']; ?>">
          <input type="hidden" name="bookResIdno" value="<?php echo $rowBooking['res_idno']; ?>">
          <input type="hidden" name="bookUserIdno" value="<?php echo $rowBooking['user_idno']; ?>">
          <!-- <input type="submit" name="btnApproved" value="Edit" class="btn btn-outline"> -->

          <input type="hidden" name="totalPayment" value="<?php echo $rowBooking['res_total_payment']; ?>">

             <input type="hidden" name="resCourtName" value="<?php echo $rowBooking['res_courtname']; ?>">
          
          <br>
          <input type="submit" name="btnDecline" value="Cancel" class="btn btn-outline-primary">
        </form>
      </td>
      <td></td>
    </tr>
  </tbody>
<?php endif; ?>



  <?php endwhile; ?>
</table>	



 </body>
 </html>