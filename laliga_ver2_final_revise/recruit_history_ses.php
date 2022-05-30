<?php require 'inc/header_ses.php'; ?>
<?php 
error_reporting(0);
$userIdno;
$userType;
$userName;
$userEmail;
$userFirstname;
$userLastname;
$userAddress;
$userDob;

$inviteHis = "SELECT * FROM player_invites_dec WHERE scout_id='$userIdno'";
$queryHis = mysqli_query($conn, $inviteHis);


?>

<style type="text/css">
.his-dec {
		padding:  10px;
	width: 60%;
	margin: auto;
	/*box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;*/
}

.child-cont-dismiss {
	padding: 8px;
	box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
}



@media only screen and (max-width: 600px) {
.his-dec {
   width: 100%;
  }
}

</style>


<br>
<br>




<div class="his-dec animate__animated animate__backInUp">
	
	<div class="child-cont-dismiss">
		<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Player name</th>
      <th scope="col">Reason</th>
      <th scope="col">Description</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
<?php while($rowDataHis = $queryHis->fetch_assoc()): ?>
    <tr>
      <td><?php echo $rowDataHis['player_name']; ?></td>
      <td><?php echo $rowDataHis['dec_reason']; ?></td>
        <td><p><?php echo $rowDataHis['dec_msg']; ?></p></td>
      <td><?php echo $rowDataHis['cancel_date']; ?></td>
    </tr>
<?php endwhile; ?>
  </tbody>
</table>
	</div>


</div>





<br>
