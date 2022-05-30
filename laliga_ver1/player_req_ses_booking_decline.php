<?php 

include "configs/db.php";

// DECLINE BOOKING EVENT
$bookDecline = 'decline';
$resultEmailReserveCO = '';

$resCourtName = '';
$totalPayment = '';
if(isset($_POST['btnDecline'])) {
$bookStatus = $_POST['bookStatus'];
$bookResIdno = $_POST['bookResIdno'];
$bookUserIdno = $_POST['bookUserIdno'];
$resCourtName = $_POST['resCourtName'];
$totalPayment = $_POST['totalPayment'];
// query email to user 
$queryEmailCO = "SELECT requester_reserve_email, court_owner_email FROM reservations_data WHERE res_idno='$bookResIdno'";
$queryEmailReserveRequestCO = mysqli_query($conn, $queryEmailCO);
$resultEmailReserveCO = mysqli_fetch_assoc($queryEmailReserveRequestCO);
 $resultEmailReserveCO['requester_reserve_email'];
$resultEmailReserveCO['court_owner_email'];



$sqlUpdateStatusRes = "UPDATE reservations_data_history  set res_status='$bookDecline' 
WHERE res_idno='$bookResIdno' AND user_idno='$bookUserIdno'";

if ($conn->query($sqlUpdateStatusRes) === TRUE) {
  //echo "Record updated successfully";

 $sqlDeleteRes = "DELETE FROM reservations_data WHERE res_idno='$bookResIdno' AND user_idno='$bookUserIdno'";
 $conn->query($sqlDeleteRes);

} else {
  echo "Error updating record: " . $conn->error;
}


} // end of main IF ELSE


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Decline</title>
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
const resultEmailReserveCOCO = "<?php echo $resultEmailReserveCO['court_owner_email']; ?>";
const resultEmailReserveCO = "<?php echo $resultEmailReserveCO['requester_reserve_email']; ?>";
console.log(resultEmailReserveCO);
const resCourtName = "<?php echo $resCourtName; ?>"; 
const totalPayment = "<?php echo $totalPayment; ?>";
const msgBookDecline = `
<h4>Laliga Pilipinas</h4>
    <br>
     <img src='https://cdn.pixabay.com/photo/2019/06/10/15/11/basketball-4264543__480.png' alt='basketball logo'>
    <p>Hello! Basketball booking request has been successfully declined, Court name: ${resCourtName}, Total payment ${
     totalPayment   
 } Thank you.</p>

`;


console.log(resCourtName);

console.log(totalPayment);
console.log(resultEmailReserveCOCO);
 function bookDecline() {

    Email.send({
    Host : "smtp.elasticemail.com",
    Username : "tophersanchez777@gmail.com",
    Password : "E51A979BF7F40C7BC792FD2D7EEEA1BC8C2E",
    To : resultEmailReserveCO,
    From : "tophersanchez777@gmail.com",
    Subject : "Booking Declined",
    Body : msgBookDecline
}).then((message) => {
    console.log(message)
})

} // end of requesterEmail



 function bookDeclineCOCO() {

    Email.send({
    Host : "smtp.elasticemail.com",
    Username : "tophersanchez777@gmail.com",
    Password : "E51A979BF7F40C7BC792FD2D7EEEA1BC8C2E",
    To : resultEmailReserveCOCO,
    From : "tophersanchez777@gmail.com",
    Subject : "Booking Declined",
    Body : msgBookDecline
}).then((message) => {
    console.log(message)
})

} // end of requesterEmail








// invoked func
bookDecline();
bookDeclineCOCO();


      setTimeout(function() {
         window.location.href = `post_court_ses_state.php`;
      },6000)
    </script>
 </body>
 </html>