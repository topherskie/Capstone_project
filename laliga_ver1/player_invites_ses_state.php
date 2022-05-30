<?php 
require "configs/db.php";
require "configs/server.php"; 
$sesUserType = $_SESSION['user_type'];
$sesUser = $_SESSION['user_username'];
$sesIdno =  $_SESSION['user_idno'];
$sesFname = $_SESSION['user_fname'];
$sesLname = $_SESSION['user_lname'];


// RENDER DATA
$sqlPlayInvites = "SELECT * FROM recruit_inivites WHERE player_idno='$sesIdno'";
$resultPlayInvites = mysqli_query($conn, $sqlPlayInvites);





// update ACCEPT
if(isset($_POST['btnAcceptInvite'])) {

    $txtRidno = $_POST['txtRidno'];
    $txtPidno = $_POST['txtPidno'];

    $sqlupdateInvite = "UPDATE recruit_inivites SET invite_status='accept' WHERE recruit_idno='$txtRidno'
    AND player_idno='$txtPidno'";

    if ($conn->query($sqlupdateInvite) === TRUE) {
    echo "Record updated successfully";
    header("Location: profile_ses_state.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

} // END OF ACCEPT INVITE

 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Player Invites</title>
    <style type="text/css">
        .main-invites-container {
            display:  flex;
            
        }

    @media only screen and (max-width: 700px) {
    .main-invites-container  {
    display:inline-block;
    width: 50%;
    margin: auto;
    }
}

    </style>
 </head>
 <body>
     
 	<div>Player invites</div>
 

<div class="main-invites-container">   

<?php while($rowInvites = $resultPlayInvites->fetch_assoc()): ?>
<br>
<?php if($rowInvites['invite_status'] == 'pending'): ?>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://graphicriver.img.customer.envatousercontent.com/files/321264849/preview.jpg?auto=compress%2Cformat&fit=crop&crop=top&w=590&h=590&s=fa7fb4cd174a51b4dddce3136c3c94a2" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">You have been pick!</h5>
    <p class="card-text">This is an invite from another player scout to join him as a player. you can either play casually or get envolved with tournaments</p>

    <p>Click the link to check recruiter information</p>
    <form method="POST" action="checkBio_recruit_ses_state.php">
    <input type="hidden" name="txtRidno" value="<?php echo $rowInvites['recruit_idno']; ?>">   
    <input type="submit" name="btnCheckBio" class="btn btn-primary" value="Recruit Bio">
    </form>
    <form method="POST" action="player_invites_ses_state.php" >
        <input type="hidden" name="txtRidno" value="<?php echo $rowInvites['recruit_idno']; ?>">
         <input type="hidden" name="txtPidno" value="<?php echo $rowInvites['player_idno']; ?>">
        <input type="submit"  name="btnAcceptInvite" class="btn btn-outline-primary" value="Accept">
    </form>
    
    <form action="player_declineInvites_ses_state.php" method="GET">
        <input type="text" name="txtRequesterEmails" value="<?php echo $rowInvites['requester_email']; ?>">
        <input type="text" name="txtsesEmails" value="<?php echo $rowInvites['ses_email']; ?>">
        <input type="text" name="txtInviteIdno" value="<?php echo $rowInvites['invite_idno']; ?>">
        <input type="submit"  name="btnDeclineInvite" class="btn btn-outline-primary" value="Decline">
    </form>
  </div>
</div>
<?php elseif($rowInvites['invite_status'] == 'decline'): ?>
<?php endif; ?>


<?php endwhile; ?>


</div> <!-- end of main container -->





 </body>
 </html>