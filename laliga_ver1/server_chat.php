<?php 
require "configs/db.php";
	
	if(isset($_POST['currentMe']) OR isset($_POST['otherMe'])) {

		$currentMe = $_POST['currentMe'];
		$otherMe = $_POST['otherMe'];

		$sqlChat = "INSERT INTO chat_routes (me, other) VALUES('$currentMe', 'otherMe')"; 

		if ($conn->query($sqlChat) === TRUE) {
  			echo "New record connection successfully added";
		} else {
  			echo "Error: " . $sql . "<br>" . $conn->error;
		}


	} // end of isset check 



	

 ?>