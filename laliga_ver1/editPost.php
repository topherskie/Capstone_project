<?php include 'inc/header_login_state.php'; ?>
<?php
 // require "configs/db.php";







 if(isset($_POST['btnEditPost'])) {
 	$currentPostIdno = $_POST['currentPostIdno'];

 	$sqlFetchPost = "SELECT * FROM casual_matches WHERE cm_idno='$currentPostIdno'";
 	$dataPost = mysqli_query($conn, $sqlFetchPost);
 	$resultPostData = mysqli_fetch_assoc($dataPost);


 	


 } // end of main if else


 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update Post</title>
	<style>
		.main-container {
			box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
			width: 50%;
			margin: auto;
		}
	</style>
</head>
<body>

<div class="main-container">
	<form method="POST" action="findMatch_ses_state_server.php" class="form-control">
  <div class="form-group">
    <input type="text" class="form-control"  name="cmDesc" placeholder="Enter match short descriptions"  value="<?php echo $resultPostData['cm_desc']; ?>">
  </div>

 <div class="form-group">
    <select class="form-control" name="cmCity" value="<?php echo $resultPostData['cm_location']; ?>">
      <option>Cebu City</option>
      <option>Naga City</option>
      <option>Mandaue City</option>
      <option>Bogo City</option>
      <option>LapuLapu City</option>
    </select>
  </div>

   <div class="form-group">
    <label>Date:</label>
    <input type="date" class="form-control" name="cmDate" value="<?php echo $resultPostData['cm_date_game']; ?>">
  </div>

   <div class="form-group">
    <label>Start Time:</label>
    <input type="time" class="form-control" name="cmStartTime" value="<?php echo $resultPostData['cm_start_time']; ?>">
  </div>

   <div class="form-group">
    <label>End Time:</label>
    <input type="time" class="form-control" name="cmEndTime" value="<?php echo $resultPostData['cm_end_time']; ?>">
  </div>
  
  <!-- session ID -->
  <input type="hidden" name="cmCurrentIdno" value="<?php echo $resultPostData['cm_idno']; ?>">

  <input type="submit" class="btn btn-primary"  name="btnUpdateSave" value="Save Changes">
  </form>
</div>

</body>
</html>