<?php include 'inc/header_login_state.php'; ?>
<?php 
  
  echo  $sesIdno . "<BR>";
$sesUser . "<BR>";;
 $sesUserType . "<BR>";
 $sesFname . ' ' . $sesLname;
 $sesUserEmail;

// RENDER DATA AT render container
$sqlRenderCourtList = "SELECT * FROM basketball_court WHERE user_idno='$sesIdno'";
$resultRenderCL = $conn->query($sqlRenderCourtList);



// PLAYER PART QUERY
$sqlPlayerCL = "SELECT * FROM basketball_court";
$resultPlayerCL = $conn->query($sqlPlayerCL);




  

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Post Court</title>
  <style type="text/css">

  img {
    max-width: 100%;
    max-height: 100%;
}


    .form-post-court-container {
      box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
      border-radius: 1em;
      margin: auto;
      width:  50%;
      padding: 8px;

    }

    .main-card-container {
     /* border:  2px solid black;*/
      padding:  5px;
      margin:  10px;
      display:  flex;
      flex-wrap: wrap;

    }

    .img-card-container {
      display: flex;
      flex-direction: column;
      flex-basis: 50%;
      flex: 1;
      padding:  8px;
      margin: 8px;
      border-radius: 1em;
     box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .info-card-container {
      display: flex;
      flex-direction: column;
      flex-basis: 50%;
      flex: 1;
      padding:  8px;
      margin: 8px;
      border-radius:  1em;
      padding:  8px;
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }
    
    .img-court {

      margin: auto;
      width: 60%;
      height: 50%;
     
    }

    .locDi-container {
      padding:  5px;

    }

    .cd-details {
      color: #5B7DB1;
    }

    .create-align{
     text-align: center; 
    }

    .search-container {
      width: 50%;
      margin: auto;
    }

    @media only screen and (max-width: 600px) {
  .main-card-container {
    display: block;
  }

  .search-container {
      width: 100%;
      margin: auto;
    }

}

  </style>
</head>
<body>


 

 <div class="hideContainerCL create-align">
   <button id="btnShow" class="btn btn-success">Create</button>
 </div> 

 <br>
 <div id="contentPostCourt" class="form-post-court-container">
  <form action="post_court_ses_server_state.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
    <h5>Court Information:</h5>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter court name.." name="txtBcName" required>
  </div>

  <div class="form-group">
   
    <input type="number" name="numRateAmount" class="form-control" id="exampleInputPassword1" placeholder="Enter rate amonut." required>
  </div>

  <div class="form-group">

    <input type="text" name="txtCourtLocation" class="form-control" id="exampleInputPassword1" placeholder="enter location.." required>
  </div>


  <div class="form-group">
    
    <textarea class="form-control"  name="txtArea" id="exampleFormControlTextarea1" rows="3" placeholder="Short details about the court.." required></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Image shot of the court</label>
    <input type="file" class="form-control-file btn btn-outline-primary" id="exampleFormControlFile1" name="imgCourt">
  </div>
 
  <input type="hidden" name="currentCLid" value="<?php echo $sesIdno; ?>">
  <input type="submit" class="btn btn-primary" name="btnCourtList" value="Post Listing">
</form>

 </div>

<div>
  <button id="minCL" class="btnMin btn btn-outline-primary">Minimize</button>
</div>




<div class="main-render-container hideContainerCL">
  <?php
    while($rowCL = $resultRenderCL->fetch_array()) {

      $type = "court_owner";
     $imgCourt = "img_court/".$rowCL['bc_img'];


        echo "<div class='main-card-container mainContainerCL'>";

        echo "<div class='img-card-container'>";
       
        echo "<img src='{$imgCourt}' class='img-court'>";
        
        echo "</div>";
      
  
       echo "<div class='info-card-container'>";
        echo "<h4>Court Details</h4>";
        echo "<p> Court name: " . $rowCL['bc_name'] . "</p>";
        echo "<p> Rate Per Hr: " . $rowCL['bc_rate'] . "</p>";
        echo "<p> Address: " . $rowCL['bc_address'] . "</p>";
        echo "<p> Description: " . $rowCL['bc_desc'] . "</p>";
      

        echo "<div>";

        echo "<form method='POST' action='post_court_ses_server_state.php'>";

        echo "<input type='hidden' name='currentIdnoCL' value='{$rowCL['bc_idno']}'>";
        echo "<input type='submit' name='btnDeleteCL' value='Remove Listing' class='btn btn-outline-primary'>";
        echo "<br>";
        echo "</form>";
          echo "<br>";
        echo "<button class='editTrigger btn btn-outline-primary'>" . "Update Court" . "</button>";
        echo "</div>";

        echo "
          <div class='editToggle'> 

            <form action='post_court_ses_server_state.php' method='POST' enctype='multipart/form-data'>
              <input type='text' name='editCourtName' value='{$rowCL['bc_name']}'>
              <input type='text' name='editRate' value='{$rowCL['bc_rate']}'>
              <input type='text' name='editCourtAddress' value='{$rowCL['bc_address']}'>
              <input type='text' name='editCourtDesc' value='{$rowCL['bc_desc']}'>
              <input type='hidden' name='currentCLid' value='{$rowCL['bc_idno']}'>
              <input type='submit' name='btnEditCL' value='Save Changes' class='btn btn-outline-primary'>
            </form>

               '<br>'

               <form action='post_court_ses_server_state.php' method='POST' enctype='multipart/form-data'>
               <input type='file' name='imgCourtUpdate' class='btn btn-outline-primary'>
                <input type='hidden' name='currentCLid' value='{$rowCL['bc_idno']}'>
                <input type='submit' name='btnUploadImg' value='Save Changes' class='btn btn-outline-primary'>
                </form>
          </div>  
        ";
        
        echo "</div>";

      
      
       
        echo "</div>";
      


    } // end of while loop


   ?>



</div>



<!-- UPDATE MODAL -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>








<!-- player perspective login -->

<div class="hideContainerPlayer">

  <div class="search-container">
    <form class="form-control" method='GET' action="court_search_ses_state.php">
       <h5>Court Finder</h5>
       <input type='hidden' name='reserveEmail' value='{$sesUserEmail}'>
      <input type="text" name="txtSearchCourt" class="input-control" placeholder="enter address or court name.." > 
      <input type="submit" name="btnSearchCL" value="Search" class="btn btn-outline-primary">
    </form>
  </div>




  <!-- render the courts -->
  <div>
    <?php 

      while($rowCLplayer = $resultPlayerCL->fetch_array()) {

      $type = "court_owner";
      $imgCourt = "img_court/".$rowCLplayer['bc_img'];

       

        echo "<div class='main-card-container mainContainerCL'>";

        echo "<div class='img-card-container'>";
        echo "<img src='{$imgCourt}' class='img-court'>";
        echo "</div>";
      
      
        echo "<div class='info-card-container'>";

        echo "<h4 class='cd-details'>Court Details</h4>";
        echo "<p> Court name: " . $rowCLplayer['bc_name'] . "</p>";
        echo "<p> Rate per hour: " . $rowCLplayer['bc_rate'] . "</p>";
        echo "<p> Address: " . $rowCLplayer['bc_address'] . "</p>";
        echo "<p> Description: " . $rowCLplayer['bc_desc'] . "</p>";
      
        // CHECK DIRECTION
        echo "<div class='locDi-container'>";
        echo "<form method='POST' action='01_location_ses_state.php'>";
        echo "<input type='submit' name='btnCheckLoc' value='Location' class='btn btn-outline-primary'>";
        echo "<input type='hidden' name='txtCurrentAdd' value='{$rowCLplayer['bc_address']}'>";
        echo "</form>";
        echo "</div>";

        echo "<br>";

        echo "<div>";
        echo "<button class='hideReserveContainer btn-outline-primary' onClick='hideReserveCourt()'>" . "Reserve Court" . "</button>";

        echo "<div class='reserve-container'>";
        echo "<form method='POST' action='post_court_ses_reserve_state.php'>";
        echo "<input type='hidden' name='currentBcAddress' value='{$rowCLplayer['bc_address']}'>";
        echo "<input type='hidden' name='currentBcName' value='{$rowCLplayer['bc_name']}'>";
        echo "<input type='hidden' name='currentCourtRate' value='{$rowCLplayer['bc_rate']}'>";
        echo "<input type='hidden' name='currentBCidno' value='{$rowCLplayer['bc_idno']}'>";
        echo "<input type='hidden' name='currentIdnoOwner' value='{$rowCLplayer['user_idno']}'>";
        echo "<input type='hidden' name='currentIdnoSession' value='{$sesIdno}'>";
     
        echo "<label>Book Date</label>";
        echo "<br>";
        echo "<input type='date' name='bcDate'/>";
        echo "<br>";
        echo "<label>Start Time</label>";
        echo "<br>";
        echo "<input type='time'  name='bcStartTime'  required>";
        echo "<br>";
        
        echo "<label>End Time</label>"; 
        echo "<br>";
        echo "<input type='time'  name='bcEndTime'  required>";
        echo "<br>";
        echo "<br>";


         echo "<input type='hidden' name='reserveEmail' value='{$sesUserEmail}'>";
        echo "<input type='submit' name='btnCLreserve' value='Submit to Reserve' class='btn-outline-primary'>";
        echo "</form>";
        echo "</div>";


        echo "<form method='POST' action='court_owner_chat.php'>";
        echo "<input type='hidden' name='chatIdno' value='{$rowCLplayer['user_idno']}'>";
        echo "<br>";
        echo "<input type='submit' name='btnChatCL' value='Message' class='btn btn-primary'>";  

        echo "</form>";

        echo "</div>";



        echo "</div>";

      
      
        echo "</div>";
        



    } // end of while loop 



     ?>

  </div>



</div>



<script type="text/javascript">

$(document).ready(function(){

createPost();
minimizeCL();
editPostToggle();
 hideReserveCourt();



function createPost() {
    // initial state
  $("#contentPostCourt").hide();
  $("#btnShow").click(function(){

    $("#contentPostCourt").toggle("fast");
  });
} // CREATE POST


function minimizeCL() {
    // initial state
  $("#minCL").click(function(){

    $(".mainContainerCL").toggle("fast");
  });

} //  MINIMIZE POST



function editPostToggle() {
    // initial state
  $(".editToggle").hide();
  $(".editTrigger").click(function(){

    $(".editToggle").toggle("fast");
  });
} // edit post hide toggle




function hideReserveCourt() {

  
  $(".reserve-container").hide();
  $(".hideReserveContainer").click(function(){

    $(".reserve-container").toggle("fast");
  });
  


} // end toggle court reserve



}); // end of main func







const hideContainerCL = document.querySelector(".hideContainerCL");
const hideContainerPlayer = document.querySelector(".hideContainerPlayer");
const btnMin = document.querySelector(".btnMin");
const currentStateUser= '<?php echo $sesUserType; ?>';

if(currentStateUser == 'player') {

  hideContainerCL.style.display = "none";
  hideContainerPlayer.style.display = "block";
  btnMin.style.display = "none";

} else if(currentStateUser == 'court_owner') {

  hideContainerCL.style.display = "block";
  hideContainerPlayer.style.display = "none";
}








// time adjustment
const input = document.createElement('input');
input.type = 'time';
input.min = '23:00';
input.max = '01:00';
input.value = '23:59';

if (input.validity.valid && input.type === 'time') {
  // <input type=time> reversed range supported
} else {
  // <input type=time> reversed range unsupported
}

 </script>

</body>
</html>


<?php include 'inc/footer.php'; ?>