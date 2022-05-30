<?php include 'inc/header_login_state.php'; ?>
<?php 	
echo  $sesIdno . "<BR>";
  echo $sesUser . "<BR>";;
  echo  $sesUserType . "<BR>";
  echo $sesFname;
  echo $sesLname;

 
  // remove teams 
if(isset($_POST['btnRemove'])) {
$txtTeamIdno = $_POST['txtTeamIdno'];
$sqlDelTeams = "DELETE FROM teams WHERE event_idno='$txtTeamIdno'";
$sqlResultDelTeams = mysqli_query($conn, $sqlDelTeams);

if($sqlResultDelTeams == TRUE) {
  echo "Success!";
}

}// END OF BTN REMOVE

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Success</title>
</head>
<body>
	<h1>Rcord successfully updated!</h1>

https://fixer.io/signup/free

<script type="text/javascript">
	

	setTimeout(function() {
		window.location.href= "tournament_ses_state.php";
	}, 1000)
</script>
</body>
</html>