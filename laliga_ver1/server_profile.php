<?php
include 'configs/db.php';

// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "laliga_pilipinas";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $database);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
//   // echo "Connected successfully";
// 	$image = '';
// 	$resultImg = '';
//  $result = mysqli_query($conn, "SELECT * FROM user WHERE user_idno = '$sesIdno'");
//   $data = mysqli_fetch_assoc($result);

// //echo $data['user_idno'];
// $image = $data['img_profile'];
// $hlMoments = $data['hl_moments'];
// $resultImg = "img_profiles/".$image;
// $resultMoments = "hl_moments/".$hlMoments;






// UPDATE PROFILE

if(isset($_POST['updateSubmit'])) {
		$sesIdno = $_POST['sesIdno'];
		$updateFname = $_POST['updateFnames'];
		$updateMi =  $_POST['updateMis'];
		$updateLname = $_POST['updateLnames'];
		$updateDob = $_POST['updateDobs'];
		$updateEmail = $_POST['updateEmails'];
		$updateAddress = $_POST['updateAddresss'];
		$updateGender = $_POST['updateGenders'];
		$updateContactNo = $_POST['updateContactNos'];
    $updateHeight = $_POST['updateHeight'];
    $playerPos = $_POST['playerPos'];

		$sesIdno = $_POST['sesIdno'];
		$filename = $_FILES["updateProfiles"]["name"];
 	  $tempname = $_FILES["updateProfiles"]["tmp_name"];  
  	$folder = "img_profiles/".$filename;  


	// check first if empty or not for image
	if(empty($filename)) {
		// query update
	$sqlUpdate = "UPDATE user SET user_fname='$updateFname', user_mname='$updateMi', user_lname='$updateLname', user_dob='$updateDob',
	user_email='$updateEmail', user_address='$updateAddress', user_gender='$updateGender', user_contact_no='$updateContactNo', user_height='$updateHeight', player_pos='$playerPos' WHERE user_idno = $sesIdno";

//	echo gettype($updateContactNo);

	if (mysqli_query($conn, $sqlUpdate) === TRUE) {
 // echo "Record updated successfully";
	//header('Location: profile_ses_state.php');
} else {
  echo "Error updating record: " . $conn->error;
}



	} elseif(!empty($filename)) {
		// query update
	$sqlUpdate = "UPDATE user SET user_fname='$updateFname', user_mname='$updateMi', user_lname='$updateLname', user_dob='$updateDob',
	user_email='$updateEmail', user_address='$updateAddress', user_gender='$updateGender', user_contact_no='$updateContactNo', img_profile='$filename' WHERE user_idno = $sesIdno";

//	echo gettype($updateContactNo);

	
		if (mysqli_query($conn, $sqlUpdate) === TRUE) {
  		//echo "Record updated successfully";
			// header('Location: profile_ses_state.php');
		} else {
  		echo "Error updating record: " . $conn->error;
		}
} // end pf FILENAME IF ELSE



	
// Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }


} // end of main if for update profile






if(isset($_POST['highlightsSubmit'])) {
	$sesIdno = $_POST['sesIdno'];
	$filenames = $_FILES["hlMoments"]["name"];
 	$tempname = $_FILES["hlMoments"]["tmp_name"];  
  $folder = "hl_moments/".$filenames;  

  if(empty($filenames)) {
  	//echo "Cannot upload without data";
  } elseif(!empty($filenames)) {

  	$sqlInsertVid = "UPDATE user SET hl_moments='$filenames' WHERE user_idno='$sesIdno'";

  	if (mysqli_query($conn, $sqlInsertVid) === TRUE) {
  		//echo "Moments Added";
			//header('Location: profile_ses_state.php');
		} else {
  		echo "Error updating record: " . $conn->error;
		}



  // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }

  } // end of elseif


} // END OF HS if





 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Server Profile</title>
	<style type="text/css">
		@import url("https://fonts.googleapis.com/css2?family=Fredoka&family=Nunito:wght@200&display=swap");
body {
  background-color: #2C3333;
  display: flex;
  align-content: center;
  justify-content: center;
  font-family: "Fredoka", sans-serif;
  color: white;
}
.loader {
  border: 5px solid transparent;
  border-radius: 50%;
  border-top: 5px solid aqua;
  width: 300px;
  height: 300px;
  animation: spin 2s linear infinite;
  position: relative;
}
.text {
  animation: glow 4s alternate infinite;

  text-transform: capitalize;
  font-size: 2em;
  letter-spacing: 2px;
  margin-top: 20px;
  color: aqua;
  display: block;
  position: absolute;
  bottom: 200px;
}
.loader::before {
  position: absolute;
  content: "";
  height: 10px;
  width: 10px;
  top: 38px;
  left: 255px;
  background-color: aqua;
  border-radius: 50%;
  animation: glow 4s alternate infinite;
}

@keyframes glow {
  0%,
  100% {
    filter: drop-shadow(0 0 0px aqua) drop-shadow(0 0 0px aqua);
  }
  50% {
    filter: drop-shadow(0 0 20px aqua) drop-shadow(0 0 60px aqua);
  }
}
@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

	</style>
</head>
<body>
	<br>
 <h2 class="text">Processing...</h2>
<div class="loader"></div>








<script type="text/javascript">
  
  setTimeout(function() {
    window.location.href = 'profile_ses_state.php';
  }, 2500);
</script>
</body>
</html>