<?php require_once 'inc/header_login_state.php'; ?>
<?php
   echo $sesIdno . "<BR>";
 //  echo $sesUser . "<BR>";;
 //  echo  $sesUserType . "<BR>";
 //  echo $sesFname;
 //  echo $sesLname;




  $allowed_ext = array('pdf', 'text', 'txt', 'docs', 'docx', 'jpeg', 'png', 'jpg');

 if(isset($_POST['btnUploadDocs'])) {

 	$docStatus = "pending";
 	$playerFullName = $sesFname . ' ' . $sesLname;
 	$fileDocType = $_POST['fileDocType'];

 	$file_name = '';
   // Check if file was uploaded
   if(!empty($_FILES['upload']['name'])) {
    $file_name = $_FILES['upload']['name'];
    $file_size = $_FILES['upload']['size'];
    $file_tmp = $_FILES['upload']['tmp_name'];
    $target_dir = "docs_file/${file_name}";
    // Get file extension
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    // echo $file_ext;

    $sqlInsertDocs = "INSERT INTO docs_organizer (user_idno, player_name, doc_type, doc_file_name, doc_status) VALUES('$sesIdno', '$playerFullName', '$fileDocType', '$file_name', '$docStatus')";




    // Validate file type/extension
    if(in_array($file_ext, $allowed_ext)) {
      // Validate file size
      if($file_size <= 5500000) { // 1000000 bytes = 1MB
        // Upload file
        move_uploaded_file($file_tmp, $target_dir);

        // Success message
        echo '<p style="color: green;">File uploaded!</p>';

            if ($conn->query($sqlInsertDocs) === TRUE) {
  				echo "New record created successfully";
			} else {
  				echo "Error: " . $sqlInsertDocs . "<br>" . $conn->error;
			}

      } else {
        echo '<p style="color: red;">File too large!</p>';
      }
    } else {
      $message = '<p style="color: red;">Invalid file type!</p>';
    }
   } else {
     $message = '<p style="color: red;">Please choose a file</p>';
   }
 } // END OF MAIN IF ELSE




 // GET THE DOCS REQUEST
 $rowDocs = '';
 $dataTrackStatus = '';
 $sqlCheckDocs = "SELECT * FROM docs_organizer WHERE user_idno='$sesIdno'";
 $resultCheckDocs = $conn->query($sqlCheckDocs);
if ($resultCheckDocs->num_rows > 0) {
   // output data of each row
  $rowDocs = $resultCheckDocs->fetch_assoc();
  $rowDocs['player_name'];
   $rowDocs['doc_type'];
   $rowDocs['doc_status'];

   if($rowDocs['doc_status'] == 'pending') {
      $dataTrackStatus = 'hidePending';
       echo "<div class='pa'><h4>Thank you for submitting your valid ID,</h4></div>";
      echo "<div class='pa'><h4>Pending for approval</h4></div>";

   }


} else {
  echo "0 results";
}


  // EDIT POST TOURNAMENT









//

  $allowed_extEvent = array('jpeg', 'png', 'jpg');

if(isset($_POST['btnEventSave'])) {


  $playEventName = $_POST['playEventName'];
  $playAbout = $_POST['playAbout'];
  $playTeams = $_POST['playTeams'];
  $playStartTime = $_POST['playStartTime'];
  $playType = $_POST['playType'];

  $file_nameEvent = '';
   // Check if file was uploaded
   if(!empty($_FILES['uploads']['name'])) {
    $file_nameEvent = $_FILES['uploads']['name'];
    $file_size = $_FILES['uploads']['size'];
    $file_tmp = $_FILES['uploads']['tmp_name'];
    $target_dir = "event_img/${file_nameEvent}";
    // Get file extension
    $file_ext = explode('.', $file_nameEvent);
    $file_ext = strtolower(end($file_ext));
     echo $file_ext;

    $sqlInsertEvent = "INSERT INTO promote_tournament (user_idno, event_name, event_about, event_maxteam, event_start, event_gametype, event_imgbanner) VALUES('$sesIdno', '$playEventName', '$playAbout', '$playTeams', '$playStartTime', '$playType', '$file_nameEvent')";




    // Validate file type/extension
    if(in_array($file_ext, $allowed_extEvent)) {
      // Validate file size
      if($file_size <= 1000000) { // 1000000 bytes = 1MB
        // Upload file
        move_uploaded_file($file_tmp, $target_dir);

        // Success message
        echo '<p style="color: green;">File uploaded!</p>';
           if ($conn->query($sqlInsertEvent) === TRUE) {
          echo "New record created successfully";
      } else {
          echo "Error: " . $sqlInsertEvent . "<br>" . $conn->error;
      }


      } else {
        echo '<p style="color: red;">File too large!</p>';
      }
    } else {
      $message = '<p style="color: red;">Invalid file type!</p>';
    }
   } else {
     $message = '<p style="color: red;">Please choose a file</p>';
   }
 } // END OF MAIN IF ELSE













// update info
 if(isset($_POST['btnUpdate'])) {
$eventPromoIdno = $_POST['eventPromoIdno'];
$eventName = $_POST['eventName']; 
$eventAbout = $_POST['eventAbout'];
$eventMaxTeam = $_POST['eventMaxTeam'];
$eventStart = $_POST['eventStart'];
$eventGameType = $_POST['eventGameType'];

$sqlUpdateEvents = "UPDATE promote_tournament SET event_name='$eventName', event_about='$eventAbout',
 event_maxteam='$eventMaxTeam', event_start='$eventStart', event_gametype='$eventGameType' WHERE event_idno='$eventPromoIdno'";

if ($conn->query($sqlUpdateEvents)) {
  echo "Record updated successfullys";
 
} else {
  echo "Error updating record: " . $conn->error;
}


} // END OF UPDATE



// hide submit docs if user not yet upgraded.
//query the payment tracker

$hideFileDocs = '';
$showData = '';
$sqlCheckPay = "SELECT user_idno FROM payment_tracker WHERE user_idno='$sesIdno'";
$queryPaySubs = mysqli_query($conn, $sqlCheckPay); 
$checkPaySubs = mysqli_num_rows($queryPaySubs);


if($checkPaySubs <= 0) {
  $hideFileDocs = 'hideFileDocs';
   $showData = "Please upgrade your account first to access this features.";
} else {
 
}





 ?>


  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
      .tourna-main-container  {
        text-align: center;
        width: 50%;
        margin: auto;
      }

      .align-btn-row {
        display: inline-block;

      }

      .align-pe {
        text-align: center;
      }




        .updatePromo {
      width: 50%;
      margin: auto;
      border: 2px solid gray;
      border-radius: 1em;
      padding: 9px;
    }

    .docs-main-container { 

      width:50%;
      margin:  auto;
     }

     #hideFileDocs {
      display:  none;
     }

     .warning {
      text-align: center;
     }

     .hidePending {
      display: none;
     }

     .pa {
      text-align: center;
      color: gray;
     }

      @media only screen and (max-width: 600px) {
        .tourna-main-container {
          width: 100%;
          text-align: center;
        }

           .docs-main-container { 

           width:100%;
          margin:  auto;
     }


}
      
    </style>
  </head>
  <body>

    <div class="warning"><h4><?php echo $showData; ?></h4></div>
<div class="<?php echo $dataTrackStatus; ?>">

  	<div class="docs-main-container form-control" id="<?php echo $hideFileDocs; ?>">
  		<p>One more step, To become a organizer please submit valid documents
  		<?php echo $message ?? null; ?>
  	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
    Select file to upload:
  <input type="file" name="upload" class="btn btn-outline-primary">
  <select name="fileDocType" id="docs" class="form-control">
  <option value="philhealth">PHILHEALTH</option>
  <option value="nbi">NBI</option>
  <option value="sss">SSS</option>
  <option value="passport">PASSPORT</option>
  <option value="driver license">DRIVER LICENSE</option>
</select>
<br>
  <input type="submit" value="Submit" name="btnUploadDocs" class="btn btn-outline-primary">
</form>
  	</div>





</div>




<div class="organizer-main-container">




<div style="display:none;" class="organizer-modal-container align-pe"> <!-- to hide the data even no data is inserted yet -->
  <!-- <p>Advertisement/Tournament Promotion</p> -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Promote Event</button>

</div>
<br>

<!-- modal popup -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tournament Promotions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST" action="tournament_ses_state.php" enctype="multipart/form-data">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Event Name:</label>
            <input type="text" class="form-control" name="playEventName" id="recipient-name">
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">About:</label>
            <textarea class="form-control" name="playAbout" id="message-text"></textarea>
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Maximum Teams:</label>
            <select name="playTeams" class="form-control">
              <option>4</option>
              <option>8</option>
            </select>
          </div>

           <div class="form-group">
            <label for="message-text" class="col-form-label">Event Start Date:</label>
            <input type="date" class="form-control" name="playStartTime" id="recipient-name">
          </div>

          <div class="form-group">
            <select name="playType" class="form-control">
              <option value="Single Elimination">Single Elimination</option>
              <!-- <option value="Double Elimination">Double Elimination</option> -->
            </select>
          </div>


          <div class="form-group">
             <label for="message-text" class="col-form-label">Add Banner:</label>
            <input type="file" name="uploads" required>
          </div>



          <div class="form-group">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <input type="submit" class="btn btn-primary" name="btnEventSave" value="Save">
         </div>

        </form>

      </div>
    </div>
  </div>
</div>





</div> <!-- end of main container -->





<!-- render data after file is approved -->
<?php

  // render the current event data
  $sqlPromo ="SELECT * FROM promote_tournament WHERE user_idno='$sesIdno'";
 $resultPromo = $conn->query($sqlPromo);





// DELETE EVENT
// sql to delete a record
if(isset($_POST['btnDeletePromotion'])) {
  $eventPromoIdno = $_POST['eventPromoIdno'];
  
  $sqlDeletePromo = "DELETE FROM promote_tournament WHERE event_idno='$eventPromoIdno'";

if ($conn->query($sqlDeletePromo) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}


} // end of main DELETE




 ?>

 <?php $viewPromo = ''; ?>
 <?php while($viewPromo = $resultPromo->fetch_assoc()): ?>
<div class="tourna-main-container">
<div class="card">
  <div class="card-header">
    <h3>Basketball Tournament</h3>
  </div>
  <div class="card-body">
   <img src="<?php  echo "event_img/".$viewPromo['event_imgbanner']; ?>" alt="profile" class="img-thumbnail">
    <h5 class="card-title">Event: <?php  echo $viewPromo['event_name']; ?></h5>
    <h4 class="card-title">Event Starts: <?php  echo $viewPromo['event_start']; ?></h4>
        <h4 class="card-title">Game Type: <?php  echo $viewPromo['event_gametype']; ?></h4>
    <p class="card-text"><?php  echo $viewPromo['event_about']; ?></p>

     <div class="align-btn-row"> 
    <form method="POST" action="">
      <input type="hidden" name="eventPromoIdno" value="<?php  echo $viewPromo['event_idno']; ?>">
      <input type="submit" name="btnDeletePromotion" class="btn btn-primary" value="Remove">
    </form>
    </div>
    <div><a href="<?php echo "view_bracket_ses_state.php?eventId=".$viewPromo['event_idno']; ?>">Tournament Status</a></div>
    <div class="align-btn-row">
      <button class="btnEditPromo btn btn-primary">Edit</button>
    </div>
    

    <div class="align-btn-row"> 
    <!-- STRUCTURE TEAMS -->

    <?php // $_SESSION['event_name'] = $viewPromo['event_name'];  // use to query teams base on team who wanted to join the tournament ?>
    <?php// $_SESSION['event_gametype'] =  $viewPromo['event_gametype']; ?>
     <?php //$_SESSION['event_idno'] =  $viewPromo['event_idno']; ?>
    <form method="GET" action="tournament_teams_ses_state.php">
      <input type="hidden" name="eventName" value="<?php  echo $viewPromo['event_name']; ?>">
      <input type="hidden" name="eventType" value="<?php  echo $viewPromo['event_gametype']; ?>">
      <input type="hidden" name="eventPromoIdno" value="<?php  echo $viewPromo['event_idno']; ?>">
      <input type="submit" name="btnTeams" class="btn btn-primary" value="Teams">
    </form>
    </div>

    <div class="align-btn-row"> 
      <?php // $_SESSION['event_idnos'] = $viewPromo['event_idno']; ?>
      <a href="<?php echo "tournament_bracket_ses_state.php?eventId=".$viewPromo['event_idno']; ?>" class="btn btn-primary">Start</a>
    </div>
    
  </div>
</div>




<div class="updatePromo" id="updatePromo"> 

  <form method="POST" action="">
    <input type="text" name="eventPromoIdno" value="<?php  echo $viewPromo['event_idno']; ?>">
      <input type="text" name="eventName" value="<?php  echo $viewPromo['event_name']; ?>">
      <input type="text" name="eventAbout" value="<?php  echo $viewPromo['event_about']; ?>">
      <input type="text" name="eventMaxTeam" value="<?php  echo $viewPromo['event_maxteam']; ?>">
      <input type="text" name="eventStart" value="<?php  echo $viewPromo['event_start']; ?>">
      <input type="text" name="eventGameType" value="<?php  echo $viewPromo['event_gametype']; ?>">
      
      <input type="submit" name="btnUpdate" value="Update" class="btn btn-outline-success">
  </form>

</div>



 </div>
 <?php endwhile; ?>























<script type="text/javascript">

const currentStatus = '<?php echo $rowDocs['doc_status']; ?>';
document.querySelector(".organizer-main-container").style.display = "none";
console.log(currentStatus);


if(currentStatus == 'pending') {

	document.querySelector(".organizer-main-container").style.display = "none";



} else if(currentStatus == 'accepted') {
	document.querySelector(".docs-main-container").style.display = "none";
  document.querySelector(".organizer-main-container").style.display = "block";
   document.querySelector(".organizer-modal-container").style.display = "block";

}



// initial state
$(".updatePromo").hide();
$(".btnEditPromo").click(function() {
  $(".updatePromo").toggle();
})

</script>
  </body>
  </html>


<?php include 'inc/footer.php'; ?>
