<?php require 'config/db.php'; ?>

<?php
error_reporting(0);
//fetch.php;
if(isset($_POST["view"]) AND isset($_POST['userIdnos'])) {
$userIdnos = $_POST['userIdnos'];

 if($_POST["view"] != '') {
  $update_query = "UPDATE player_invites SET invite_notif=1 WHERE invite_notif=0 AND player_id='$userIdnos'";
  mysqli_query($conn, $update_query);
 }

 $query = "SELECT * FROM player_invites WHERE player_id='$userIdnos' ORDER BY invite_id DESC LIMIT 5";
 $result = mysqli_query($conn, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <style>
   .invite-des {
     padding-left: 12px;

   }
   </style>
   <li class="invite-des">
   <strong>'."Scout: ".$row["scout_name"].'</strong><br />
    <a href="player_invite_info.php"><small><em>Click here to learn more.</em></small></a>
   </li>
   <li class="divider"></li>';
  }
 }
 else
 {
  $output .= '
  <style>
   .invite-div {
    padding-left: 12px;
    margin:15px;
   }
   </style>
  <div class="invite-div"><p>No Notification Found.</p></div>
  ';
 }
 
 $query_1 = "SELECT * FROM player_invites WHERE invite_notif=0 AND player_id='$userIdnos'";
 $result_1 = mysqli_query($conn, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification' => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>