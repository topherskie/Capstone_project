<?php include 'inc/header_login_state.php'; ?>
<?php 
 echo  $sesIdno . "<BR>";
  echo $sesUser . "<BR>";;
  echo  $sesUserType . "<BR>";
  echo $sesFname;
  echo $sesLname;



  $sqlPromo ="SELECT * FROM promote_tournament";
 $resultPromo = $conn->query($sqlPromo);




 // send Invites update basketball_teams attach tournament name
 if(isset($_POST['btnSendInvites'])) {
  $txtEventName = $_POST['txtEventName'];
  $txtSesIdno = $_POST['txtSesIdno'];

  $sqlUpdateBskTeam = "UPDATE basketball_teams SET event_name='$txtEventName' WHERE recruits_idno='$txtSesIdno'";

if ($conn->query($sqlUpdateBskTeam) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}


 } // END OF UPDATE INVITES

?>



 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>View Tournaments</title>
  <style type="text/css">
    .gr {
      color: #91C483;

    }

    .checkg {
      background: #74959A;
      color: whitesmoke;
      padding: 8px;
      border-radius: 4em;
    }

  </style>
 </head>
 <body>

<div class="card-columns">
  
   <?php while($viewPromo = $resultPromo->fetch_assoc()): ?>

   <?php if($viewPromo['user_idno'] == $sesIdno && $viewPromo['promo_status'] == ''): ?>	
  <div class="card bg-light">
    <div class="card-body text-center">
      <div class="card">
  		<div class="card-header">Tournament: <?php echo $viewPromo['event_name']; ?></div>
  		<div class="card-body">
  		<img src="<?php  echo "event_img/".$viewPromo['event_imgbanner']; ?>" alt="profile" class="img-thumbnail">
  		<h5 class="card-title">Event Starts: <?php  echo $viewPromo['event_start']; ?></h5>


  	</div>
      <?php //$_SESSION['event_idno'] = $viewPromo['event_idno']; ?>
 	    <div class="card-footer"><p><?php echo $viewPromo['event_gametype']; ?></p></div>
        <h5 class="gr">Game still in progress.</h5>
       <div><a href="<?php echo "view_bracket_ses_state.php?eventId=".$viewPromo['event_idno']; ?>">Tournament Status</a></div>
	</div>
    </div>
  </div>

<?php elseif($viewPromo['user_idno'] != $sesIdno && $viewPromo['promo_status'] == ''): ?>
   <?php //$_SESSION['event_idno'] = $viewPromo['event_idno']; ?>
<div class="card bg-light">
    <div class="card-body text-center">
      <div class="card">
  		<div class="card-header">Tournament: <?php echo $viewPromo['event_name']; ?></div>
  		<div class="card-body">
  		<img src="<?php  echo "event_img/".$viewPromo['event_imgbanner']; ?>" alt="profile" class="img-thumbnail">
  		<h5 class="card-title">Event Starts: <?php  echo $viewPromo['event_start']; ?></h5>

  		<div>
  		 <form method="POST" action="">
  	     <input type="hidden" name="txtEventName" value="<?php echo $viewPromo['event_name']; ?>">
         <input type="hidden" name="txtSesIdno" value="<?php echo $sesIdno; ?>">
  			<input type="submit" name="btnSendInvites" value="Send invites" class="btn btn-outline-primary">
  		 </form>
        <div><a href="<?php echo "view_bracket_ses_state.php?eventId=".$viewPromo['event_idno']; ?>">Tournament Status</a></div>
  		</div>
  	</div>
     <h5 class="gr">Game still in progress.</h5>
 	    <div class="card-footer"><p><?php echo $viewPromo['event_gametype']; ?></p></div>
	</div>
    </div>
  </div>
<?php elseif($viewPromo['promo_status'] == "Finished"): ?>
<div class="card bg-light">
    <div class="card-body text-center">
      <div class="card">
      <div class="card-header">Tournament: <?php echo $viewPromo['event_name']; ?></div>
      <div class="card-body">
      <img src="<?php  echo "event_img/".$viewPromo['event_imgbanner']; ?>" alt="profile" class="img-thumbnail">
      <h5 class="card-title">Event Starts: <?php  echo $viewPromo['event_start']; ?></h5>

      <div>
       <form method="POST" action="">
         <input type="hidden" name="txtEventName" value="<?php echo $viewPromo['event_name']; ?>">
         <input type="hidden" name="txtSesIdno" value="<?php echo $sesIdno; ?>">
        <input type="submit" name="btnSendInvites" value="Send invites" class="btn btn-outline-primary">
       </form>
        <div><a href="<?php echo "view_bracket_ses_state.php?eventId=".$viewPromo['event_idno']; ?>">Tournament Status</a></div>
      </div>
    </div>
      <h5 class="gr">Game has ended.<span class="span-verfied checkg">&#10003;</span></h5>
      <div class="card-footer"><p><?php echo $viewPromo['event_gametype']; ?></p></div>
  </div>
    </div>
  </div>

 <?php endif; ?>


 <?php endwhile; ?>



  
</div> <!-- end of card-columns -->
 
 </body>
 </html>

  <?php include 'inc/footer.php'; ?>