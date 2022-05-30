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



// QUERY THE HISTORY RESERVATION TABLE
$sqlViewAllBookingRequest = "SELECT * FROM reservations_data_history INNER JOIN user ON reservations_data_history.user_idno=user.user_idno WHERE reservations_data_history.user_idno='$sesIdno'";
$resultViewAllBookingRequest = mysqli_query($conn, $sqlViewAllBookingRequest);

 ?>




 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Booking History</title>
 </head>
 <body>
 
  <table class="table">
  <thead class="thead-dark">
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
      
      
      </td>
      <td></td>
    </tr>
  </tbody>
  <?php endwhile; ?>
</table>	




 </body>
 </html>