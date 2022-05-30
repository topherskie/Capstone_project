<?php require 'inc/header_ses.php'; ?>
<?php 
error_reporting(0);
$userIdno;
$userFirstname;
$userLastname;

$sqlSubHistory ="SELECT * FROM payment_tracker WHERE user_id='$userIdno'";
$resultSubHistory = mysqli_query($conn, $sqlSubHistory);
 ?>

<style type="text/css">
	.pay-his-con {
		width: 50%;
		margin: auto; 
		box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
	}

	@media only screen and (max-width: 600px) {
  .pay-his-con {
    width: 100%
  }
}
</style>




<br>
<div class="container pay-his-con" style="overflow-x: auto;">
  <h3>Payment History</h3>           
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

        <td><?php echo $rowSubHis['payment_id']; ?></td>
        <td><?php echo $rowSubHis['date_sub_started']; ?></td>
        <td><?php echo $rowSubHis['payment_type']; ?></td>
        <td><?php echo $rowSubHis['purpose']; ?></td>
        <td><?php echo $rowSubHis['payment_amount']; ?></td>
        <td><?php echo $rowSubHis['payment_status']; ?></td>
        <td><?php echo $rowSubHis['subscription_duration']; ?>
          
          
         <form method="POST" action="subsReceipt.php" target="_blank">

        <!-- user info -->
          <input type="hidden" name="txtUserFullName" value="<?php echo $userFirstname . ' ' . $userLastname; ?>">

             
           <input type="hidden" name="rpayment_idno" value="<?php echo $rowSubHis['payment_id']; ?>">
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
