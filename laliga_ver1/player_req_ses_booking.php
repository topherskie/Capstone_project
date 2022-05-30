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


$sqlViewAllBookingRequest = "SELECT * FROM reservations_data INNER JOIN user ON reservations_data.user_idno=user.user_idno WHERE reservations_data.co_idno='$sesIdno'";
$resultViewAllBookingRequest = mysqli_query($conn, $sqlViewAllBookingRequest);










 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Booking Request</title>
 </head>
 <body>
 
  <div style="overflow-x: auto;">
 <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Reserve ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Reservation Date</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
      <th scope="col">Total Payment</th>
      <th scope="col">Total Hrs</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php
  while($rowBooking = $resultViewAllBookingRequest->fetch_assoc()): ?>
    <?php if($rowBooking['res_status'] == 'success'): ?>
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
        <form method="POST" action="paybook_court_ses_co.php">
          <input type="hidden" name="txtReqName" value="<?php echo $rowBooking['user_fname'] . ' ' . $rowBooking['user_lname']; ?>">
          <input type="hidden" name="bookTotalPay" value="<?php echo $rowBooking['res_total_payment']; ?>">
          <input type="hidden" name="bookUserIdno" value="<?php echo $rowBooking['user_idno']; ?>">
          <input type="hidden" name="bookResIdno" value="<?php echo $rowBooking['res_idno']; ?>">
          <input type="hidden" name="bookCOidno" value="<?php echo $rowBooking['co_idno']; ?>">
          <input type="hidden" name="btnAcceptBook" value="Accept" class="btn btn-outline-primary">
        </form>
        <form method="POST" action="player_req_ses_booking_decline.php">

          <input type="hidden" name="bookCOidno" value="<?php echo $rowBooking['co_idno']; ?>">
          <input type="hidden" name="bookStatus" value="<?php echo $rowBooking['res_status']; ?>">
          <input type="hidden" name="bookResIdno" value="<?php echo $rowBooking['res_idno']; ?>">
          <input type="hidden" name="bookUserIdno" value="<?php echo $rowBooking['user_idno']; ?>">
          <input type="hidden" name="btnDecline" value="Decline" class="btn btn-outline-primary">
        </form>
      </td>
      <td></td>
    </tr>
  </tbody>
    


    <?php elseif($rowBooking['res_status'] == 'pending'): ?>
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
        <form method="POST" action="paybook_court_ses_co.php">
          <input type="hidden" name="txtReqName" value="<?php echo $rowBooking['user_fname'] . ' ' . $rowBooking['user_lname']; ?>">
          <input type="hidden" name="bookTotalPay" value="<?php echo $rowBooking['res_total_payment']; ?>">
          <input type="hidden" name="bookUserIdno" value="<?php echo $rowBooking['user_idno']; ?>">
          <input type="hidden" name="bookResIdno" value="<?php echo $rowBooking['res_idno']; ?>">
          <input type="hidden" name="bookCOidno" value="<?php echo $rowBooking['co_idno']; ?>">
          <input type="submit" name="btnAcceptBook" value="Accept" class="btn btn-outline-primary">
        </form>

        
        <form method="POST" action="player_req_ses_booking_decline.php">

          <input type="hidden" name="bookCOidno" value="<?php echo $rowBooking['co_idno']; ?>">
          <input type="hidden" name="bookStatus" value="<?php echo $rowBooking['res_status']; ?>">
          <input type="hidden" name="bookResIdno" value="<?php echo $rowBooking['res_idno']; ?>">
          <input type="hidden" name="bookUserIdno" value="<?php echo $rowBooking['user_idno']; ?>">

            <input type="hidden" name="totalPayment" value="<?php echo $rowBooking['res_total_payment']; ?>">

             <input type="hidden" name="resCourtName" value="<?php echo $rowBooking['res_courtname']; ?>">

          <input type="submit" name="btnDecline" value="Decline" class="btn btn-outline-primary">
        </form>
      </td>
      <td></td>
    </tr>
  </tbody>

      <?php elseif($rowBooking['res_status'] == 'pendingpay'): ?>
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
        <form method="POST" action="paybook_court_ses_co.php">
          <input type="hidden" name="txtReqName" value="<?php echo $rowBooking['user_fname'] . ' ' . $rowBooking['user_lname']; ?>">
          <input type="hidden" name="bookTotalPay" value="<?php echo $rowBooking['res_total_payment']; ?>">
          <input type="hidden" name="bookUserIdno" value="<?php echo $rowBooking['user_idno']; ?>">
          <input type="hidden" name="bookResIdno" value="<?php echo $rowBooking['res_idno']; ?>">
          <input type="hidden" name="bookCOidno" value="<?php echo $rowBooking['co_idno']; ?>">
          <input type="hidden" name="btnAcceptBook" value="Accept" class="btn btn-outline-primary">
        </form>
        <form method="POST" action="player_req_ses_booking_decline.php">

          <input type="hidden" name="bookCOidno" value="<?php echo $rowBooking['co_idno']; ?>">
          <input type="hidden" name="bookStatus" value="<?php echo $rowBooking['res_status']; ?>">
          <input type="hidden" name="bookResIdno" value="<?php echo $rowBooking['res_idno']; ?>">
          <input type="hidden" name="bookUserIdno" value="<?php echo $rowBooking['user_idno']; ?>">

         

           




          <input type="submit" name="btnDecline" value="Decline" class="btn btn-outline-primary">
        </form>
      </td>
      <td></td>
    </tr>
  </tbody>
    <?php endif; ?>  
  
  <?php endwhile; ?>
</table>	

</div>
















<script type="text/javascript">
  const btnAcceptAlert = document.getElementById("btnAcceptAlert");

  btnAcceptAlert.addEventListener("click", function() {
    alert("Court Reservation Accepted!");
  });

</script>
 </body>
 </html>