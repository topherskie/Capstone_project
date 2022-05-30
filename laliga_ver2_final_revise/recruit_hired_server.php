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



// change status from accept to hired in player_invites and player_port_avg to hired as well
if(isset($_GET['btnHired'])) {
$playerId = $_GET['playerId'];
$eventId = $_GET['eventId'];


$updateStatusHired = "UPDATE player_invites SET invite_status='hired' WHERE invite_id='$eventId'"; 
if ($conn->query($updateStatusHired) === TRUE) {
  //echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}



// update player_port_avg
$updateHiredAvg = "UPDATE player_port_avg SET avg_recruit_status='hired' WHERE user_id='$playerId'";
if ($conn->query($updateHiredAvg) === TRUE) {
  //echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}




// update profiler of user to hired
$playerHired = "UPDATE users SET hired_status='hired' WHERE user_id='$playerId'";
if ($conn->query($playerHired) === TRUE) {
  //echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}



} // END OF HIRED

 ?>


 <br>

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
        <h4>Success.</h4>
    </div>

</div>


<script type="text/javascript">
     window.setTimeout(function() {
    window.location = 'player_recruitList_ses.php';
  }, 3000);

</script>