<?php include 'inc/header_login_state.php'; ?>
<?php
echo  $sesIdno . "<BR>";
 echo $sesUser . "<BR>";;
 echo  $sesUserType . "<BR>";
 echo $sesFname;
 echo $sesLname;


if(isset($_POST['teamName1']) OR isset($_POST['teamScore2']) OR
isset($_POST['teamName3']) OR isset($_POST['teamScore4']) OR isset($_POST['teamScore4']) OR
isset($_POST['teamStatus']) OR isset($_POST['userIdno']) OR isset($_POST['eventIdno'])) {

$teamName1 = $_POST['teamName1'];
$teamScore2 = $_POST['teamScore2'];
$teamName3 = $_POST['teamName3'];
$teamScore4 = $_POST['teamScore4'];
$teamStatus = $_POST['teamStatus'];
$userIdno = $_POST['userIdno'];
$eventIdno = $_POST['eventIdno'];

$sqlFinalsData = "INSERT INTO team_finalist (team_name, team_semi_score, team_status, event_idno, user_idno)
 VALUES ('$teamName1', '$teamScore2','$teamStatus', '$eventIdno', '$userIdno'),
        ('$teamName3', '$teamScore4','$teamStatus', '$eventIdno', '$userIdno')";

if ($conn->query($sqlFinalsData) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sqlFinalsData . "<br>" . $conn->error;
}

$conn->close();


} // end of main if else





 ?>
