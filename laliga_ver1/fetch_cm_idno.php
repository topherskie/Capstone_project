<?php 
// ONLY USE FOR COMPARING THE SESSION USER TO FOREIGNKEY OF CASUAL MATCHES TO POP BTN CORRECTLY AND CHAT SYS
$sesIdno;

	$resultCmIdno = mysqli_query($conn, "SELECT user_idno FROM casual_matches WHERE user_idno = '$sesIdno'");
 	 $dataCmIdno = mysqli_fetch_assoc($resultCmIdno);

 	 $dataResultCmIdnos = " ";
 	 if(isset($dataCmIdno['user_idno'])) {
 	 	$dataResultCmIdnos = $dataCmIdno['user_idno'];
 	 }

	

 ?>