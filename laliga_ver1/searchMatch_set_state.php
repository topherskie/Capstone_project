<?php require 'inc/header_login_state.php'; ?>


<?php

	echo  $sesIdno . "<BR>";
	echo $sesUser . "<BR>";;
	echo  $sesUserType . "<BR>";

if(isset($_GET['btnSearch'])) {

	// $txtSearch = $_GET['txtSearch'];
	$cmCitySearch = $_GET['cmCitySearch'];
 	//query for loop render
    


    $sqlCmCheck = "SELECT * FROM casual_matches WHERE cm_location LIKE '%$cmCitySearch%' OR mr_fullname LIKE '%$cmCitySearch%'";
    $checkCmQuery = mysqli_query($conn, $sqlCmCheck); 
    $checkCmRows = mysqli_num_rows($checkCmQuery);

    if($checkCmRows <= 0) {

     
    } else {
      $sqlSelectCm = "SELECT * FROM casual_matches WHERE cm_location LIKE '%$cmCitySearch%' OR mr_fullname LIKE '%$cmCitySearch%'";
    $result = $conn->query($sqlSelectCm);
    }


} // end of if else
	




 ?>

<style type="text/css">
  .post-main-container {
  width:50%;
  margin:auto;
box-shadow: 0 0 10px;
padding: 12px;
}

.match-accepted-container {
  border: 2px solid #5584AC;
  padding: 4px;
  border-radius: .5em;
  text-align: center;
  color: #FF6B6B;
  margin: 6px;
}

.search-container {
  width: 50%;
  margin: auto;
}


.btn-container {
 /* border: 2px solid black;*/
  display: flex;
  margin: 12px;
  padding:  12px;
}

.btn-mar {
  margin-left:  5px;
}


  
@media only screen and (max-width: 600px) {
  .post-main-container {
  width: 100%;

  }

  .search-container {
  width: 100%;
  margin: auto;
}


} /*end of media quries*/

</style>


<div class="input-group search-container">

    <form method="GET" action="searchMatch_set_state.php" class="form-control">

     <div class="input-group">
        
  <label for="exampleFormControlSelect1"> (Filter by: address, player name): </label>
   <input type="text" name="cmCitySearch" class="form-group" placeholder="enter search query...">
  </div>
  

     <!--  <input type="text" name="txtSearch" class="form-control rounded" placeholder="Search" aria-label="Search"/> -->
    
    <input type="submit" name="btnSearch" class="btn btn-outline-primary" value="Search">
    </form>

     <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#postModal">
  POST MATCH
</button>
 </div>

<br>


<!-- RENDER RESULT -->

<div class="<?php echo $hideDiv; ?>">
 <?php 
 	while ($rows = $result->fetch_array()) {
		
 			
 			if($sesIdno != $rows['user_idno']) {
 		  echo "<div class='column post-main-container'>";
       echo "<div class='col-sm-12'>";
       echo "<div class='card'>";
       echo "<div class='card-body'>";
       echo "<h4 class='card-title'>Find Match</h4>";
       echo "<p class='card-text'>Proposed By: Player</p>";
       echo  "Player Idno" .  " " . $rows['user_idno'];
       echo "<p class='card-text'>" . "Temporal CM idno: " . $rows['cm_idno'] . "</p> ";
       echo  "<p class='card-text'>" . "About: "  . $rows['cm_desc'] . "</p>";
       echo   "<p class='card-text'>" . 'Location:' . $rows['cm_location'] . "</p>";
       echo   "<p class='card-text'>" . 'Game date:' . $rows['cm_date_game'] . "</p>";
       echo  "<p class='card-text'>" . "Game starts at" . $rows['cm_start_time'] . "and will end at " . $rows['cm_end_time'] . "</p>";
       
       
        echo "<div class='btn-container'>";
        echo "<form method='POST' action='findMatchChat.php'>";
        echo "<input type='hidden' name='txtPostMatchCurrentIdno' value='{$rows['user_idno']}'>";
        echo "<input type='submit' class='btn btn-outline-primary btn-mar' name='btnChatMatch' data-toggle='modal' data-target='#chatModal' value='Message' id='btnChat'>";
        echo "</form>";

        

        // SEND MATCH REQUEST 
        echo "<form action='findMatch_ses_state.php' method='POST'>";
        echo "<input type='hidden' name='txtCmMatchIdno' value='{$rows['cm_idno']}'>";
        echo "<input type='hidden' name='txtPlayerMatchCurrentIdno' value='{$rows['user_idno']}'>";
        echo "<input type='hidden' name='txtGameDate' value='{$rows['cm_date_game']}'>";
        echo "<input type='submit' name='btnSendMatch' class='btn btn-outline-primary btn-mar' id='btnSendMatchRequest' value='Send Match Request'>";
        echo "</form>";

      
        echo "</div>";

        
       echo "</div>";
       echo "</div>";
       echo "</div>";
       echo "</div>";



       echo "</div>";
       echo "</div>";
       echo "</div>";
       echo "</div>";

 	  }  else {

        //echo "<h1>" . "No Data found" . "</h1>";

     }

	
	 } // end of while loop





 ?>
</div>




















<!-- Modal Post-->
<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Find Match Descriptions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- BODY  HERE -->

  <form method="POST" action="findMatch_ses_state_server.php">
  <div class="form-group">
    <input type="text" class="form-control"  name="cmDesc" placeholder="Enter match short descriptions">
  </div>

 <div class="form-group">
    <select class="form-control" name="cmCity">
      <option>Cebu City</option>
      <option>Naga City</option>
      <option>Mandaue City</option>
      <option>Bogo City</option>
      <option>LapuLapu City</option>
    </select>
  </div>

   <div class="form-group">
    <label>Date:</label>
    <input type="date" class="form-control" name="cmDate">
  </div>

   <div class="form-group">
    <label>Start Time:</label>
    <input type="time" class="form-control" name="cmStartTime">
  </div>

   <div class="form-group">
    <label>End Time:</label>
    <input type="time" class="form-control" name="cmEndTime">
  </div>
  
  <!-- session ID -->
  <input type="hidden" name="cmCurrentSesIdno" value="<?php echo  $sesIdno; ?>">

  <input type="submit" class="btn btn-primary"  name="btnPostMatch" value="Post">
  </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


















































<script type="text/javascript">




</script>

<script src="scripts/chat.js"></script> <!-- might delete later no use, since chat has been routed -->
<?php include 'inc/footer.php'; ?>