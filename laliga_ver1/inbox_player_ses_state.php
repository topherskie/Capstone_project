<?php include 'inc/header_login_state.php'; ?>

<?php 

echo  $sesIdno . "<BR>";
  echo $sesUser . "<BR>";
  echo  $sesUserType . "<BR>";



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Chat</title>
	<style type="text/css">
		.player-des-container {
			box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
			width: 50%;
			margin: auto;
			padding: 20px;
		}

		.name-info {
			color: #525E75;
		}
	</style>
</head>
<body>


<div class="checkCourtPlayer">
	<?php 

 $sqlRenderInboxs = "SELECT * FROM chat_routes_players WHERE me='$sesIdno' OR other='$sesIdno'";
 $resultChats = mysqli_query($conn, $sqlRenderInboxs) or die( mysqli_error($conn));
 // $dataChat = mysqli_fetch_assoc($resultChat);



while($dataChats = $resultChats->fetch_array()) {
	echo $dataChats['me'];
	echo $dataChats['other'];
	echo "<div class='player-des-container'>";

	echo "<h5 class='name-info'>" . "Player: " . $dataChats['otherp_name'] . "</h5>";
	echo "<form method='POST' action='inbox_reply_player_ses_state.php'>";
	
	echo "<input type='hidden' name='dataChatOthers' value='{$dataChats['me']}'>";
	echo "<input type='hidden' name='dataChatMe' value='{$dataChats['other']}'>";
	echo "<input type='submit' name='btnPlayerChatReply' value='Reply' class='btn btn-outline-primary'>";	
	echo "</form>";


	echo "</div>";


} // END OF LOOP


 ?>
</div>




<script type="text/javascript">
	

</script>
</body>
</html>
