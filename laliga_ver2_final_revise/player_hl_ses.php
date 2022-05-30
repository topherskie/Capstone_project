<?php require 'inc/header_ses.php'; ?>

<?php 
$userIdno;

// retrieve highlights
$sqlRetrieveHl = "SELECT * FROM user_hl WHERE user_id='$userIdno'";
$queryHl = mysqli_query($conn, $sqlRetrieveHl);


 ?>



<style type="text/css">
	.hl-main-container {
		width:  50%;
		margin:  auto;
		text-align: center;
	}	

	.show-hl-main-container {
		text-align: center;
		display: flex;
		 justify-content: center; 
		 box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
		 padding: 9px;
		  flex-wrap: wrap;
		  width: 70%;
		  margin: auto;
	}	

	.inner-hl-container {
		margin: 9px;
	}

	.hl-text {
		font-weight: bold;
		color: #143F6B;
	}

@media only screen and (max-width: 700px) {
 .hl-main-container {
    width:  100%;
    margin:  auto;

  }

.show-hl-main-container {
		display: block;
		width: 100%;
		 margin: auto;
	}	

} 


</style>


<br>	
<div class="hl-main-container form-control animate__animated animate__backInLeft">
	<div>
		<p class="card-text hl-text">Upload play highlights to increase skill presence.</p>
		<form method="POST" action="playerHl_ses_server.php" class="form-control" enctype="multipart/form-data">
			<label>Highlight name: </label>
			<input type="hidden" name="sesIdno" value="<?php echo $userIdno; ?>">
			 <input type="text" name="txtHlTitle" class="form-control" placeholder="enter highlights title" required>
			 <br>
			<input type="file" name="playHl" class="form-control" required>
			<br>
			<input type="submit" name="btnHl" class="btn btn-outline-primary" value="Save">
		</form>
	</div>
	<div>
	</div>
</div>

<br>


<div class="show-hl-main-container animate__animated animate__backInUp">

<?php while($rowHl = $queryHl->fetch_assoc()): ?>
 <div class="inner-hl-container">
	 <div class="card" style="width: 22rem;">
      <div class="card-body">
       <h5 class="card-title"><?php echo $rowHl['hl_title']; ?></h5>
       <video width="280" height="340" controls>
         <source src="<?php echo "hl_moments/".$rowHl['hl_vid']; ?>" type="video/mp4">
        </video>
      <form action="playerHl_ses_server.php" method="POST">
      	<input type="hidden" name="hlIdno" value="<?php echo $rowHl['hl_id']; ?>" class="">
      	<input type="submit" name="btnDelHl" value="X" class="btn btn-outline-danger">
      </form>
     </div>
	</div>
 </div>
<?php endwhile; ?>


</div>





<?php require 'inc/footer.php'; ?>