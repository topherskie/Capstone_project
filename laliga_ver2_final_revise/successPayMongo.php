<?php require 'inc/header_ses.php'; ?>

<?php 	

$userIdno;
$userName;
$userType;

// query first the first payment
$sqlPayDetails = "SELECT * FROM payment_tracker WHERE user_id='$userIdno' AND payment_status='pending'";
$resultPay = mysqli_query($conn, $sqlPayDetails) or die( mysqli_error($conn));
$resultPayData = mysqli_fetch_array($resultPay);

$resultPayIdno = $resultPayData['payment_id'];
$resultPayData['payment_status'];
 $resultPayData['user_id'];
//$_SESSION["currentPayIdno"] = $resultPayData['payment_id'];

// AFTER ROUTED  SUCCESSFUL PAYMENT USER STATUS WILL BE UPDATED TO SUCCESS FROM PENDING
$payStatus = 'success';
$sqlPayStatusUpdate = "UPDATE payment_tracker SET payment_status='success' WHERE user_id='$userIdno' AND payment_id='$resultPayIdno'";

if ($conn->query($sqlPayStatusUpdate) === TRUE) {
   //$_SESSION["currentPayIdno"] = $resultPayData['payment_id'];
  //echo "Record updated successfully";

} else {
  echo "Error updating record: " . $conn->error;
}



// update profile paid

$sqlSubs = "UPDATE users SET user_subs='paid' WHERE user_id='$userIdno'";
if ($conn->query($sqlSubs) === TRUE) {
  //echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}


 ?>


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
      .paymongo-container {
        text-align: center;
        width:  50%;
        margin:  auto;
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
      }
    </style>


</head>
<body>
   <br>
    <br>
   <div class="paymongo-container">
   	<br>
      <h4>Success Payment</h4>

    <a href="scout_player_ses.php" class="btn btn-outline-success">Go back to start recruting players</a>

<form action="https://formsubmit.co/7ed267517bd638385b078186d77dae0c" method="POST">
     <input type="hidden" name="name" required>
     <input type="hidden" name="email" required>
     <input type="hidden" name="_cc" value="techtofer@gmail.com">
     <!-- <button type="submit">Send</button> -->
</form>
   </div>

    <script type="text/javascript">

  /*
    var idr = '<?php //echo $id; ?>';
    var datar = <?php //echo json_encode($data); ?>;

  */

const sesIdno = '<?php echo $userIdno; ?>';

console.log(sesIdno);

const options = {
  method: 'GET',
  headers: {
    Accept: 'application/json',
    Authorization: 'Basic c2tfdGVzdF9OTmpmenMyZkZLZ3AxSnJWbnJqR001ZlY6'
  }
};

fetch('https://api.paymongo.com/v1/webhooks', options)
  .then(response => response.json())
  .then((response) => {
    console.log(response)
    // sample call
    console.log(response.data[0].attributes.events[2]);

  })
  .catch(err => console.error(err));



let currentDate = new Date().toISOString().slice(0, 10);
console.log(currentDate);



// post data into database



// CREATE SET TIMEOUT TO ROUTE MEMBER TO THE UPGRADED VERSION OF THE PAGES
// delay a seconds to display success window
 window.setTimeout(function() {
    window.location = 'scout_player_ses.php';
  }, 4000);

 </script>
</body>
</html>
