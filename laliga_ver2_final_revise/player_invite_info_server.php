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


if(isset($_GET['btnAccept'])) {
$eventId = $_GET['eventId'];
$playerId = $_GET['playerId'];
 $eventId;

$acceptStatus = "UPDATE player_invites SET invite_status='recruited' WHERE invite_id='$eventId'";

if ($conn->query($acceptStatus) === TRUE) {
  //echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}



// update as well the AVG table to hide user from recruitment if accpeted. 
$sqlAvgUpdate = "UPDATE player_port_avg SET avg_recruit_status='recruited' WHERE user_id='$playerId'";
if ($conn->query($sqlAvgUpdate) === TRUE) {
  //echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}




} // END OF BTN ACCEPT
?>

<style type="text/css">
.main-container-dec {
  width: 60%;
  margin: auto;
  text-align: center;
  font-weight: bold;
} 

</style>


<br>
<br>
<br>
<br>
<div class="main-container-dec">
  
  <div class="alert alert-success" role="alert">
      <h4>Invite Accepted.</h4>
  </div>

</div>


<script type="text/javascript">
   window.setTimeout(function() {
    window.location = 'player_invite_info.php';
  }, 3000);

</script>