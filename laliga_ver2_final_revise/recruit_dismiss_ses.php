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




$playerPos = '';
$inviteMsg = '';
$playerName = '';
$scoutName = '';
$eventId = '';
$playerId = '';
// decline trigger insert to history delete the record from player invite and udpate the avg accepted to NA
if(isset($_GET['btnDismiss'])) {
$playerPos = $_GET['playerPos'];
$inviteMsg = $_GET['inviteMsg'];
$playerName = $_GET['playerName'];    
$scoutName = $_GET['scoutName'];
$scoutId = $_GET['scoutId'];
$eventId = $_GET['eventId'];
$playerId = $_GET['playerId'];



} // END OF BTN DECLINE

?>


<style type="text/css">
    
</style>

<br>


<style type="text/css">
.dec-dsg {
    width: 60%;
    margin: auto;
    padding: 12px;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
}

@media only screen and (max-width: 600px) {
  .dec-dsg {
   width: 100%;
  }
}

</style>



<br>
<div class="dec-dsg animate__animated animate__backInUp">
    <div>
       <form method="GET" action="player_dismiss_submit_server.php">
        <label>brief explanation why player will be dismiss:</label>
            <input type="hidden" name="scoutId" value="<?php echo $scoutId; ?>">
            <input type="hidden" name="playerPos" value="<?php echo $playerPos; ?>">
            <input type="hidden" name="inviteMsg" value="<?php echo $inviteMsg; ?>">
            <input type="hidden" name="playerName" value="<?php echo $playerName; ?>">
            <input type="hidden" name="scoutName" value="<?php echo $scoutName; ?>">
            <input type="hidden" name="eventId" value="<?php echo $eventId; ?>">
             <input type="hidden" name="playerId" value="<?php echo $playerId; ?>">


            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="decMsg"></textarea>
            <br>

            <input type="submit" name="btnDismiss" value="Submit" class="btn btn-outline-danger">
       </form>
    </div>
</div>