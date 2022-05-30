<?php 




// delete record 

if(isset($_POST['btnDeleteStats'])) {
$txtStatIdno = $_POST['txtStatIdno'];

$sqlDelStats = "DELETE FROM player_stats WHERE stat_idno='$txtStatIdno'";


if ($conn->query($sqlDelStats) === TRUE) {
  
  echo "
 		<script>
 		alert('Record Deleted.');
 		</script>
  "; 

} else {
  echo "Error deleting record: " . $conn->error;
}

} // END OF DELETE


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title></title>
 </head>
 <body>
 



 <script type="text/javascript">
  
  // setTimeout(function() {
  //   window.location.href = 'player_byTeam_stat.php';
  // }, 500);
</script>
 </body>
 </html>