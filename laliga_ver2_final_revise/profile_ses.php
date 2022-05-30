<?php require 'inc/header_ses.php'; ?>
<?php

//error_reporting(0);
$brgy = "SELECT * FROM brgy";
$brgyQuery = mysqli_query($conn, $brgy);
 $userIdno;

$userIdno;
$userType;
 $userName;
$userEmail;
$userFirstname;
$userLastname;


// query currentuserinfo
$sqlUserProfile = "SELECT * FROM users WHERE user_id='$userIdno'";
$sqlQueryProfile = mysqli_query($conn, $sqlUserProfile);
$resultProfile = mysqli_fetch_assoc($sqlQueryProfile);

 $resultProfile['user_address'];
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
	.dis {
		text-align: center;
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

<div class="container">
		<!-- profile image -->
		<div class="card mb-3 p-1" style="max-width: 900px;">
			<div class="row g-5">
				<div class="col-md-6 dis">
				<object class="img-fluid rounded-start" data="<?php echo "img_profiles/".$resultProfile['user_pp']; ?>">
					<img src="img_profiles/default_pp.jpg" class="img-fluid rounded-center" alt="profile pp">
				</object>
				<form action="profile_ses_server.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="txtIdno" value="<?php echo $userIdno; ?>">
					<div class="input-group mb-3">
						<input type="file" name="updateProfiles" class="form-control" required>
						<input type="submit" name="btnUpdateImg" value="Upload" class="btn btn-primary">
					</div>
				</form>
			</div>

			<!-- profile information -->
			<div class="col-md-6">
				<div class="card-body">
					<h3 class="card-title text-primary pb-4"><?php echo $resultProfile['user_type'] . " Profile"; ?></h3>

					<p class="card-text text-secondary"><span class="fw-bold">Name:</span>
						<?php echo $resultProfile['user_firstname'] . ' ' . $resultProfile['user_lastname']; ?>
					</p>
					<p class="card-text text-secondary"><span class="fw-bold">Email:</span> <?php echo $resultProfile['user_email']; ?> </p>
					<p class="card-text text-secondary"><span class="fw-bold">Age:</span>
						<?php

							 $today = date("Y-m-d");
 							 $diff = date_diff(date_create($resultProfile['user_dob']), date_create($today));
  							echo $diff->format('%y');


						?>
					</p>
					<p class="card-text text-secondary"><span class="fw-bold">Gender:</span> <?php echo $resultProfile['user_gender']; ?> </p>
					<p class="card-text text-secondary"><span class="fw-bold">Height:</span> <?php echo $resultProfile['user_height']. ' ' . 'cm'; ?> </p>
					<p class="card-text text-secondary"><span class="fw-bold">Weight:</span> <?php echo $resultProfile['user_weight']. ' ' . 'Kg'; ?> </p>
					<p class="card-text text-secondary"><span class="fw-bold">Date of birth:</span> <?php echo $resultProfile['user_dob']; ?> </p>
					<p class="card-text text-secondary"><span class="fw-bold">Phone no:</span> <?php echo $resultProfile['user_phone']; ?> </p>
					<p class="card-text text-secondary"><span class="fw-bold">Barangay:</span> <?php echo $resultProfile['user_brgy']; ?> </p>
					<p class="card-text text-secondary"><span class="fw-bold">Address:</span> <?php echo $resultProfile['user_address']; ?> </p>
						<p  class="card-text  btn btn-outline-success"><?php echo $resultProfile['hired_status']; ?></p>
				</div>

				<!-- BUTTON container -->
				<div class="py-3 ms-3">
					<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
						EDIT PROFILE
					</button>
				</div>
				</div>
			</div>
		</div>
	</div>

</div>











<!-- Modal to update profile -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      	<form action="profile_ses_server.php" method="GET">
      		<label>Firstname:</label>
      		<input type="text" value="<?php echo $resultProfile['user_firstname']; ?>" name="txtFname" class="form-control">
      		<br>
      		<label>Middle Initial:</label>
      		<input type="text" name="txtMi" value="<?php echo $resultProfile['user_mi']; ?>" class="form-control">
      		<br>
      		<label>Lastname:</label>
      		<input type="text" name="txtLname" value="<?php echo $resultProfile['user_lastname']; ?>" class="form-control">
      		<br>
      		<label>Date of Birth:</label>
      		<input type="date" name="txtDob" value="<?php echo $resultProfile['user_dob']; ?>" class="form-control">
      		<br>
      		<label>Email:</label>
      		<input type="email" name="txtEmail" value="<?php echo $resultProfile['user_email']; ?>" class="form-control">
      		<br>
      		<label>Phone no:</label>
      		<input type="number" name="txtNum" value="<?php echo $resultProfile['user_phone']; ?>" class="form-control">
      		<br>
      		<label>Gender:</label>
      		<select name="txtGender" class="form-control">
      			<option value="Male">Male</option>
      			<option value="Female">Female</option>
      		</select>
          <br>
          	<label>Height:</label>
          	<input type="number" step=".01" name="txtCm" value="<?php echo $resultProfile['user_height']; ?>" class="form-control">
      		<br>
          	<label>Weight:</label>
          	<input type="number" step=".01" name="txtKg" value="<?php echo $resultProfile['user_weight']; ?>" class="form-control">
      		<br>
      		<label>Barangay:</label>
					<select name="txtBrgy" class="form-control">
						<?php while($rowBrgy = $brgyQuery->fetch_assoc()): ?>
						<option value="<?php echo $rowBrgy['brg_name']; ?>"><?php echo $rowBrgy['brg_name']; ?></option>
						<?php endwhile; ?>
					</select>
					<br>
      		<label>Address</label>
      		<input type="text" name="txtAddress" value="<?php echo $resultProfile['user_address']; ?>" class="form-control">

      		<br>

      		<input type="hidden" name="txtIdno" value="<?php echo $userIdno; ?>">
      		<input type="submit" name="btnUpdateProfile" value="Save" class="btn btn-outline-primary">
      	</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>



<?php require 'inc/footer.php'; ?>
