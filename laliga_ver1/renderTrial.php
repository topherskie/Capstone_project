<?php require 'inc/header_login_state.php'; ?>

<?php require "findMatch_ses_state_server.php"; ?>

<?php 
  // SERVER COMMUNICATION STAYS HERE..
  echo  $sesIdno . "<BR>";
  echo $sesUser . "<BR>";
  echo  $sesUserType . "<BR>";



    //query for loop render
    $sqlSelectCm = "SELECT * FROM casual_matches";
    $resultRenderQ = mysqli_query($conn, $sqlSelectCm);


    

   // query for Idno base on current session
    // $resultSession = '';
    // $sqlSelectState = "SELECT * FROM casual_matches WHERE user_idno = '$sesIdno'";
    // $resultState = $conn->query($sqlSelectState);
    // $resultSession = mysqli_fetch_array($resultState);

    // $dataSessionCm = isset($resultSession['user_idno']);
    



// // CHECK IF CURRENT USER LOGIN IS IN A MATCH
//     $reqStatus = '';
//     $sqlUserReqMatch = "SELECT * FROM match_requesters WHERE requester_idno='$sesIdno'";
//     $resultDataReq = $conn->query($sqlUserReqMatch);

    








// SUBMIT MATCH  / ACCEPT CHALLENGE----------------
if(isset($_POST['btnSendMatch'])) {
   $txtCmMatchIdno = $_POST['txtCmMatchIdno'];
  $txtPlayerMatchCurrentIdno = $_POST['txtPlayerMatchCurrentIdno'];
  $txtGameDate = $_POST['txtGameDate'];
  $gameStatus = "pending";

  echo "current post match IDNO - ". $txtCmMatchIdno;
  echo "<br>";
  echo "current player who post match IDNO - " . $txtPlayerMatchCurrentIdno;


// // check if data exist sample checking for num_rows
// $sqlCheckRecordMatch = "SELECT * FROM match_requesters WHERE requester_idno='$sesIdno'";  
// $datacheckMatch = mysqli_query($conn, $sqlCheckRecordMatch);

// if(mysqli_num_rows($datacheckMatch) > 0) {
//   echo "record exist";
// } else {
//   echo 'no data found';
// }

  $sqlInsertRequest = "INSERT INTO match_requesters (requester_idno, cm_idnos, user_idno, mr_date_requested, mr_status) VALUES ('$sesIdno', '$txtCmMatchIdno', '$txtPlayerMatchCurrentIdno', '$txtGameDate ', '$gameStatus')";

  if ($conn->query($sqlInsertRequest) === TRUE) {
    echo "New request created successfully";
    header("Location: findMatch_ses_state.php");
    } else {
     echo "Error: " . $sqlInsertRequest . "<br>" . $conn->error;
  }







} // end of main if ACCEPT CHALLENGE





if(isset($_POST['btnCancelMatch'])) {

  $txtCmMatchIdno = $_POST['txtCmMatchIdno'];
  $txtPlayerMatchCurrentIdno = $_POST['txtPlayerMatchCurrentIdno'];
  $txtGameDate = $_POST['txtGameDate'];


  $dataNone = 'discontinued';
  $sqlInsertRequestState = "UPDATE match_requesters SET mr_status='$dataNone'  WHERE cm_idno ='$txtCmMatchIdno'";
  if ($conn->query($sqlInsertRequestState) === TRUE) {
    echo "New record added to  casual_matches";
    header("Location: findMatch_ses_state.php");
    } else {
     echo "Error: " . $sqlInsertRequestState . "<br>" . $conn->error;
  }



} // END OF CANCEL MATCH




 




 
 ?>  <!-- end of PHP --> 
 <!-- chat system -->
 <script>
(function(t,a,l,k,j,s){
s=a.createElement('script');s.async=1;s.src="https://cdn.talkjs.com/talk.js";a.head.appendChild(s)
;k=t.Promise;t.Talk={v:3,ready:{then:function(f){if(k)return new k(function(r,e){l.push([f,r,e])});l
.push([f])},catch:function(){return k&&new k()},c:l}};})(window,document,[]);
</script>

  <!-- Search Bar --> 
  <div class="input-group">

    <form method="GET" action="searchMatch_set_state.php" class="form-control">

      <div class="input-group">
        
  <label for="exampleFormControlSelect1"> (Filter By: City): </label>
    <select class="form-control" id="exampleFormControlSelect1" name="cmCitySearch">
      <option>Cebu City</option>
      <option>Mandaue City</option>
      <option>Bogo City</option>
      <option>Naga City</option>
       <option>LapuLapu City</option>
    </select>
  </div>

     <!--  <input type="text" name="txtSearch" class="form-control rounded" placeholder="Search" aria-label="Search"/> -->
    
    <input type="submit" name="btnSearch" class="btn btn-outline-primary" value="Search">
    </form>

     <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#postModal">
  POST MATCH
</button>
 </div>

  

  <!-- Button trigger modal -->
<div>

</div>
<br><br>


 <!-- <div>
  <input type="text" name="txtSearch" placeholder="search by city, idno">
  <button>Search</button>
 </div> -->

<!--  RENDER POST -->
<div class="post-main-container">
  <?php 

  

  while ($row = mysqli_fetch_array($resultRenderQ)) {




      //&& $row['requester_idno'] != $sesIdno
      if ($row['user_idno'] != $sesIdno) {

         echo "<div class='column'>";
       echo "<div class='col-sm-12'>";
       echo "<div class='card'>";
       echo "<div class='card-body'>";
       echo "<h4 class='card-title'>Find Match</h4>";
       echo "<p class='card-text'>Proposed By: Player</p>";
       echo  "Player Idno" .  " " . $row['user_idno'];
       echo "<p class='card-text'>" . "Temporal CM idno: " . $row['cm_idno'] . "</p> ";
       echo  "<p class='card-text'>" . "About: "  . $row['cm_desc'] . "</p>";
       echo   "<p class='card-text'>" . 'Location:' . $row['cm_location'] . "</p>";
       echo   "<p class='card-text'>" . 'Game date:' . $row['cm_date_game'] . "</p>";
       echo  "<p class='card-text'>" . "Game starts at" . $row['cm_start_time'] . "and will end at " . $row['cm_end_time'] . "</p>";


        echo "<div>";
        echo "<form method='POST' action='findMatchChat.php'>";
        echo "<input type='hidden' name='txtPostMatchCurrentIdno' value='{$row['user_idno']}'>";
        echo "<input type='submit' class='btn btn-primary' name='btnChatMatch' data-toggle='modal' data-target='#chatModal' value='Message' id='btnChat'>";
        echo "</form>";


        // SEND MATCH REQUEST 
        echo "<form action='findMatch_ses_state.php' method='POST'>";
        echo "<input type='hidden' name='txtCmMatchIdno' value='{$row['cm_idno']}'>";
        echo "<input type='hidden' name='txtPlayerMatchCurrentIdno' value='{$row['user_idno']}'>";
        echo "<input type='hidden' name='txtGameDate' value='{$row['cm_date_game']}'>";
        echo "<input type='submit' name='btnSendMatch' class='btn btn-primary' id='btnSendMatchRequest' value='Send Match Request'>";
        echo "</form>";

      
        echo "</div>";

        
       echo "</div>";
       echo "</div>";
       echo "</div>";
       echo "</div>";



      } elseif ($sesIdno == $row['user_idno']) {
        echo "<div class='column'>";
       echo "<div class='col-sm-12'>";
       echo "<div class='card'>";
       echo "<div class='card-body'>";
       echo "<h4 class='card-title'>Find Match</h4>";
       echo "<p class='card-text'>Proposed By: Player</p>";
       echo $row['user_idno'];
       echo "<p class='card-text'>" . "Temporal CM idno: " . $row['cm_idno'] . "</p> ";
       echo  "<p class='card-text'>" . "About: "  . $row['cm_desc'] . "</p>";
       echo   "<p class='card-text'>" . 'Location:' . $row['cm_location'] . "</p>";
       echo   "<p class='card-text'>" . 'Game date:' . $row['cm_date_game'] . "</p>";
        echo  "<p class='card-text'>" . "Game starts at" . $row['cm_start_time'] . "and will end at " . $row['cm_end_time'] . "</p>";

        echo "<div>";
       echo "<input type='hidden' class='btn btn-primary' data-toggle='modal' data-target='#chatModal' value='Message' id='btnChat'>";
        echo "</div>";

        echo "<form method='POST' action='findMatch_ses_state.php'>";
        echo "<input type='hidden' class='btn btn-primary form-control' onclick='btnAccept()' value='Accept Challenge'>";
        echo "<br>";

        echo  "<input type='submit' class='btn btn-primary form-control' name='btnDeletePost' id='btnDeletePost' value='Remove Post'>";
  
        echo  "<input type='hidden' name='currentPostIdno' value='{$row['cm_idno']}' id='txtChatOther'>"; 
        echo"</form>";



         echo "<form method='POST' action='editPost.php'>";
        
        echo  "<input type='submit' class='btn btn-primary form-group' name='btnEditPost' id='btnDeletePost' value='Update Post'>";

        echo  "<input type='hidden' name='currentPostIdno' value='{$row['cm_idno']}' id='txtChatOther'>"; 
        echo"</form>";
        


       echo "</div>";
       echo "</div>";
       echo "</div>";
       echo "</div>";



  

      }






      

  } // end of main loop
  


 ?> <!-- END OF PHP LINE -->
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

  <form method="POST" action="findMatch_ses_state.php">
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

























 





 <!-- technique to use to get the IDNO into the js to run the chat system base on idno -->

 <div id="dom-targetIdno" style="display: none;">
    <?php
        $outputIdno = $sesIdno; // Again, do some operation, get the output.
        echo htmlspecialchars($outputIdno); /* You have to escape because the result
                                           will not be valid HTML otherwise. */
                                  
    ?>
</div>
  
 <div id="dom-targetUser" style="display: none;">
    <?php
        $outputUser = $sesUser; // Again, do some operation, get the output.
        echo htmlspecialchars($outputUser); /* You have to escape because the result
                      










                                           will not be valid HTML otherwise. */

                                          
    ?>
</div>  


<script>
   


function btnAccept() {
  alert('letos!');
  console.log("hello");
}



</script>
<!-- snip -->
<script src="scripts/chat.js"></script>
<?php include 'inc/footer.php'; ?>





