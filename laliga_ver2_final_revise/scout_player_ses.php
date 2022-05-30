<?php require 'inc/header_ses.php'; ?>
<?php 

error_reporting(0);

$userIdno;
$userType;
 $userName;
$userEmail;
$userFirstname;
$userLastname;
$userAddress;
$userDob;

$userSubs = '';
// select to check if scout paid the subscription
$sqlSub = "SELECT * FROM users WHERE user_id='$userIdno'";
$sqlQuerySub = mysqli_query($conn, $sqlSub);
$resultSubs = mysqli_fetch_assoc($sqlQuerySub);

$userSubs = $resultSubs['user_subs'];


$pos = '';

$queryAvg = "";
$viewAvg = "";
// default state
$viewAvg = "SELECT * FROM player_port_avg";
$queryAvg = mysqli_query($conn, $viewAvg);


// use for address and name search
$userInfo='';
if(isset($_GET['btnSearch'])) {


$userInfo = $_GET['userInfo'];
$viewAvg = "SELECT * FROM player_port_avg WHERE avg_address LIKE '%$userInfo%' OR avg_fullname LIKE '%$userInfo%' 
OR avg_pos LIKE '%$userInfo%'";
$queryAvg = mysqli_query($conn, $viewAvg);


} // END OF SEARCH




if(isset($_GET['btnFilter'])) {
$pos = $_GET['pos'];
$ageFrom = $_GET['ageFrom'];
$ageIntFrom = intval($ageFrom);


$ageTo =  $_GET['ageTo'];
$ageIntTo = intval($ageTo);

$gamesPlayed = $_GET['gamesPlayed'];
$totalGames = intval($gamesPlayed);
 $totalGames;


$viewAvg = "SELECT * FROM player_port_avg WHERE avg_dob BETWEEN $ageIntFrom AND $ageIntTo OR games_played <= $gamesPlayed OR avg_pos IN ('$pos[0]', '$pos[1]', '$pos[2]', '$pos[3]', '$pos[4]')";
$queryAvg = mysqli_query($conn, $viewAvg);
} // END OF FILTER BTN


// $viewAvg = "SELECT * FROM player_port_avg WHERE avg_dob <= $ageInt OR avg_pos IN ('$pos[0]', '$pos[1]', '$pos[2]', '$pos[3]', '$pos[4]')";

// $viewAvg = "SELECT * FROM player_port_avg WHERE avg_pos='$pos[0]' OR avg_pos='$pos[1]' OR avg_fullname LIKE '$userInfo%'";



// POINTS
if(isset($_GET['btnPts'])) {
$gamesPlayed = $_GET['gamesPlayed'];
$viewAvg = "SELECT * FROM player_port_avg ORDER BY avg_pts DESC";
$queryAvg = mysqli_query($conn, $viewAvg);

} // btnPts


if(isset($_GET['btnReb'])) {
$viewAvg = "SELECT * FROM player_port_avg ORDER BY avg_reb DESC";
$queryAvg = mysqli_query($conn, $viewAvg);
} // btnReb



if(isset($_GET['btnAst'])) {
$viewAvg = "SELECT * FROM player_port_avg ORDER BY avg_ast DESC";
$queryAvg = mysqli_query($conn, $viewAvg);
} // btnAst


if(isset($_GET['btnStl'])) {
$viewAvg = "SELECT * FROM player_port_avg ORDER BY avg_stl DESC";
$queryAvg = mysqli_query($conn, $viewAvg);
} // btnstl


if(isset($_GET['btnBlk'])) {
$viewAvg = "SELECT * FROM player_port_avg ORDER BY avg_blk DESC";
$queryAvg = mysqli_query($conn, $viewAvg);
} // btnBlk




// search per barangay
$sqlBrgy = "SELECT * FROM brgy";
$queryBrgy = mysqli_query($conn, $sqlBrgy);


if(isset($_GET['btnBrgy'])) {
$txtBrgy = $_GET['txtBrgy'];
$viewAvg = "SELECT * FROM player_port_avg WHERE avg_brgy='$txtBrgy'";
$queryAvg = mysqli_query($conn, $viewAvg);

} // END OF btnBrgy

 ?>

 <style type="text/css">
     .check-des-container {
        display: flex;
        margin: 4px;
     }

     span{
     margin-left:2px;
     }

     .age-select-container {
        text-align: center;
     }

     .shad-card {
       
       
     }

     .shad-card-child {
         /*box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;*/
     }

     .subs-container {
        text-align: center;
        width: 50%;
        margin: auto;
        padding: 12px;
        box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
     }

     .info-subs {
        color: green;
     }

 </style>


<div class="subs-container hide-subs animate__animated animate__bounceInUp">
    <div>
        <h5 class="info-subs">Your not yet Subscribe, for only Php 125.00 you can recruit a player.</h5>
         <button id="btnPay" class="btn btn-outline-success">Pay PHP 125.00</button>
    </div>
</div>


<div class="main-scout-container hide-scout-data">
	



    <div class="container animate__animated animate__fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Players</h4>
                    </div>
                </div>
            </div>

            <!-- FILTER LIST  -->
            <div class="col-md-3">
                <form action="" method="GET">
                    <div class="card shadow mt-3">
                        <div class="card-header">
                            <h4>Filter</h4>
                          
                            <form method="GET" action="">
                            <input type="text" name="userInfo" class="form-control"  placeholder="address, player name, pos">
                            <br>    
                            <input type="submit" value="Search" name="btnSearch" class="btn btn-outline-primary btn-sm float-end">
                            <a href="scout_player_ses.php" class="btn btn-outline-primary btn-sm">Clear</a>
                         <div class="card-body">
                        
                        </div>

                          </form>
                            <br>                        
                          <form class="form-control">
                            <select name="txtBrgy" class="form-control">
                                <?php while($rowBrgy = $queryBrgy->fetch_assoc()): ?>
                                    <option value="<?php echo $rowBrgy['brg_name']; ?>"><?php echo $rowBrgy['brg_name']; ?></option>
                                <?php endwhile; ?>    
                            </select>
                                <br>
                            <input type="submit" name="btnBrgy" value="Barangay" class="btn btn-outline-primary">
                          </form>
                          <br>
                          <!-- <h6>Player Position</h6> -->
                            <hr>
                          
                          <div>
                              <form method="GET" action="">
                                  <div class="">
                                    <label>Age from:</label>
                                      <input type="number" name="ageFrom" class="form-control">
                                     <label>Age to:</label>
                                      <input type="number" name="ageTo" class="form-control">
                                    </div>
                                    


                                    <div class="">
                                    <label>Games played:</label>
                                        <select name="gamesPlayed" class='form-control age-select-container'>
                                            <option value="0">select</option>
                                            <option value="4">4</option>
                                            <option value="8">8</option>
                                            <option value="12">12</option>
                                            <option value="20">20</option>
                                            <option value="25">25</option>
                                        </select>
                                    </div>
                                    <br>
                                <div class="check-des-container form-control">

                                    <div class="ck"><span> PG </span><input type="checkbox" name="pos[]" value="PG" class="form-check-input"></div>
                                    <div class="ck"><span> SG </span><input type="checkbox" name="pos[]" value="SG" class="form-check-input"></div>
                                    <div class="ck"><span> SF </span><input type="checkbox" name="pos[]" value="SF" class="form-check-input"></div>
                                    <div class="ck"><span> C </span><input type="checkbox" name="pos[]" value="C" class="form-check-input"></div>
                                    <div class="ck"><span> PF </span><input type="checkbox" name="pos[]" value="PF" class="form-check-input"></div>

                                </div>


                                <br>
                              <input type="submit" name="btnFilter" value="Filter" class="btn btn-outline-primary btn-sm float-end">
                              <br>
                              
                                <label>View highest stats per category:</label>  
                                <br>    
                                  <input type="submit" name="btnPts" value="Pts" class="btn btn-outline-primary btn-sm float-start">
                                  <input type="submit" name="btnReb" value="Reb" class="btn btn-outline-primary btn-sm float-start">
                                  <input type="submit" name="btnAst" value="Ast" class="btn btn-outline-primary btn-sm float-start">
                                  <input type="submit" name="btnStl" value="Stl" class="btn btn-outline-primary btn-sm float-start">
                                  <input type="submit" name="btnBlk" value="Blk" class="btn btn-outline-primary btn-sm float-start">
                              </form>

                            

                          </div>
                            
                        </div>

                    </div>
                </form>
            </div>

            <!-- Brand Items - Products -->
            <div class="col-md-9 mt-3">
                <div class="card ">
                    <div class="card-body row">

                        <?php while($rowAvg = $queryAvg->fetch_assoc()): ?>
                          <?php if($rowAvg['avg_recruit_status'] == 'hired'): ?>  
                        


                          <?php elseif($rowAvg['avg_recruit_status'] == 'recruited'): ?>
                             

                          <?php elseif($rowAvg['avg_recruit_status'] == ''): ?>
                            
                             <div class="col-md-4 mt-3 shad-card">

                                        <div class="border p-3 shad-card-child">
                                            <a href="<?php echo "view_port_ses.php?portId=".$rowAvg['user_id']; ?>" target="_blank" class="btn btn-outline-primary btn-sm">Portfolio</a>
                                             <a href="<?php echo "view_hl_ses.php?highLightsId=".$rowAvg['user_id']; ?>" target="_blank" class="btn btn-outline-primary btn-sm float-end">Highlights</a>
                                            <br>
                                            <br>
                                            <form>
                                                <img class="card-img-top" src="<?php echo "img_profiles/".$rowAvg['avg_profile_img']; ?>" alt="Card image cap">
                                                <h6>POS: <?php echo $rowAvg['avg_pos']; ?></h6>
                                                <h6>Name: <?php echo $rowAvg['avg_fullname']; ?></h6>
                                                 <h6>Address: <?php echo $rowAvg['avg_address']; ?></h6>
                                                     <h6>Age: <?php echo $rowAvg['avg_dob']; ?></h6>
                                                 <hr>
                                                <h6>Avg Pts: <?php echo $rowAvg['avg_pts']; ?></h6>
                                                <h6>Avg Reb: <?php echo $rowAvg['avg_reb']; ?></h6>
                                                 <h6>Avg Ast: <?php echo $rowAvg['avg_ast']; ?></h6>
                                                  <h6>Avg Blk: <?php echo $rowAvg['avg_blk']; ?></h6>
                                                  <h6>Avg Stl: <?php echo $rowAvg['avg_stl']; ?></h6>
                                                  <h6>Games played: <?php echo $rowAvg['games_played']; ?></h6>
                                                <hr>
                                            <a href="<?php echo "view_profile_ses.php?protId=".$rowAvg['user_id']; ?>" target="_blank" class="btn btn-outline-primary btn-sm">Profile</a>      
                                           
                                                </form>
                                                <br>
                                                <form action="send_invite_ses.php" method="GET" target="_blank">
                                                            
                                                    <input type="hidden" name="playerId" value="<?php echo $rowAvg['user_id'];  ?>">
                                                    <input type="submit" name="btnInvite" class="btn btn-outline-primary float-end btn-sm" value="Recruit">
                                                </form>

                                              

                                                <form method="GET" action="0_chatTo_player_ses.php">
                                                   
                                                <input type="hidden" name="chatIdno" value="<?php echo $rowAvg['user_id']; ?>">
                                                
                                                  <input type="submit" name="btnMsg" value="Message" class="btn btn-outline-primary btn-sm">   
                                                </form>

                                        </div>
                                    </div> 

                         

                         <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
   


</div> <!-- end of main scouting container -->






<br>

<br>



<script type="text/javascript">

    let userSubs = "<?php echo $userSubs; ?>";

    console.log(typeof  userSubs);
    if(userSubs != 'paid') {
        document.querySelector('.hide-scout-data').style.display = "none";
    } 

if(userSubs == 'paid') {
    document.querySelector('.hide-subs').style.display = "none";
}

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
          success: 'http://localhost/laligaRd/successPayMongo.php',
          failed: 'http://localhost/laligaRd/failedPayMongo.php'
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
const sesIdno = '<?php echo $userIdno; ?>';
const sesUser = '<?php echo $userName; ?>';




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
   window.location.href = `profile_ses.php`;
}, 1000);
} // end of event btnPay handler



</script>














</script>

<?php //require 'inc/footer.php'; ?>