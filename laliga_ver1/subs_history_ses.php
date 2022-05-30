<?php 

require "configs/db.php";
require "configs/server.php"; 
$sesUserType = $_SESSION['user_type'];
$sesUser = $_SESSION['user_username'];
$sesIdno =  $_SESSION['user_idno'];
$sesFname = $_SESSION['user_fname'];
$sesLname = $_SESSION['user_lname'];


$sqlSubHistory ="SELECT * FROM payment_tracker WHERE user_idno='$sesIdno'";
$resultSubHistory = mysqli_query($conn, $sqlSubHistory);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Subscription History</title>
 </head>
 <body>
 


<div class="container" style="overflow-x: auto;">
  <h2>Bordered Table</h2>
  <p>The .table-bordered class adds borders to a table:</p>            
  <table class="table table-bordered">

    <thead>
      <tr>
        <th>Payment Idno</th>
        <th>Date subscription started</th>
        <th>Payment Type</th>
        <th>Purpose</th>
         <th>Payment amount</th>
         <th>Payment status</th>
         <th>Subs Duration</th>
      </tr>
    </thead>

<?php while($rowSubHis = $resultSubHistory->fetch_assoc()): ?>
    <tbody>
      <tr>

        <td><?php echo $rowSubHis['payment_idno']; ?></td>
        <td><?php echo $rowSubHis['date_sub_started']; ?></td>
        <td><?php echo $rowSubHis['payment_type']; ?></td>
        <td><?php echo $rowSubHis['purpose']; ?></td>
        <td><?php echo $rowSubHis['payment_amount']; ?></td>
        <td><?php echo $rowSubHis['payment_status']; ?></td>
        <td><?php echo $rowSubHis['subscription_duration']; ?>
          
          
         <form method="POST" action="subsReceipt.php" target="_blank">

        <!-- user info -->
          <input type="hidden" name="txtUserFullName" value="<?php echo $sesFname . ' ' . $sesLname; ?>">

             
           <input type="hidden" name="rpayment_idno" value="<?php echo $rowSubHis['payment_idno']; ?>">
           <input type="hidden" name="rdate_sub_started" value="<?php echo $rowSubHis['date_sub_started']; ?>">
           <input type="hidden" name="rpayment_type" value="<?php echo $rowSubHis['payment_type']; ?>">
           <input type="hidden" name="rpurpose" value="<?php echo $rowSubHis['purpose']; ?>">
           <input type="hidden" name="rpayment_amount" value="<?php echo $rowSubHis['payment_amount']; ?>">
           <input type="hidden" name="rpayment_status" value="<?php echo $rowSubHis['payment_status']; ?>">
           <input type="hidden" name="rsubscription_duration" value="<?php echo $rowSubHis['subscription_duration']; ?>">

           <input type="submit" name="btnSubReceipt" value="receipt" class="btn btn-outline-success">
         </form>

        </td>

      </tr>
    </tbody>
  <?php endwhile; ?>
  </table>
</div>


 </body>
 </html>