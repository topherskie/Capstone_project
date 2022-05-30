<?php 
require "configs/db.php";
require "configs/server.php"; 

// INSERT STATUS TO CM MATCH
$matchCmIdno = '';
$cmAfullname = '';
$sesAfullname = '';
$reAemail = '';
if(isset($_POST['btnAcceptMatch'])) {

	$matchCmIdno = $_POST['matchCmIdno'];
    $cmAfullname = $_POST['cmAfullname'];
    $sesAfullname = $_POST['sesAfullname'];
    $reAemail = $_POST['reAemail'];

	$sqlCmInsert = "UPDATE casual_matches SET match_status='Accept' WHERE cm_idno='$matchCmIdno'";

if (mysqli_query($conn, $sqlCmInsert)) {
 // echo "New record created successfully";
  //header("location: profile_ses_state.php");
} else {
  echo "Error: " . $sqlCmInsert . "<br>" . mysqli_error($conn);
}


$updateMatchRequester = "UPDATE match_requesters SET mr_status='Accept' WHERE cm_idnos='$matchCmIdno'";
if (mysqli_query($conn, $updateMatchRequester)) {
  //echo "New record created successfully";
  // header("location: profile_ses_state.php");
} else {
  echo "Error: " . $sqlCmInsert . "<br>" . mysqli_error($conn);
}



} // end of main container



// remove request or deny it 

// header("location: profile_ses_state.php"); sue thjis after deelete



 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Accept Match</title>
 	<script src="https://smtpjs.com/v3/smtp.js"></script>

  <style type="text/css">
    * {
    margin: 0;
    padding: 0;
}

body {
    background-color: #001d3d;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}

div {
    display: inline-block;
    background-color: white;
    border-radius: 50%;
    padding: 0.2rem;
    width: 0.6rem;
    height: 0.6rem;
    margin: 0px;
}

#first {
    margin-left: 12px;
    transform-origin: top right;
    animation: swing-left 1.2s infinite ease-in-out;

}

#third {
    transform-origin: top left;
    animation: swing-right 1.2s infinite ease-in-out;
}


#loading {
    width: 100px;
    font-size: 2rem;
    color: white;
    font-family: Bebas Neue;
}

#title {
    display: block;
}


@keyframes swing-left {

    0%,
    100% {
        transform: rotate(45deg);
    }

    35% {
        transform: rotate(0deg);
    }

    80% {
        transform: rotate(0deg);

    }

}

@keyframes swing-right {

    0%,
    100% {
        transform: rotate(0deg);
    }

    35% {
        transform: rotate(-45deg);
    }

    60% {
        transform: rotate(-45deg);

    }

}
  </style>
 </head>
 <body>
 
<section id="loading">
        <div id="first"></div>
        <div id="second"></div>
        <div id="third"></div>
        <span id="title">Loading</span>
    </section>





 

 <script type="text/javascript">
const cmAfullname = "<?php echo $cmAfullname; ?>";
const sesAfullname = "<?php echo $sesAfullname; ?>";
const reAemail = "<?php echo $reAemail; ?>";


let bodyMsg = `Hello ${sesAfullname} your match request has been Accepted by Player ${cmAfullname}`;
console.log(cmAfullname);
console.log(sesAfullname);
console.log(reAemail);
    
sendDeclineMsg();


function sendDeclineMsg() {
    Email.send({
    Host : "smtp.elasticemail.com",
    Username : "tophersanchez777@gmail.com",
    Password : "E51A979BF7F40C7BC792FD2D7EEEA1BC8C2E",
    To : reAemail,
    From : "tophersanchez777@gmail.com",
    Subject : "Accept Match Request",
    Body : bodyMsg,
}).then((message) => {
  console.log(message);
});

} // end if function





 	setTimeout(function (){
	window.location.href = 'profile_ses_state.php';
}, 8000)

 </script>
 </body>
 </html>