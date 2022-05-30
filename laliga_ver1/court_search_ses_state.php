<?php include 'inc/header_login_state.php'; ?>
<?php 

    $sesIdno . "<BR>";
  $sesUser . "<BR>";
   $sesUserType . "<BR>";
 $sesUserEmail;




  // SEARCH COURT 
  $txtSearchCourt = '';
  $reserveEmail = '';
 if(isset($_GET['btnSearchCL'])) {
  $txtSearchCourt = $_GET['txtSearchCourt'];
  $txtSearchCourt;
  $reserveEmail = $_GET['reserveEmail'];

$sqlSearchCL ="SELECT * FROM basketball_court WHERE bc_address LIKE '$txtSearchCourt%' OR  bc_name LIKE '$txtSearchCourt%'";
$resultSearchCL = $conn->query($sqlSearchCL);

 }

		
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search Court</title>
	<style type="text/css">
		  .form-post-court-container {
      border: 2px solid grey;
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
      border-radius:  1em;
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
      width: 50%;
      height: 50%;
     
    }

    .locDi-container {
      padding:  5px;

    }

    .cd-details {
      color: #5B7DB1;
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


<!-- player perspective login -->

<div class="hideContainerPlayer">

  <div class="search-container">
    <form class="form-control" method='GET' action="court_search_ses_state.php">
       <h5>Court Finder</h5>
      <input type="text" name="txtSearchCourt" class="input-control" placeholder="search by: address, court name">
      <input type="submit" name="btnSearchCL" value="Search" class="btn btn-outline-primary">
    </form>
  </div>




  <!-- render the courts -->
  <div>
    <?php 

      while($rowCLplayer = $resultSearchCL->fetch_array()) {

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
        
        echo "<input type='hidden' name='reserveEmail' value='{$sesUserEmail}'>";
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