<div class="container">
		<!-- profile image -->
		<div class="card mb-3 p-1" style="max-width: 900px;">
			<div class="row g-5">
				<div class="col-md-6">
				<object class="img-fluid rounded-start" data="<?php echo "img_profiles/".$resultProfile['user_pp']; ?>">
					<img src="img_profiles/default_pp.jpg" class="img-fluid rounded-start" alt="profile pp">
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