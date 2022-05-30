<?php 
require 'configs/db.php';


// RECRUIT PLAYER PART
$requesterEmail = '';
$sesEmail = '';
if(isset($_POST['btnInvite'])) {
$txtRecruitIdno = $_POST['txtRecruitIdno'];
$txtPlayerIdno = $_POST['txtPlayerIdno'];
$txtPlayerName = $_POST['txtPlayerName'];
$inviteStatus = "pending";
$requesterEmail = $_POST['requesterEmail'];
$sesEmail = $_POST['sesEmail'];
// echo $txtRecruitIdno;
// echo $txtPlayerIdno;
// echo $txtPlayerName;
 $requesterEmail;

$sqlCheckRecruit = "SELECT * FROM recruit_inivites WHERE recruit_idno='$txtRecruitIdno' AND player_idno='$txtPlayerIdno'";
$resultCheckRecruit = $conn->query($sqlCheckRecruit);

if ($resultCheckRecruit->num_rows > 0) {
  echo 'Sorry Invites can only be sent once';
} else {
   
   $sqlInvitePlayer = "INSERT INTO recruit_inivites (recruit_idno, player_idno, player_name, invite_status, requester_email, ses_email) VALUES ('$txtRecruitIdno', '$txtPlayerIdno', '$txtPlayerName', '$inviteStatus', '$requesterEmail',  '$sesEmail')";


   if ($conn->query($sqlInvitePlayer) === TRUE) {
     // echo "New record created successfully";
    } else {
      echo "Error: " . $sqlInvitePlayer . "<br>" . $conn->error;
    }



} // END OF CHECKING IF ELSE


} // end of invites

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Send mail</title>
	<script src="https://smtpjs.com/v3/smtp.js">
</script>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

body {
    font-family: 'Roboto', sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #151b29;
    margin: 0;
    padding: 0;
}

div {
    text-align: center;
    color: #151b29;
    margin: 2.5rem;
    display: inline-block;
    width: 20px;
    height: 20px;
    background-color: #fff;
    border-radius: 50%;
    animation: grow ease-in-out 1.6s infinite;
}

@keyframes grow {

    0%,
    100% {
        transform: scale(0.2);
    }

    20% {
        transform: scale(2);
    }
}

div:nth-of-type(1) {
    animation-delay: 0.4s;
    background: #fbf8cc;

    box-shadow: -2px 1px 30px 3px #fbf8cc65;
    -webkit-box-shadow: -2px 1px 30px 3px #fbf8cc65;
    -moz-box-shadow: -2px 1px 30px 3px #fbf8cc65;
}

div:nth-of-type(2) {
    animation-delay: 0.6s;
    background: #ffcfd2;

    box-shadow: -2px 1px 30px 3px #fbf8cc65;
    -webkit-box-shadow: -2px 1px 30px 3px #fbf8cc65;
    -moz-box-shadow: -2px 1px 30px 3px #fbf8cc65;
}

div:nth-of-type(3) {
    animation-delay: 0.8s;
    background: #f1c0e8;

    box-shadow: -2px 1px 30px 3px #fbf8cc65;
    -webkit-box-shadow: -2px 1px 30px 3px #fbf8cc65;
    -moz-box-shadow: -2px 1px 30px 3px #fbf8cc65;
}

div:nth-of-type(4) {
    animation-delay: 1s;
    background: #a3c4f3;

    box-shadow: -2px 1px 30px 3px #a3c4f365;
    -webkit-box-shadow: -2px 1px 30px 3px #a3c4f365;
    -moz-box-shadow: -2px 1px 30px 3px #a3c4f365;
}

div:nth-of-type(5) {
    animation-delay: 1.2s;
    background: #90dbf4;

    box-shadow: -2px 1px 30px 3px #90dbf465;
    -webkit-box-shadow: -2px 1px 30px 3px #90dbf465;
    -moz-box-shadow: -2px 1px 30px 3px #90dbf465;
}

div:nth-of-type(6) {
    animation-delay: 1.4s;
    background: #98f5e1;

    box-shadow: -2px 1px 30px 3px #98f5e165;
    -webkit-box-shadow: -2px 1px 30px 3px #98f5e165;
    -moz-box-shadow: -2px 1px 30px 3px #98f5e165;
}

div:nth-of-type(7) {
    animation-delay: 1.6s;
    background: #b9fbc0;

    box-shadow: -2px 1px 30px 3px #b9fbc065;
    -webkit-box-shadow: -2px 1px 30px 3px #b9fbc065;
    -moz-box-shadow: -2px 1px 30px 3px #b9fbc065;
}
	</style>
</head>
<body>

 <section>
        <div class="">L</div>
        <div class="">O</div>
        <div class="">A</div>
        <div class="">D</div>
        <div class="">I</div>
        <div class="">N</div>
        <div class="">G</div>
    </section>



<script type="text/javascript">
const requesterEmail = "<?php echo $requesterEmail; ?>";		



 function invitePlayer() {

    Email.send({
    Host : "smtp.elasticemail.com",
    Username : "tophersanchez777@gmail.com",
    Password : "E51A979BF7F40C7BC792FD2D7EEEA1BC8C2E",
    To : 'tinikculture@gmail.com',
    From : "tophersanchez777@gmail.com",
    Subject : "Play Invite",
    Body : "<div><img src='https://cdn.pixabay.com/photo/2019/06/10/15/11/basketball-4264543__480.png' alt='basketball logo'><p>You got an invite, login to check the information.</p></div>"
}).then((message) => {
    console.log(message)
})

} // end of requesterEmail






// invoked function
invitePlayer();



  // const eventId = "<?php // echo $eventId; ?>";
  setTimeout(function() {
    window.location.href = `recruit_players_ses_state.php`;
  }, 7000);


</script>

</body>
</html>