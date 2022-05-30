<?php require 'inc/header_ses.php'; ?>

<?php

$userIdno;
$userType;

 ?>


 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Chat</title>
	<style type="text/css">
		.main-court-chat-container {
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
<br>
<div class="checkCourtOwner">	
<?php 

 $sqlRenderInbox = "SELECT * FROM chat_routes WHERE other='$userIdno'";
 $resultChat = mysqli_query($conn, $sqlRenderInbox) or die( mysqli_error($conn));
 //$dataChat = mysqli_fetch_assoc($resultChat);



while($dataChat = $resultChat->fetch_array()) {
	 $dataChat['me'];
	 $dataChat['other'];
	 echo "<br>";
	echo "<div class='main-court-chat-container animate__animated animate__backInDown'>";

	echo "<h5 class='name-info'>" . "Scout: " .  $dataChat['me_name'] . "</h5>";
	echo "<form method='POST' action='inbox_reply_ses.php'>";
	echo "<input type='hidden' name='dataChatOthers' value='{$dataChat['other']}'>";
	echo "<input type='hidden' name='dataChatMe' value='{$dataChat['me']}'>";
	echo "<input type='submit' name='btnChatReply' value='Reply' class='btn btn-outline-primary'>";	
	echo "</form>";


	echo "</div>";


} // END OF LOOP


 ?>
 

</div>
<br>


<div class="checkCourtPlayer">
	<?php 

 $sqlRenderInboxs = "SELECT * FROM chat_routes WHERE me='$userIdno'";
 $resultChats = mysqli_query($conn, $sqlRenderInboxs) or die( mysqli_error($conn));
 // $dataChat = mysqli_fetch_assoc($resultChat);

// add traps tomorrow if else
//inbox_reply_player_ses_state.php
while($dataChats = $resultChats->fetch_array()) {
	 $dataChats['me'];
	 $dataChats['other'];
	  echo "<br>";
	echo "<div class='main-court-chat-container animate__animated animate__backInDown'>";
	
	echo "<h5 class='name-info'>" . "Player: " .  $dataChats['other_name'] . "</h5>";
	echo "<form method='POST' action='inbox_reply_player_ses.php'>";
	
	echo "<input type='hidden' name='dataChatOthers' value='{$dataChats['me']}'>";
	echo "<input type='hidden' name='dataChatMe' value='{$dataChats['other']}'>";
	echo "<input type='submit' name='btnPlayerChatReply' value='Reply' class='btn btn-outline-primary'>";	
	echo "</form>";


	echo "</div>";


} // END OF LOOP


 ?>
</div>




<script type="text/javascript">
	
	 const userCheck = '<?php echo $userType; ?>';
	 const checkCourtOwner = document.querySelector('.checkCourtOwner');	
	 const checkCourtPlayer = document.querySelector('.checkCourtPlayer');

	 if(userCheck == 'Player') {
	 	checkCourtOwner.style.display = 'block';
	 	checkCourtPlayer.style.display = 'none';	
	 } else if(userCheck == 'Scout') {

	 	checkCourtOwner.style.display = 'none';
	 	checkCourtPlayer.style.display = 'block';
	 }


</script>
 <?php // require 'inc/footer.php'; ?>