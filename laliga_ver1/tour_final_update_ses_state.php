<?php include 'inc/header_login_state.php'; ?>
<?php 	
// echo  $sesIdno . "<BR>";
//   echo $sesUser . "<BR>";;
//   echo  $sesUserType . "<BR>";
//   echo $sesFname;
//   echo $sesLname;
//   $event_idnos = $_SESSION['event_idnos'];
//   echo  $event_idnos;



// UPDATE FINAL SCORE
// update scores
$eventId = '';
if(isset($_POST['btnSubmitFs'])) {
$eventId = $_POST['eventId'];

$tfIdno = $_POST['tfIdno'];
$oneTf = $_POST['oneTf'];
$twoTf = $_POST['twoTf'];
$threeTf = $_POST['threeTf'];
$fourTf = $_POST['fourTf'];

$updateFinalScores = "UPDATE team_finals SET one_score='$oneTf', two_score='$twoTf', three_score='$threeTf',
four_score='$fourTf' WHERE tf_idno='$tfIdno'";

$updateQueryScores = mysqli_query($conn, $updateFinalScores);



} // END OF btnSubmitFs

$eventId;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Final Score</title>
</head>
<body>


<script type="text/javascript">
  const eventId = "<?php echo $eventId; ?>";


  setTimeout(function() {
    window.location.href = `tourna_final_round_ses_state.php?eventId=${eventId}`;
  }, 800);
</script>
</body>
</html>