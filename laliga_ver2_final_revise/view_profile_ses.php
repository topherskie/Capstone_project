<?php require 'inc/header_ses.php'; ?>

<?php 
$userIdno;
$userType;
 $userName;
$userEmail;
$userFirstname;
$userLastname;
$userAddress;
$userDob;




if(isset($_GET['protId'])) {
$protId = $_GET['protId'];


// query currentuserinfo
$sqlUserProfile = "SELECT * FROM users WHERE user_id='$protId'";
$sqlQueryProfile = mysqli_query($conn, $sqlUserProfile);
$resultProfile = mysqli_fetch_assoc($sqlQueryProfile);

} // END OF PORTiD



 ?>



<style type="text/css">

	.profile-main-container {
		display: flex;
		box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
		width: 50%;
		margin: auto;
		padding: 12px;
	}

	.pro-child-one {
		text-align: center;
		box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
		padding: 12px;
	}

	.pro-child-two {

		box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
		padding: 12px;
		margin-left: 22px;
	}

	.img-cir {
		text-align: center;
		width: 100px;

		border-radius: 50%;
	}

	.card-container {
	text-align: center;

	}

	.dif-container {
		background: green;
		color: whitesmoke;
		font-weight: bold;
	}


@media only screen and (max-width: 500px) {
  .profile-main-container {
    display: block;
    margin: auto;
    width: 100%;

  }
}

</style>

<br>
<br>

<div class="profile-main-container animate__animated animate__backInDown">

<div class="card card-container" style="width: 18rem;">

  <div class="card-body">
  	<div class="dif-container"><div><?php echo $resultProfile['user_type']; ?></div></div>
  	

  	<br>

  		<object class="img-cir" data="<?php echo "img_profiles/".$resultProfile['user_pp']; ?>">
        <img src="img_profiles/default_pp.jpg" class="img-cir" alt="profile pp">
         </object>
         <h5 class="card-title">Profile</h5>

  </div>

	</div>


	<div class="pro-child-two">
    <p class="card-text">Name: <?php echo $resultProfile['user_firstname'] . ' ' . $resultProfile['user_lastname']; ?></p>
	<p class="card-text">Email: <?php echo $resultProfile['user_email']; ?> </p>
	<p class="card-text">Age: <?php

              $today = date("Y-m-d");
  $diff = date_diff(date_create($resultProfile['user_dob']), date_create($today));
  echo $diff->format('%y');
	 ?> </p>
	<p class="card-text">Gender: <?php echo $resultProfile['user_gender']; ?> </p>
  <p class="card-text">Height: <?php echo $resultProfile['user_height']. ' ' . 'cm'; ?> </p>
  <p class="card-text">Weight: <?php echo $resultProfile['user_weight']. ' ' . 'Kg'; ?> </p>
	<p class="card-text">Date of birth: <?php echo $resultProfile['user_dob']; ?> </p>
	<p class="card-text">Phone no: <?php echo $resultProfile['user_phone']; ?> </p>
	<p class="card-text">Barangay: <?php echo $resultProfile['user_brgy']; ?> </p>
	<p class="card-text">Address: <?php echo $resultProfile['user_address']; ?> </p>
	</div>

</div>







<?php require 'inc/footer.php'; ?>