<?php include 'inc/header_login_state.php'; ?>
<?php 	
// echo  $sesIdno . "<BR>";
//   echo $sesUser . "<BR>";;
//   echo  $sesUserType . "<BR>";
//   echo $sesFname;
//   echo $sesLname;
//   $event_idnos = $_SESSION['event_idnos'];
//   echo  $event_idnos;



$eventId = '';
// QEURY UPDATE TEAM DETAILS
if(isset($_POST['btnSaveScore'])) {

$txtTeam_id = $_POST['txtTeam_id'];
$oneQ = $_POST['oneQ'];
$twoQ = $_POST['twoQ'];
$threeQ = $_POST['threeQ'];
$fourQ = $_POST['fourQ'];
$eventId = $_POST['eventId'];
echo $eventId;
$updateTeamScore = "UPDATE teams SET 1st_quarter='$oneQ', 2nd_quarter='$twoQ', 3rd_quarter='$threeQ', 4th_quarter='$fourQ' WHERE team_id='$txtTeam_id'"; 
if ($conn->query($updateTeamScore) === TRUE) {
  //echo "Record updated successfully";

} else {
  echo "Error updating record: " . $conn->error;
}



} // query team


$eventId;






?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>



<script type="text/javascript">
  const eventId = "<?php echo $eventId; ?>"
  console.log(eventId);

  setTimeout(function() {
    window.location.href = `tournament_bracket_ses_state.php?eventId=${eventId}`;
  }, 500);
</script>
</body>
</html>