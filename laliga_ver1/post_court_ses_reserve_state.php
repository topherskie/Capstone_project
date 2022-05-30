<?php include 'configs/db.php'; ?>
<?php 
date_default_timezone_set("Asia/Singapore");
   //$sesIdno . "<BR>";
 // $sesUser . "<BR>";;
  //$sesUserType . "<BR>";
  //$sesFname . ' ' . $sesLname;

  $resRevenue = '';
  $reserveRequesterEmail = '';
  $courtOwnerEmail = '';
  $resRevenuePercentage = 0.05;
  $reserveRequesterEmail = '';
  if(isset($_POST['btnCLreserve'])) {

  	$currentBCidno = $_POST['currentBCidno']; // idno of the Court post
  	$currentIdnoOwner = $_POST['currentIdnoOwner']; // idno of court owner
  	$currentIdnoSession = $_POST['currentIdnoSession']; // current session
	$currentCourtRate = $_POST['currentCourtRate'];
	$currentBcAddress = $_POST['currentBcAddress'];
	$currentBcName = $_POST['currentBcName'];

    $reserveRequesterEmail = $_POST['reserveEmail'];

  	// DATE AND TIME
  	$bcDate = $_POST['bcDate'];
  	$bcStartTime = $_POST['bcStartTime'];
  	$bcEndTime = $_POST['bcEndTime'];
  	$diff = abs((strtotime($bcStartTime))-(strtotime($bcEndTime)));
	$duration = floor($diff/60);  		
	$totalPayment = (($currentCourtRate / 60) * $duration);

  $totalRev = $totalPayment * $resRevenuePercentage;

	// get total hrs combine from start to end time
	$totalDuration = $duration / 60;
 // echo $currentIdnoOwner;

	// echo "<br>";
 //  	echo $currentBCidno ;
 //  	echo "<br>";
 //  	echo $currentIdnoOwner;
 //  	echo "<br>";
 //  	echo $currentIdnoSession;
	// echo "<br>";	
 //  	echo "Date: " . $bcDate;
 //  	echo "<br>";	
 //  	echo "Start time: " . $bcStartTime;
 //  	echo "<br>";
 //  	echo "End time: " . $bcEndTime;
 //  	echo "<br>";
 //  	echo round($totalPayment);
 //  	echo "<br>";
 //  	echo "Duration: ". $totalDuration;

// query the user email of court owner 
$sqlCourtOwnerEmail = "SELECT user_email FROM user WHERE user_idno='$currentIdnoOwner'";
$queryCourtOwnerEmail = mysqli_query($conn, $sqlCourtOwnerEmail);
$resultCourtOwnerEmail = mysqli_fetch_assoc($queryCourtOwnerEmail);
$courtOwnerEmail = $resultCourtOwnerEmail['user_email'];


$reservePending = 'pending';
$sqlInsertReservation = "INSERT INTO reservations_data 
(bc_idno, co_idno, user_idno, res_date, res_start_time, res_end_time, res_total_payment, res_hrs_duration, res_status, res_address, res_courtname, res_revenue, requester_reserve_email, court_owner_email)
VALUES('$currentBCidno', '$currentIdnoOwner', '$currentIdnoSession', '$bcDate', '$bcStartTime', '$bcEndTime', '$totalPayment', '$totalDuration', '$reservePending', '$currentBcAddress', '$currentBcName', '$totalRev', '$reserveRequesterEmail', '$courtOwnerEmail')
";


// do a check if time exist
$sqlCheckReserve = "SELECT * FROM reservations_data WHERE res_start_time='$bcStartTime' AND bc_idno='$currentBCidno'";
$resultCheckReserve = mysqli_query($conn, $sqlCheckReserve);


if(mysqli_num_rows($resultCheckReserve)) {

	//echo "DATA IS PRESENT";

} else {

	if ($conn->query($sqlInsertReservation) === TRUE) {
		 // echo "New record created successfully";
	  } else {
  		 echo "Error: " . $sqlInsertReservation . "<br>" . $conn->error;
	 }

} // end of else





  
   





  } // END OF MAIN IF STMT




 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title></title>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
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

        const reserveRequesterEmail = "<?php echo $reserveRequesterEmail; ?>";
        const courtOwnerEmail = "<?php echo $courtOwnerEmail; ?>";

console.log(reserveRequesterEmail);
console.log(courtOwnerEmail);


let requesterEmail = `
<div>
    <h4>Laliga Pilipinas</h4>
    <br>
     <img src='https://cdn.pixabay.com/photo/2019/06/10/15/11/basketball-4264543__480.png' alt='basketball logo'>
    <p>You have successfully book a court, please keep your email notification active. Thank you.</p>
<div>
`;



async function requesterEmailFunc() {

    Email.send({
    Host : "smtp.elasticemail.com",
    Username : "tophersanchez777@gmail.com",
    Password : "E51A979BF7F40C7BC792FD2D7EEEA1BC8C2E",
    To : reserveRequesterEmail,
    From : "tophersanchez777@gmail.com",
    Subject : "Basketball booking court",
    Body : requesterEmail
}).then((message) => {
    console.log(message)
})

} // end of requesterEmail




let courtOwnerMsg = `
    <div>
    <h4>Laliga Pilipinas</h4>
    <br>
    <img src='https://cdn.pixabay.com/photo/2019/06/10/15/11/basketball-4264543__480.png' alt='basketball logo'>
    <p>A player wanted to book a court please check your booking tab. Thank you. </p>
    </div>
`;


async function courtOwnerEmailFunc() {

   Email.send({
    Host : "smtp.elasticemail.com",
    Username : "tophersanchez777@gmail.com",
    Password : "E51A979BF7F40C7BC792FD2D7EEEA1BC8C2E",
    To : 'gotopherskie@gmail.com',
    From : "tophersanchez777@gmail.com",
    Subject : "Basketball booking request",
    Body : courtOwnerMsg
}).then((message) => {
    console.log(message)
});


} // courtOwnerEmail







// excute the email
requesterEmailFunc()
 courtOwnerEmailFunc();


      setTimeout(function() {
         window.location.href = `profile_ses_state.php`;
      }, 7000);
    </script>
 </body>
 </html>
 