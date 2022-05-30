<?php require 'inc/header_ses.php'; ?>

<?php 

$userIdno;
$userType;
 $userFirstname;
$userLastname;
$playerId = '';
$resultPos = '';
$scoutFullName = $userFirstname . ' ' . $userLastname;
if($_GET['btnInvite']) {
$playerId = $_GET['playerId'];

echo $playerId;


$invitePlayer = "SELECT * FROM users WHERE user_id='$playerId'";
$queryPlayerInfo = mysqli_query($conn, $invitePlayer);
$resultPlayer = mysqli_fetch_assoc($queryPlayerInfo);

//echo $resultPlayer['user_firstname'] . ' ' .  $resultPlayer['user_lastname'];



// get the player position
$sqlPosition = "SELECT * FROM player_port_avg WHERE user_id='$playerId'";
$queryPlayerPos = mysqli_query($conn, $sqlPosition);
$resultPos = mysqli_fetch_assoc($queryPlayerPos);



} // END OF PLAYER ID

 ?>

 <style type="text/css">
     .main-container-invites {
        box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
        margin: auto;
        width: 50%;

        padding: 12px;
     }
     .img-size {
        width: 50%;
        margin: auto;
        height:  40vh;
        border-radius: 50%;
     }

     .card-body-align {
        text-align:  center;
     }

     @media only screen and (max-width: 600px) {
 .main-container-invites {
    width: 100%;
  }
}

 </style>


 <div class="main-container-invites">
       <div class="card">
        <br>
            <img class="card-img-top img-size" src="<?php echo "img_profiles/".$resultPlayer['user_pp']; ?>" alt="Card image cap">
        <div class="card-body card-body-align">
            <p class="card-text">Position: <?php echo $resultPos['avg_pos']; ?></p>
            <p class="card-text">Player name: <?php echo $resultPlayer['user_firstname'] . ' ' .  $resultPlayer['user_lastname']; ?></p>
        </div>
        </div>       


   
    <div class="form-group">

    <label for="exampleFormControlTextarea1">Add notes:</label>

    <textarea class="form-control" id="txtArea" rows="3"></textarea>
    </div>
    <br>

     <div class="form-group">
     <button name="post" id="btnInvite" class="btn btn-info">Send Invite</button>
    </div>

 </div>








 
<!-- nortification -->
<script type="text/javascript">
let resultPos = "<?php echo $resultPos['avg_pos']; ?>";
let userIdno = "<?php echo $userIdno; ?>"; // scout idno
let playerId = "<?php echo $playerId; ?>"; // player idno
let playerName = "<?php echo $resultPlayer['user_firstname'] . ' ' .  $resultPlayer['user_lastname']; ?>";
let scoutName = "<?php echo $scoutFullName; ?>";

console.log(playerName);
console.log(userIdno);
console.log(playerId);
console.log(scoutName);

const inviteState = "pending"; // initial status
console.log(inviteState);

$(document).ready(function(){

$("#btnInvite").click(function(){
  $.post("invite_server.php",
  {
    inviteMsg: $('#txtArea').val(),
    playerIds: playerId,
    userIdnos: userIdno, 
    playerNames: playerName,
    scoutNames: scoutName,
    inviteStates: inviteState,
    resultPoss: resultPos,
  },
  function(data, status){
    //alert("Data: " + data + "\nStatus: " + status);
    alert("Success!");
   window.close();
  });
});



});

</script>