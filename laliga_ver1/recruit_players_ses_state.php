<?php include 'inc/header_login_state.php'; ?>
<?php 
  
    $sesIdno . "<BR>";
  $sesUser . "<BR>";;
    $sesUserType . "<BR>";
   $sesUserEmail;
 
  // query data and check if user is subscribe
  $sqlCheckData = "SELECT * FROM payment_tracker WHERE user_idno='$sesIdno'"; 
  $resultCheckUser = mysqli_query($conn, $sqlCheckData) or die( mysqli_error($conn));
  $resultUserStatus = mysqli_fetch_array($resultCheckUser);

  // state variables
  $payMethod = '';

  // hide and show div state
  $divState = '';

  $statusPay = $resultUserStatus['payment_status'] ?? null; // fix the null issue state

  if($statusPay  == 'success') {
     $payDetail ='';
    $payMethod = "pay-success-container";
    $divState = 'show-div';
    
  }else if ($statusPay == 'pending') {
    $payDetail = 'Waiting for payment to process, please complete the payment from the other page.';
    $payMethod = "pay-success-container"; 
    $divState = 'hide-div';

  }else if ($statusPay == 'failed') {
     $payDetail ='';
    $payMethod = "pay-failed-container"; 
    $divState = 'hide-div';

  } else if($statusPay == null) {
    $payDetail ='';
    $payMethod = "pay-failed-container"; 
    $divState = 'hide-div';

  }





// render all data from Players
$sqlQueryPlayers = "SELECT * FROM user WHERE user_type='player'";
$queryPlayer = mysqli_query($conn, $sqlQueryPlayers) or die( mysqli_error($conn));
// continuation under while loop to render data


// alert state
$alertRecruit = '';








 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recruit Player</title>
    <style type="text/css">
      .pay-success-container {
        display: none;
      }

      .pay-failed-container {
        display:  block;
      }

      /*alter div base on the php condition hide certain div according to user state*/
      .hide-div {
        display:  none;
      }

      .show-div {
        display:  block;
      }


      .player-render-container {
        
        padding: 4px;
        margin: auto;
        border-radius: .5em;
        width: 75%;
        text-align: center;
        box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;

      }

      .imgP-size {
        border-radius: 50%;
        width: 5em;
        height:5em;
        margin:  5px;
        padding: 5px;

      }

      .img-container {
        display: block;
      }

      .form-sub-container {
        width: 50%;
        margin: auto;
        padding: 8px;
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
      } 

      .pay-sub {
        color: #0AA1DD;
      }

      .recruit-container {
        width: 50%;
        margin: auto;
      }

      .alert-container {
        text-align: center;
      }

      .payInfo-design {
        color: gray;
        width: 50%;
        margin: auto;
        text-align: center;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
      }

      @media only screen and (max-width: 600px) {
  .recruit-container {
        width: 100%;
        margin: auto;
      }

      .payInfo-design {
        width: 100%;
        margin: auto;
        text-align: center;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
      }
      
}


    </style>
</head>
<body>

<div id="payInfo" class="payInfo-design">
  <h5><?php echo $payDetail; ?></h5>
</div>
  

<div class="<?php echo $payMethod . ' ' . 'form-sub-container'; ?>">
  <div><h5 class="pay-sub">Your not yet Subscribe, for only Php 125.00 you can recruit a player.</h5></div>
  <button id="btnPay" class="btn btn-outline-primary">Pay PHP 125.00</button>
</div>
  
  <div class="alert-container alert alert-danger alert-data">
    <div><h4><?php echo $alertRecruit; ?></h4></div>
  </div>

  <div class="<?php echo $divState; ?>">
  <div class="recruit-container">
     <form method="GET" action="recruit_players_search_ses_state.php" class="form-control">
      <div class="input-group">
      <input type="text" name="txtSearchPlayers" placeholder="search.." class="form-control rounded">
      <input type="submit" name="btnSearchPlayer" value="Search" class="btn btn-outline-primary">
    </form>
    </div>
  </div>


  <br>

  <div class="render-player-container">
  <?php 

  while ($playerRows = $queryPlayer->fetch_array()) {
     $datetime1 = date_create($playerRows['user_dob']);
            $datetime2 = date_create('2022-05-13');
             $interval = date_diff($datetime1, $datetime2);
             

   if($playerRows['user_idno'] != $sesIdno) {

    $playerImg = "img_profiles/" . $playerRows['img_profile'];
    $playerHighLights = "hl_moments/" . $playerRows['hl_moments'];
    $player_name = $playerRows['user_fname'] . ' ' . $playerRows['user_lname'];

    echo '<br>';
    echo "<div class='player-render-container'>";
    echo "Player height {$playerRows['user_height']} cm, Position: {$playerRows['player_pos']}";
    echo "<a href='portfolio_ses_state.php?pUserIdno={$playerRows['user_idno']}'><p>Porfolio: " . $playerRows['user_fname'] . ' ' . $playerRows['user_lname'] . "</p></a>";
    echo "<p>{$interval->format('%R%y years')}</p>";
    echo "<p>" . $playerRows['user_email'] . ' ' . $playerRows['city'] . "</p>";
    echo "<div class='img-container'>";
    echo "<img src='{$playerImg}' alt='Player Profile' class='imgP-size'>";
    echo "</div>";

    echo "<video width='320' height='540' controls>";
    echo "<source src='{$playerHighLights}' type='video/mp4'>";
    echo "</video>";

    
    echo "<br>";
    echo "<input type='hidden' value='Message' id='btnMsgPlayer' class='btn btn-outline-primary'>";
    
    echo "<form action='recruit_players_ses_state_sendMail.php' method='POST'>";
    echo "<input type='hidden' name='txtRecruitIdno' value='{$sesIdno}'>";
    echo "<input type='hidden' name='txtPlayerIdno' value='{$playerRows['user_idno']}'>";
    echo "<input type='hidden' name='txtPlayerName' value='{$player_name}'>";
    echo "<input type='hidden' name='requesterEmail' value='{$playerRows['user_email']}'>";
    echo "<input type='hidden' name='sesEmail' value='{$sesUserEmail}'>";
    echo "<input type='submit' value='Send Invite' name='btnInvite' class='btn btn-outline-primary'>";
    echo "</form>";
    echo "</div>";





   } // end of if 


  } // end of while loop





   ?>  


  </div>


</div> <!-- end of div $divState -->




<script type="text/javascript">

 /*
    var idr = '<?php //echo $id; ?>';
    var datar = <?php //echo json_encode($data); ?>;

  */    


  const alertData = document.querySelector(".alert-data"); 
 

setTimeout(function() {
  alertData.style.display = "none";
}, 3000);






// edit this route payment to paymongo insert


  // payment JS script
const btnPay = document.getElementById("btnPay");


btnPay.addEventListener("click", paymentHandler);










 // EVENT FUNCTION
 function paymentHandler() {
  
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
        amount: 12500,
        redirect: {
          success: 'http://localhost/0_capstone/laliga_pilipinas_ver1/successPayMongo.php',
          failed: 'http://localhost/0_capstone/laliga_pilipinas_ver1/failedPayMongo.php'
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
    window.open(response.data.attributes.redirect.checkout_url);


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
const sesIdno = '<?php echo $sesIdno; ?>';
const sesUser = '<?php echo $sesUser; ?>';




//let currentDate = new Date().toLocaleDateString()
let currentDate = new Date().toISOString().slice(0, 10)

    $.post("paymongo_server.php", {

        userPayIdno: sesIdno,
        userPayses: sesUser,
        paymentSource: source,
        paymentType: 'gcash',
        paymentAmount: 125,
        dateStarted: currentDate,
        paymentStatus: 'pending',
        subscriptionDuration: 30
        
      },
      function(data, status){
       alert("Data: " + data + "\nStatus: " + status);
      });

});

  })
  .catch(err => console.error(err));
} // end of fnuction

//https://test-sources.paymongo.com/sources?id=src_vbBMRWcJKDC7rbtZAjrecJfY


// update the state of the page
setTimeout(() => {
  location.reload();
}, 1000);
} // end of event btnPay handler



</script>
</body>
</html>

<!--basic Html format standard...-->





<?php include 'inc/footer.php'; ?>
