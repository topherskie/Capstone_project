<?php include 'inc/header_login_state.php'; ?>
<?php

$sesUserType = $_SESSION['user_type'];
$sesUser = $_SESSION['user_username'];
$sesIdno =  $_SESSION['user_idno'];
$sesFname = $_SESSION['user_fname'];
$sesLname = $_SESSION['user_lname'];

 $sesIdno;
$sesUser;
$sesUserType;




$user_idno = '';
 $co_idno = '';
 $booking_idno = '';
 $payment_type = '';
 $purpose = '';
 $paybook_amount = '';
 $payment_status = '';
 $txtReqName = '';

$resultEmailReserve = '';
// DATA FOR PAYMENT POST
if(isset($_POST['btnAcceptBook'])) {
 $user_idno = $_POST['bookUserIdno'];
 $co_idno = $_POST['bookCOidno'];
 $booking_idno = $_POST['bookResIdno'];
 $payment_type = "gcash";
 $purpose = "Court Booking";
 $paybook_amount = $_POST['bookTotalPay'];
 $payment_status = 'pending';
 $txtReqName = $_POST['txtReqName'];

 "<br>";
 $user_idno;
 $co_idno;
$booking_idno;
 $payment_type = "gcash";
 $purpose = "Court Booking";
$paybook_amount;
 $payment_status;


 $booking_idno;

$queryEmail = "SELECT requester_reserve_email FROM reservations_data WHERE res_idno='$booking_idno'";
$queryEmailReserveRequest = mysqli_query($conn, $queryEmail);
$resultEmailReserve = mysqli_fetch_assoc($queryEmailReserveRequest);
 $resultEmailReserve['requester_reserve_email'];


} // end if main btnAcceptBook





 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Book Court Bridge</title>
   <script src="https://smtpjs.com/v3/smtp.js"></script>
  <style type="text/css">
    .paybook-container {
      width: 50%;
      margin: auto;
      padding:  12px;
      box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    }

    @media only screen and (max-width: 600px) {
  .paybook-container {
     width: 100%;
      margin: auto;
  }
} /* end of media queries */
  </style>
 </head>
 <body>



<div class="paybook-container">
<div class="form-control">
    <h4>Click confirm to generate payment link to the user.</h4>
  <h4>Confirm booking for User: <?php echo $txtReqName; ?></h4>
  
  <h4>Total amount to pay: <?php  echo "PHP " . $paybook_amount; ?></h4>
  <button id="btnCreatePaymentSource" class="btn btn-outline-success">Confirm</button>
</div>
</div>













 <script type="text/javascript">

const user_idno = '<?php echo $user_idno; ?>';
const co_idno = '<?php echo $co_idno; ?>';
const booking_idno = '<?php echo $booking_idno; ?>';
let payment_type = '<?php echo $payment_type; ?>';
const purpose = '<?php echo $purpose; ?>';
const paybook_amount = '<?php echo $paybook_amount; ?>';
const payment_status =  '<?php echo $payment_status; ?>';


// remove the dot and add to paymongo BODY
let toIntAmount = parseInt(paybook_amount);
const fixDigits = toIntAmount.toFixed(2);
checkedNewAmount = fixDigits.replace(/\./g, "");
const resultIntAmount = parseInt(checkedNewAmount);
console.log(typeof resultIntAmount);

    // payment JS script
const btnCreatePaymentSource = document.getElementById("btnCreatePaymentSource");


btnCreatePaymentSource.addEventListener("click", paymentHandler);










 // EVENT FUNCTION
 function paymentHandler() {
  console.log('user click!');

const options = {
  method: 'POST',
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json',
    Authorization: 'Basic cGtfdGVzdF9kN3I3ckNkZHpXY0VBQ1pWa01KVW1qQlc6'
  },
  body: JSON.stringify({
    data: {
      attributes: {
        amount: resultIntAmount,
        redirect: {
          success: 'http://localhost/0_capstone/laliga_pilipinas_ver1/successPayMongoBook.php',
          failed: 'http://localhost/0_capstone/laliga_pilipinas_ver1/failedPayMongoBook.php'
        },
        type: 'gcash',
        currency: 'PHP'
      }
    }
  })
};


const payInfo = document.getElementById("payInfo");
// PAYMONGO PAYMENT API GCASH
fetch('https://api.paymongo.com/v1/sources', options)
  .then(response => response.json())
  .then((response) => {

    console.log(response);
    console.log(response.data.attributes.redirect.checkout_url);
    //window.open(response.data.attributes.redirect.checkout_url);


    retrieveCurrentSource(response.data.attributes.redirect.checkout_url);
  })
  .catch(err => console.error(err));




  function retrieveCurrentSource(source) {

const options = {
  method: 'POST',
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json',
    Authorization: 'Basic c2tfdGVzdF9OTmpmenMyZkZLZ3AxSnJWbnJqR001ZlY6'
  },
  body: JSON.stringify({
    data: {
      attributes: {
        events: ['source.chargeable', 'payment.paid', 'payment.failed'],
        url: source
      }
    }
  })
};

fetch('https://api.paymongo.com/v1/webhooks', options)
  .then(response => response.json())
  .then((response) => {

  $(document).ready(function(){




//let currentDate = new Date().toLocaleDateString()
let currentDate = new Date().toISOString().slice(0, 10);

    $.post("paymongo_booking_server.php", {

        user_idno: user_idno,
        co_idno: co_idno,
        booking_idno: booking_idno,
        paymentSource: source,
        payment_type: 'gcash',
        purpose: purpose,
        paybook_amount: paybook_amount,
        payment_status: 'pending',

      },
      function(data, status){
       alert("Data: " + data + "\nStatus: " + status);
         setTimeout(function() {
         window.location.href = `profile_ses_state.php`;
      },3000)
      });

});

  })
  .catch(err => console.error(err));
} // end of fnuction

//https://test-sources.paymongo.com/sources?id=src_vbBMRWcJKDC7rbtZAjrecJfY


// update the state of the page
// setTimeout(() => {
//   location.reload();
// }, 1000);
} // end of event btnPay handler




// send confirmation email
 let resultEmailReserve = "<?php echo $resultEmailReserve['requester_reserve_email']; ?>";


console.log(resultEmailReserve);
const msgToPlayer = `
  <h4>Laliga Pilipinas</h4>
    <br>
     <img src='https://cdn.pixabay.com/photo/2019/06/10/15/11/basketball-4264543__480.png' alt='basketball logo'>
    <p>Hello! your basketball booking request has already been accepted by the court owner total payment amount is PHP ${paybook_amount} please login to confirm your payment. Thank you!</p>
`;



async function confirmPayment() {

    Email.send({
    Host : "smtp.elasticemail.com",
    Username : "tophersanchez777@gmail.com",
    Password : "E51A979BF7F40C7BC792FD2D7EEEA1BC8C2E",
    To : resultEmailReserve,
    From : "tophersanchez777@gmail.com",
    Subject : "Payment Confirmation",
    Body : msgToPlayer
}).then((message) => {
    console.log(message)
})

} // end of requesterEmail



// invoke function 
confirmPayment();

</script>
 </body>
 </html>
