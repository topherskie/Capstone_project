<?php require 'inc/header_ses.php'; ?>
<?php 
error_reporting(0);
$userIdno;
$userType;
 $userName;
$userEmail;
$userFirstname;
$userLastname;
$userAddress;
$userDob;


$queryHl = "";
if(isset($_GET['highLightsId'])) {
$highLightsId = $_GET['highLightsId'];

// retrieve highlights
$sqlRetrieveHl = "SELECT * FROM user_hl WHERE user_id='$highLightsId'";
$queryHl = mysqli_query($conn, $sqlRetrieveHl);



} // END OOF highLightsId

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

	.main-container-hl {
		text-align: center;
		color: #0AA1DD;
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

<div class="main-container-hl">	
	<div><h4>Player Highlights.</h4></div>
</div>
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
      	<input type="hidden" name="btnDelHl" value="X" class="btn btn-outline-danger">
      </form>
     </div>
	</div>
 </div>
<?php endwhile; ?>


</div>





<?php require 'inc/footer.php'; ?>