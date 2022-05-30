<?php require 'inc/header_login_state.php'; ?>
<?php require "fetch_cm_idno.php"; ?>
<?php require "findMatch_ses_state_server.php"; ?>

<?php 
	// SERVER COMMUNICATION STAYS HERE..
	echo  $sesIdno . "<BR>";
	echo $sesUser . "<BR>";;
	echo  $sesUserType . "<BR>";



    //query for loop render
    $sqlSelectCm = "SELECT * FROM casual_matches";
    $result = $conn->query($sqlSelectCm);

    

   // query for Idno base on current session
    $resultSession = '';
    $sqlSelectState = "SELECT * FROM casual_matches WHERE user_idno = '$sesIdno'";
    $resultState = $conn->query($sqlSelectState);
    $resultSession = mysqli_fetch_array($resultState);

    $dataSessionCm = isset($resultSession['user_idno']);
    



// SET STATE WHEN LOGIN BASE ON USER SESSIONS

//checking 




 // $output = '';

 //  for ($i = 0; $i < 6; $i++) {
 //    $output .= '<div>' . $i . '</div>';
 //  }  



  // SET STATES FOR EVENTS
    $currentState = " ";
    if (intval($sesIdno) == intval($dataSessionCm)) {
      $currentState = "hidden";
    } elseif(intval($sesIdno) != intval($dataSessionCm)) {
      $currentState = "submit";
    }



 
 ?>
 <!-- chat system -->
 <script>
(function(t,a,l,k,j,s){
s=a.createElement('script');s.async=1;s.src="https://cdn.talkjs.com/talk.js";a.head.appendChild(s)
;k=t.Promise;t.Talk={v:3,ready:{then:function(f){if(k)return new k(function(r,e){l.push([f,r,e])});l
.push([f])},catch:function(){return k&&new k()},c:l}};})(window,document,[]);
</script>


  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postModal" id="#postModal">
  POST MATCH
</button>

<br><br>


 <!-- <div>
 	<input type="text" name="txtSearch" placeholder="search by city, idno">
 	<button>Search</button>
 </div> -->

<!--  RENDER POST -->
<!--  RENDER POST -->
<! <?php while($row = $result->fetch_array()) { ; ?>
 <div class="column">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Find Match</h4>
        <p class="card-text">Proposed By: Player</p>
         <p class="card-text">Temporal CM idno: <?php echo $row['cm_idno']; ?></p> 
        <p class="card-text">About: <?php echo $row['cm_desc']; ?></p>
         <p class="card-text">Location: <?php echo $row['cm_location']; ?></p>
         <p class="card-text">Game date: <?php echo $row['cm_date_game']; ?></p>
         <p class="card-text">Game starts at <?php echo $row['cm_start_time']; ?> and will end at <?php echo $row['cm_end_time']; ?></p>

        <div id="r">
          <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#chatModal" value="Message" id="btnChat">
        </div>
  
        
        <form method="POST" action="findMatch_ses_state.php">
          <input type="<?php echo $currentState; ?>" class="btn btn-primary" onclick="btnAccept()" value="Accept Challenge">
          <input type="<?php echo $currentState; ?>" class="btn btn-primary" name="btnDeletePost" id="btnDeletePost" value="X">
          <input type="hidden" name="currentPostIdno" value="<?php echo $row['cm_idno']; ?>" id="txtChatOther"> 
        </form>


       
        <input type="text" name="cmCurrentSesIdno" value="<?php echo $sesIdno; ?>" id="txtChatMe"> 
        <input type="text" name="txtUserIdno02" value="<?php echo $row['user_idno']; ?>" id="txtChatOther"> 
      </div>
    </div>
  </div>
  <br>
 <?php }; ?> 


















<!-- Modal -->
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
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>








<!-- Chat Modal -->
<div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <!-- container element in which TalkJS will display a chat UI -->
        <div id="talkjs-container" style="width: 90%; margin: 20px; height: 500px">
        <i>Fetching chat UI...</i>
        </div>

  
  <!-- session ID -->
  <input type="hidden" id="cmCurrentSesIdno" value="<?php echo $sesIdno; ?>">




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
    // var divIdno = document.getElementById("dom-targetIdno");
    //  var divUser = document.getElementById("dom-targetUser");
    // var myDataIdno = divIdno.textContent;
    // var myDataUser = divUser.textContent;
    // console.log(myDataIdno);
    //  console.log(myDataUser);

// $(document).ready(function(){
//     let cmDesc = document.querySelector("#cmDesc");
// $("#btnPostMatch").click(function(){
//   $.post("findMatch_ses_state_server.php",
//   {
//     cmDesc: $("#cmDesc").val(),
//     cmCity: $("#cmCity").val(),
//     cmDate: $("#cmDate").val(),
//     cmStartTime: $("#cmStartTime").val(),
//     cmEndTime: $("#cmEndTime").val(), 
//     cmCurrentSesIdno: $("#cmCurrentSesIdno").val()
//   },
//   function(data, status){
//     alert("Successfully Posted!");
//     $("#cmDesc").val('');
//     $("#cmCity").val('');
//     $("#cmDate").val('');
//     $("#cmStartTime").val('');
//     $("#cmEndTime").val('');
//     $("#cmCurrentSesIdno").val('');
//   });
// });



// $("#btnChat").click(function(){
//   $.post("server_chat.php",
//   {
//     currentMe: $("#txtChatMe").val(),
//     otherMe: $("#txtChatOther").val(),
//   },
//   function(data, status){
//    alert("Establish connection.");
//   });
// });





// }); // end of main doc func



function btnAccept() {
  alert('letos!');
  console.log("hello");
}

const txtChatMe = document.getElementById("txtChatMe");
const txtChatOther = document.getElementById("txtChatOther");



</script>
<!-- snip -->
<script src="scripts/chat.js"></script>
<?php include 'inc/footer.php'; ?>