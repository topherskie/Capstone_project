<?php 

require "configs/db.php";
require "configs/server.php"; 
$sesUserType = $_SESSION['user_type'];
$sesUser = $_SESSION['user_username'];
$sesIdno =  $_SESSION['user_idno'];
$sesFname = $_SESSION['user_fname'];
$sesLname = $_SESSION['user_lname'];


$sqlSubHistory ="SELECT * FROM payment_court_tracker WHERE user_idno='$sesIdno'";
$resultSubHistory = mysqli_query($conn, $sqlSubHistory);


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Court Booking History</title>
 </head>
 <body>
 <h1>Court Booking History</h1>


<div class="container" style="overflow-x: auto;">
  <h2>Bordered Table</h2>
  <p>The .table-bordered class adds borders to a table:</p>            
  <table class="table table-bordered">

    <thead>
      <tr>
        <th>Booking idno</th>
        <th>Payment type</th>
        <th>Purpose</th>
         <th>Payment amount</th>
         <th>Payment status</th>
      </tr>
    </thead>

<?php while($rowSubHis = $resultSubHistory->fetch_assoc()): ?>
    <tbody>
      <tr>

        <td><?php echo $rowSubHis['booking_idno']; ?></td>
        <td><?php echo $rowSubHis['payment_type']; ?></td>
        <td><?php echo $rowSubHis['purpose']; ?></td>
        <td><?php echo $rowSubHis['paybook_amount']; ?></td>
        <td><?php echo $rowSubHis['payment_status']; ?>
          
        <form method="POST" action="bookReceipt.php" target="_blank">

        <!-- user info -->
          <input type="hidden" name="txtUserFullName" value="<?php echo $sesFname . ' ' . $sesLname; ?>">

          <input type="hidden" name="booking_idno" value="<?php echo $rowSubHis['booking_idno']; ?>">
          <input type="hidden" name="payment_type" value="<?php echo $rowSubHis['payment_type']; ?>">
          <input type="hidden" name="purpose" value="<?php echo $rowSubHis['purpose']; ?>">
           <input type="hidden" name="paybook_amount" value="<?php echo $rowSubHis['paybook_amount']; ?>">
          <input type="hidden" name="payment_status" value="<?php echo $rowSubHis['payment_status']; ?>">


             
           

           <input type="submit" name="btnBookReceipt" value="receipt" class="btn btn-outline-success">
         </form>
        </td>

      </tr>
    </tbody>
  <?php endwhile; ?>
  </table>
</div>


 </body>
 </html>