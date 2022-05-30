<?php include 'inc/header_login_state.php'; ?>
<?php 

$sesIdno . "<BR>";
 $sesUser . "<BR>";;
   $sesUserType . "<BR>";


$resultPlayers = '';
if(isset($_GET['btnSearchPlayer'])) {

	$txtSearchPlayers = $_GET['txtSearchPlayers'];
  //$txtSearchPlayers = preg_replace("#[^0-9a-z]#i","",$txtSearchPlayers);

	$sqlSearchPlayer ="SELECT * FROM user WHERE city LIKE '$txtSearchPlayers%' OR user_idno LIKE '$txtSearchPlayers%' OR user_fname LIKE '$txtSearchPlayers%' OR user_lname LIKE '$txtSearchPlayers%'";
	$queryPlayer = $conn->query($sqlSearchPlayer);

} // end of main if else


$alertRecruit = '';

// RECRUIT PLAYER PART
$requesterEmail = '';
if(isset($_POST['btnInvite'])) {
$txtRecruitIdno = $_POST['txtRecruitIdno'];
$txtPlayerIdno = $_POST['txtPlayerIdno'];
$txtPlayerName = $_POST['txtPlayerName'];
$inviteStatus = "pending";
$requesterEmail = $_POST['requesterEmail'];
// echo $txtRecruitIdno;
// echo $txtPlayerIdno;
// echo $txtPlayerName;

$sqlCheckRecruit = "SELECT * FROM recruit_inivites WHERE recruit_idno='$txtRecruitIdno' AND player_idno='$txtPlayerIdno'";
$resultCheckRecruit = $conn->query($sqlCheckRecruit);

if ($resultCheckRecruit->num_rows > 0) {
  $alertRecruit = 'Sorry Invites can only be sent once';
} else {
   
   $sqlInvitePlayer = "INSERT INTO recruit_inivites (recruit_idno, player_idno, player_name, invite_status, requester_email) VALUES ('$txtRecruitIdno', '$txtPlayerIdno', '$txtPlayerName', '$inviteStatus', '$requesterEmail')";


   if ($conn->query($sqlInvitePlayer) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sqlInvitePlayer . "<br>" . $conn->error;
    }



} // END OF CHECKING IF ELSE


} // end of invites


 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search Player</title>
	<style type="text/css">
        .pay-success-container {
        display: none;
      }

      .pay-failed-container {
        display:  block;
      }

      /*alter div base on the php condition hide certain div according to user state*/
      .hide-div {
        display:  none;
      }

      .show-div {
        display:  block;
      }


      .player-render-container {
        
        padding: 4px;
        margin: auto;
        border-radius: .5em;
        width: 75%;
        text-align: center;
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;

      }

      .imgP-size {
        border-radius: 50%;
        width: 5em;
        height:5em;
        margin:  5px;
        padding: 5px;

      }

      .img-container {
        display: block;
      }

      .form-sub-container {
        width: 50%;
        margin: auto;
        padding: 8px;
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
      } 

      .pay-sub {
        color: #0AA1DD;
      }

      .recruit-container {
        width: 50%;
        margin: auto;
      }

      @media only screen and (max-width: 600px) {
  .recruit-container {
        width: 100%;
        margin: auto;
      }
}


    </style>
</head>
<body>

  <div class="alert-container alert alert-danger alert-data">
    <div><h4><?php echo $alertRecruit; ?></h4></div>
  </div>
 <div class="<?php echo $divState; ?>">
  <div class="recruit-container">
     <form method="GET" action="recruit_players_search_ses_state.php" class="form-control">
      <div class="input-group">
      <input type="text" name="txtSearchPlayers" placeholder="search.." class="form-control rounded">
      <input type="submit" name="btnSearchPlayer" value="Search" class="btn btn-outline-primary">
    </form>
    </div>
  </div>

  <br>

  <div class="render-player-container">
  <?php 

  while ($playerRows = $queryPlayer->fetch_array()) {

   if($playerRows['user_idno'] != $sesIdno) {

    $playerImg = "img_profiles/" . $playerRows['img_profile'];
    $playerHighLights = "hl_moments/" . $playerRows['hl_moments'];
    $player_name = $playerRows['user_fname'] . ' ' . $playerRows['user_lname'];

    echo '<br>';
    echo "<div class='player-render-container'>";
    echo "<a href='portfolio_ses_state.php?pUserIdno={$playerRows['user_idno']}'><p>Porfolio: " . $playerRows['user_fname'] . ' ' . $playerRows['user_lname'] . "</p></a>";
    echo "<p>" . $playerRows['user_email'] . ' ' . $playerRows['city'] . "</p>";
    echo "<div class='img-container'>";
    echo "<img src='{$playerImg}' alt='Player Profile' class='imgP-size'>";
    echo "</div>";

    echo "<video width='320' height='540' controls>";
    echo "<source src='{$playerHighLights}' type='video/mp4'>";
    echo "</video>";

    
    echo "<br>";
    echo "<input type='hidden' value='Message' id='btnMsgPlayer' class='btn btn-outline-primary'>";
    
    echo "<form action='recruit_players_ses_state.php' method='POST'>";
    echo "<input type='hidden' name='txtRecruitIdno' value='{$sesIdno}'>";
    echo "<input type='hidden' name='txtPlayerIdno' value='{$playerRows['user_idno']}'>";
    echo "<input type='hidden' name='txtPlayerName' value='{$player_name}'>";
    echo "<input type='hidden' name='requesterEmail' value='{$playerRows['user_email']}'>";
    echo "<input type='submit' value='Send Invite' name='btnInvite' class='btn btn-outline-primary'>";
    echo "</form>";
    echo "</div>";





   } // end of if 


  } // end of while loop





   ?>  


  </div>


</div> <!-- end of div $divState -->

















<script type="text/javascript">
const alertData = document.querySelector(".alert-data"); 
 

setTimeout(function() {
  alertData.style.display = "none";
}, 3000);


</script>


</body>
</html>