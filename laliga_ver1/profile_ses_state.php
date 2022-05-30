<?php 

include 'inc/header_login_state.php';
$sesUserType;

  // echo "Connected successfully";
    $image = '';
    $resultImg = '';
    $verfied = '';
    $organizer = '';
    $verfied = '';
 $result = mysqli_query($conn, "SELECT * FROM user WHERE user_idno = '$sesIdno'");
  $data = mysqli_fetch_assoc($result);

//echo $data['user_idno'];
$image = $data['img_profile'];
$hlMoments = $data['hl_moments'];
$resultImg = "img_profiles/".$image;
$resultMoments = "hl_moments/".$hlMoments;
$organizer = $data['user_type_upgrade'];
$verfied = $data['quality_status'];
?>
<style>
/*  css example */
.span-verfied-container {
  background-color: #143F6B;
  width: 10%;
  margin: auto;
  border-radius: 1rem;
  text-align: center;
}

.span-verfied {
  content: "\2713";
  font-weight: bold;
  color: lightgreen;
  padding: 8px;
  
}
.a_link {
    text-align: center;
}

</style>

<!-- <br> -->
<?php  echo $sesUser; ?>
<?php echo $sesUserType; ?>
<?php echo $sesIdno; ?>

<div class="a_link">   
    <div>
        <button id="btnProfileToggle" class="btn btn-outline-info">Profile</button>
    <button id="btnMatch" class="btn btn-outline-info co-hide">Match Requests</button>
    <button id="btnRequest" class="btn btn-outline-info co-hide">Player Requests</button>
    <button id="btnRecruitInvites" class="btn btn-outline-info co-hide">Recruit Invites</button>
    <button id="btnBooking" class="btn btn-outline-info pl-hide">Booking Requests</button>
    <button id="btnProfitReport" class="btn btn-outline-info pl-hide">Profit Report</button>
    <button id="btnBookingPlayer" class="btn btn-outline-info co-hide">Court Request</button>
    <!-- <button id="btnBookingPlayerHistory" class="btn btn-outline-info co-hide">My Court Requests History</button> -->
    <button id="btnMyTeam" class="btn btn-outline-info co-hide">My Team</button>
    <button id="btnPaymentHistory" class="btn btn-outline-info co-hide">Payment Transactions</button>
    </div>

</div>
<div class="profile-main-container main-pro-shrink">

<?php echo $resultImg; ?>

  <div class="profile-upper-container">
    <div><?php echo $verfied. ' ' . $organizer; ?></div>
      <h5><?php echo $data["user_fname"] . ' ' . $data["user_mname"] . ' ' . $data["user_lname"]; ?> </h5>
      <div>
         <object class="img-cir" data="<?php echo $resultImg; ?>">
        <img src="img_profiles/default_pp.jpg" class="img-cir" alt="profile pp">
         </object>
    </div>

      <div>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Update Profile</button>
        <a href="user_port_ses_state.php" class="btn btn-primary">Portfolio</a>
    </div>
  </div>


  <div class="profile-lower-container">
    <div><h5 class="list-group-item list-group-item-primary">Player Information:</h5></div>
    <div>
        <ul class="list-group">
            <li class="list-group-item">Type: <?php echo $data['user_type']; ?></li>
            <li class="list-group-item">ID: <?php echo $data['user_idno']; ?></li>
            <li class="list-group-item">DOB: <?php echo $data['user_dob']; ?></li>
            <li class="list-group-item">AGE: <?php 
             $datetime1 = date_create($data['user_dob']);
            $datetime2 = date_create('2022-05-13');
             $interval = date_diff($datetime1, $datetime2);
             echo $interval->format('%R%y years');
            ?></li>
            <li class="list-group-item">Email: <?php echo $data['user_email']; ?></li>
            <li class="list-group-item">Address: <?php echo $data['user_address']; ?></li>
            <li class="list-group-item">Gender: <?php echo $data['user_gender']; ?></li>
            <li class="list-group-item">Player Position: <?php echo $data['player_pos']; ?></li>
            <li class="list-group-item">Height by CM: <?php echo $data['user_height']; ?></li>
            <li class="list-group-item">Contact No: <?php echo $data['user_contact_no']; ?></li>
          
        </ul>
    </div>
  </div>


  <!-- highlights -->
  <div class="hl-main-container" id="co-container">

    <div class="hl-child-container">
        <form action="server_profile.php" method="POST" class="file-hl" enctype="multipart/form-data">
            <div class="form-group">
             <label for="exampleFormControlFile1"><h5>Basketball Highlights</h5></label>
            <input type="file" class="form-control-file" name="hlMoments" id="exampleFormControlFile1" >
            </div>

            <input type="submit" name="highlightsSubmit" value="Upload Highlights" class="btn btn-primary">

              <!-- idno handler session  -->
              <input type="hidden" name="sesIdno" value="<?php echo $data['user_idno']; ?>" class="form-control">
        </form>
        <br/>
        <div> 

      <video width="320" height="540" controls>
         <source src="<?php echo $resultMoments; ?>" type="video/mp4">
        </video>      

   </div>

   </div>

   

  </div>
</div> <!--end of main container-->







<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- start of form update -->


        <form action="server_profile.php" method="POST" enctype="multipart/form-data">

         <div class="form-group">
         <label for="firstname">Firstname</label>
        <input type="text" class="form-control" name="updateFnames" id="updateFname"  placeholder="enter firstname" value="<?php echo $data['user_fname']; ?>">
        </div>

        <div class="form-group">
            <label for="middleName">Middle Initial</label>
            <input type="text" class="form-control" name="updateMis" id="updateMI" placeholder="enter middle initial" value="<?php echo $data['user_mname']; ?>">
        </div>

        <div class="form-group">
            <label for="middleName">Last Name</label>
            <input type="text" class="form-control" name="updateLnames" id="updateLname" placeholder="enter lastname" value="<?php echo $data['user_lname']; ?>">
        </div>

        <div class="form-group">
            <label for="contactNo">Date of Birth</label>
            <input type="date" class="form-control" id="updateContactNo" name="updateDobs" placeholder="enter dob" value="<?php echo $data['user_dob']; ?>">
        </div>

        <div class="form-group">
            <label for="middleName">Email</label>
            <input type="email" class="form-control" name="updateEmails" id="updateEmail" placeholder="enter email" value="<?php echo $data['user_email']; ?>">
        </div>

        <div class="form-group">
            <label for="middleName">Address</label>
            <input type="text" class="form-control" name="updateAddresss" id="updateAddress" placeholder="enter address" value="<?php echo $data['user_address']; ?>">
        </div>

        <div class="form-group">
        <label for="gender">Gender</label>
        <select class="form-select form-control" name="updateGenders" aria-label="Default select example">
            <option selected value="<?php echo $data['user_gender']; ?>">Open this select menu</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        </div>


         <div class="form-group">
        <label for="gender">Player Preferred Position</label>
        <select class="form-select form-control" name="playerPos" aria-label="Default select example">
            <option value="<?php echo $data['player_pos']; ?>"><?php echo $data['player_pos']; ?></option>
            <option value="PG">Point Guard</option>
            <option value="PF">Power Forward</option>
             <option value="Center">Center</option>
            <option value="SF">Small Forward</option>
            <option value="SG">Shooting Guard</option>
        </select>
        </div>


         <div class="form-group">
            <label for="contactNo">Contact No.</label>
            <input type="number" class="form-control" name="updateContactNos" id="updateContactNo" placeholder="enter contact No." value="<?php echo $data['user_contact_no']; ?>">
        </div>


         <div class="form-group">
            <label for="middleName">Update Height</label>
            <input type="text" class="form-control" name="updateHeight" id="updateMI" placeholder="enter middle initial" value="<?php echo $data['user_height']; ?>">
        </div>


        <div class="form-group">
            <label for="updateProfilePic">Upload New Profile Picture</label>
             <input type="file" name="updateProfiles" class="form-control-file" id="exampleFormControlFile1">
        </div>

              <input type="submit" name="updateSubmit" value="Submit" class="btn btn-primary">

              <!-- idno handler session  -->
              <input type="hidden" name="sesIdno" value="<?php echo $data['user_idno']; ?>" class="form-control">
        </form>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<div id="rootProfile">
    <!-- data from player_req_ses_match.php render here -->
</div>

















 <script type="text/javascript">
    

 $(function(){
 $(".main-pro-shrink").hide();
    // toggle profile 
  $("#btnProfileToggle").click(function(){

    $(".main-pro-shrink").toggle();

  });



// match request
  $("#btnMatch").click(function(){

    $("#rootProfile").load("player_req_ses_match.php");

  });





// player request

  $("#btnRequest").click(function(){

    $("#rootProfile").load("player_req_ses_request.php");

  });


});


// Booking request for Court Owner
  $("#btnBooking").click(function(){

    $("#rootProfile").load("player_req_ses_booking.php");


});


$("#btnProfitReport").click(function() {
     $("#rootProfile").load("player_req_ses_profit_report.php");
});


// btnBookingPlayer CANCEL AND EDIT
$("#btnBookingPlayer").click(function() {
     $("#rootProfile").load("player_req_ses_booking_player.php");
});




// payment history
$("#btnBookingPlayerHistory").click(function() {
     $("#rootProfile").load("player_req_ses_booking_player_history.php");
});


$("#btnPaymentHistory").click(function() {

    $("#rootProfile").load("payment_history_ses_state.php");

});


$("#btnRecruitInvites").click(function() {
    $("#rootProfile").load("player_invites_ses_state.php");
});


// BTN MY TEAM
$("#btnMyTeam").click(function() {
    $("#rootProfile").load("myTeam_ses_state.php");
});


 
const profileUserType = '<?php echo $sesUserType; ?>';

if (profileUserType == 'court_owner') {
     $(".co-hide").hide();
} else if(profileUserType == 'player') {
    $(".pl-hide").hide();
}


let coContainer = document.getElementById("co-container");
const sesUserTypeProof = "<?php echo $sesUserType; ?>";
if(sesUserTypeProof == 'court_owner') {
    coContainer.style.display = "none";
}


 </script>



<?php include 'inc/footer.php'; ?>
