<?php
require "configs/db.php";
require "configs/server.php"; 

$mrIdno = '';
$reqEmail = '';
$sesFullname = '';
$cmFullname = '';
$cmAbout = '';
if($_GET['btnRemoveRequest']) {
$mrIdno = $_GET['mrIdno']; // mr id to delete
$reqEmail = $_GET['reqEmail']; // EMAIL TO USE FOR EMAILS 
$sesFullname = $_GET['sesFullname'];
$cmFullname = $_GET['cmFullname'];
$cmAbout = $_GET['cmAbout'];

$declineMatchReq = "DELETE FROM match_requesters WHERE mr_idno='$mrIdno'";
 if ($conn->query($declineMatchReq) === TRUE) {
  //echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
} 

} // END OF BTN remove request


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
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
const reqEmail = "<?php echo $reqEmail; ?>";
const sesFullname = "<?php echo $sesFullname; ?>";
const cmFullname = "<?php echo $cmFullname; ?>";
const cmAbout = "<?php echo $cmAbout; ?>";

let bodyMsg = `Hello ${sesFullname} your match request for has been declined by Player ${cmFullname}`;
console.log(reqEmail);
console.log(sesFullname);
console.log(cmFullname);
console.log(cmAbout);

	
sendDeclineMsg();


function sendDeclineMsg() {
	Email.send({
    Host : "smtp.elasticemail.com",
    Username : "tophersanchez777@gmail.com",
    Password : "E51A979BF7F40C7BC792FD2D7EEEA1BC8C2E",
    To : reqEmail,
    From : "tophersanchez777@gmail.com",
    Subject : "Decline Match request.",
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