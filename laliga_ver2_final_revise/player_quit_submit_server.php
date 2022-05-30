<?php require 'inc/header_ses.php'; ?>
<?php 
$userIdno;
$userType;
 $userName;
$userEmail;
$userFirstname;
$userLastname;
$userAddress;
$userDob;


if(isset($_GET['btnQuit'])) {
$eventId = $_GET['eventId'];
$playerId = $_GET['playerId'];
$playerPos = $_GET['playerPos'];
$inviteMsg = $_GET['inviteMsg'];
$playerName = $_GET['playerName'];    
$scoutName = $_GET['scoutName'];
$decMsg = $_GET['decMsg'];
$scoutId = $_GET['scoutId'];
$cancelDate = date("Y-m-d");
$reason = 'leave';

$decRecords = "INSERT INTO player_invites_dec (event_id, player_id, scout_id, player_pos, invite_msg, player_name, scout_name, 
dec_msg, cancel_date, dec_reason) VALUES('$eventId', '$playerId', '$scoutId', '$playerPos', '$inviteMsg', '$playerName', '$scoutName', '$decMsg', '$cancelDate', '$reason')";

if ($conn->query($decRecords) === TRUE) {
 // echo "New record created successfully";
} else {
  echo "Error: " . $decRecords . "<br>" . $conn->error;
}



// update the status of the avg accepted
$avgLeave = "UPDATE player_port_avg SET avg_recruit_status='' WHERE user_id='$playerId'";
if ($conn->query($avgLeave) === TRUE) {
  //echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}






// DELETE RECORD 
$sqlDelDec = "DELETE FROM player_invites WHERE invite_id='$eventId'";

if ($conn->query($sqlDelDec) === TRUE) {
  //echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}


} // end of btn decline



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
        <h4>Success.</h4>
    </div>

</div>


<script type="text/javascript">
     window.setTimeout(function() {
    window.location = 'invites_history_ses.php';
  }, 3000);

</script>