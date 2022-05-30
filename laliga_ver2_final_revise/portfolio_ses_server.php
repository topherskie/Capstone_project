<?php require 'inc/header_ses.php'; ?>

<?php
 error_reporting(0);
$userFullname = $userFirstname .' '. $userLastname;
$userAddress;
$ageResult = '';
$posString = '';
$pos = '';

if(isset($_POST['btnPort'])) {
 

$userIdno = $_POST['userIdno'];

$eventDate = $_POST['eventDate'];
$eventName = $_POST['eventName'];
$pts = $_POST['pts'];
$reb = $_POST['reb'];
$ast = $_POST['ast'];
$stl = $_POST['stl'];
$blk = $_POST['blk'];
$gameAward = $_POST['gameAward'];
$pos= $_POST['pos'];


$filename = $_FILES["eventCert"]["name"];
 $tempname = $_FILES["eventCert"]["tmp_name"];  
 $folder = "certificate/".$filename;

$currentDate = date("d-m-Y");
$age = date_diff(date_create($userDob), date_create($currentDate));
$ageResult = $age->format("%y");;

$portfolio = "INSERT INTO player_portfolio 
(user_id, event_name, event_date, points, rebound, assist, steal, block, position, game_award, certificate, user_fullname, user_address, port_dob) VALUES 
('$userIdno', '$eventName', '$eventDate', '$pts', '$reb', '$ast', '$stl', '$blk', '$pos', '$gameAward', '$filename', '$userFullname', '$userAddress', '$ageResult')";

if ($conn->query($portfolio) === TRUE) {
  //echo "New record created successfully";
} else {
  echo "Error: " . $portfolio . "<br>" . $conn->error;
}



// INSERT CERTIFICATE TO FOLDER

    if (move_uploaded_file($tempname, $folder))  {
            //$msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }



// Insert average scores 
$totalAvgPts = 0;
$totalAvgReb = 0;
$totalAvgAst = 0;
$totalAvgStl = 0;
$totalAvgBlk = 0;
$totalEvent = 0;
$avgTotal = "SELECT SUM(points) AS sumPts, COUNT(points) AS countPts, SUM(rebound) AS sumReb, COUNT(rebound) AS countReb, 
SUM(assist) AS sumAst, COUNT(assist) countAst, SUM(steal) AS sumStl, COUNT(steal) AS countStl, SUM(block) AS sumBlk, COUNT(block) AS countBlk, COUNT(event_id) AS totalEvents FROM player_portfolio WHERE user_id='$userIdno'";   
$avgQ = mysqli_query($conn, $avgTotal);
$resultAvgPts = mysqli_fetch_assoc($avgQ);
$resultAvgPts['sumPts'];
 $resultAvgPts['countPts'];
$totalEvent = $resultAvgPts['totalEvents'];
$totalAvgPts = $resultAvgPts['sumPts'] / $resultAvgPts['countPts'];
$totalAvgReb = $resultAvgPts['sumReb'] / $resultAvgPts['countReb'];
$totalAvgAst = $resultAvgPts['sumAst'] / $resultAvgPts['countAst'];
$totalAvgStl = $resultAvgPts['sumStl'] / $resultAvgPts['countStl'];
$totalAvgBlk = $resultAvgPts['sumBlk'] / $resultAvgPts['countBlk'];



// INSER AVG TO TABLE
// check table first
$checkAvgPts = "SELECT * FROM player_port_avg WHERE user_id='$userIdno'";
$checkResultAvgPts = mysqli_query($conn, $checkAvgPts);
$checkRowAvgPts = mysqli_num_rows($checkResultAvgPts);

if($checkRowAvgPts <= 0) {

  $sqlInsertAvgPts = "INSERT INTO player_port_avg (user_id, avg_pts, avg_reb, avg_ast, avg_stl, avg_blk, games_played, avg_fullname, avg_address, avg_dob, avg_pos, avg_brgy) 
  VALUES('$userIdno', '$totalAvgPts', '$totalAvgReb', '$totalAvgAst', '$totalAvgStl', '$totalAvgBlk', '$totalEvent',  '$userFullname', '$userAddress', '$ageResult', '$posString', '$userBrgy')";
  if ($conn->query($sqlInsertAvgPts) === TRUE) {
  //echo "New record created successfully";
} else {
  echo "Error: " . $sqlInsertAvgPts . "<br>" . $conn->error;
}

} elseif ($checkRowAvgPts > 0) {
$sqlUpdateAvgPts = "UPDATE player_port_avg SET avg_pts='$totalAvgPts', avg_reb='$totalAvgReb',
avg_ast='$totalAvgAst', avg_stl='$totalAvgStl', avg_blk='$totalAvgBlk', games_played='$totalEvent', avg_fullname='$userFullname', avg_address='$userAddress', avg_dob='$ageResult', avg_pos='$pos', avg_brgy='$userBrgy' WHERE user_id='$userIdno'";
if (mysqli_query($conn, $sqlUpdateAvgPts)) {
  //echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}



}


$updateAvg = "UPDATE player_port_avg SET avg_pos='$pos' WHERE user_id='$userIdno'";

if (mysqli_query($conn, $updateAvg)) {
 // echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}


} // END OF btnPort














// DELETE
if(isset($_GET['btnDelPort'])) {
$evenId = $_GET['evenId'];
$sqlDel = "DELETE FROM player_portfolio WHERE event_id='$evenId'";

if ($conn->query($sqlDel) === TRUE) {
  //echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}


// update the total average



// Insert average scores 
$totalAvgPts = 0;
$totalAvgReb = 0;
$totalAvgAst = 0;
$totalAvgStl = 0;
$totalAvgBlk = 0;
$totalEvent = 0;
$avgTotal = "SELECT SUM(points) AS sumPts, COUNT(points) AS countPts, SUM(rebound) AS sumReb, COUNT(rebound) AS countReb, 
SUM(assist) AS sumAst, COUNT(assist) countAst, SUM(steal) AS sumStl, COUNT(steal) AS countStl, SUM(block) AS sumBlk, COUNT(block) AS countBlk, COUNT(event_id) AS totalEvents FROM player_portfolio WHERE user_id='$userIdno'";   
$avgQ = mysqli_query($conn, $avgTotal);
$resultAvgPts = mysqli_fetch_assoc($avgQ);
$resultAvgPts['sumPts'];
 $resultAvgPts['countPts'];
$totalEvent = $resultAvgPts['totalEvents'];
$totalAvgPts = $resultAvgPts['sumPts'] / $resultAvgPts['countPts'];
$totalAvgReb = $resultAvgPts['sumReb'] / $resultAvgPts['countReb'];
$totalAvgAst = $resultAvgPts['sumAst'] / $resultAvgPts['countAst'];
$totalAvgStl = $resultAvgPts['sumStl'] / $resultAvgPts['countStl'];
$totalAvgBlk = $resultAvgPts['sumBlk'] / $resultAvgPts['countBlk'];



$sqlUpdateAvgPts = "UPDATE player_port_avg SET avg_pts='$totalAvgPts', avg_reb='$totalAvgReb',
avg_ast='$totalAvgAst', avg_stl='$totalAvgStl', avg_blk='$totalAvgBlk', games_played='$totalEvent' WHERE user_id='$userIdno'";
if (mysqli_query($conn, $sqlUpdateAvgPts)) {
  //echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
















} // END OF DELETE




// UPDATE DATA

if(isset($_GET['btnPortEdit'])) {



$eventId = $_GET['eventId'];

$eventDate = $_GET['eventDate'];
$eventName = $_GET['eventName'];
$pts = $_GET['pts'];
$reb = $_GET['reb'];
$ast = $_GET['ast'];
$stl = $_GET['stl'];
$blk = $_GET['blk'];
$gameAward = $_GET['gameAward'];

$pos = $_GET['pos'];


$updatePort = "UPDATE player_portfolio SET event_name='$eventName', event_date='$eventDate', 
points='$pts', rebound='$reb', assist='$ast', steal='$stl', block='$blk', port_dob='$userDob', position='$pos', game_award='$gameAward' WHERE event_id='$eventId'";

if ($conn->query($updatePort) === TRUE) {
  // echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}


$updateAvg = "UPDATE player_port_avg SET avg_pos='$pos' WHERE user_id='$userIdno'";

if (mysqli_query($conn, $updateAvg)) {
 // echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}














// udpate the avg as well
// Insert average scores 
$totalAvgPts = 0;
$totalAvgReb = 0;
$totalAvgAst = 0;
$totalAvgStl = 0;
$totalAvgBlk = 0;
$totalEvent = 0;
$avgTotal = "SELECT SUM(points) AS sumPts, COUNT(points) AS countPts, SUM(rebound) AS sumReb, COUNT(rebound) AS countReb, 
SUM(assist) AS sumAst, COUNT(assist) countAst, SUM(steal) AS sumStl, COUNT(steal) AS countStl, SUM(block) AS sumBlk, COUNT(block) AS countBlk, COUNT(event_id) AS totalEvents FROM player_portfolio WHERE user_id='$userIdno'";   
$avgQ = mysqli_query($conn, $avgTotal);
$resultAvgPts = mysqli_fetch_assoc($avgQ);
$resultAvgPts['sumPts'];
 $resultAvgPts['countPts'];
$totalEvent = $resultAvgPts['totalEvents'];
$totalAvgPts = $resultAvgPts['sumPts'] / $resultAvgPts['countPts'];
$totalAvgReb = $resultAvgPts['sumReb'] / $resultAvgPts['countReb'];
$totalAvgAst = $resultAvgPts['sumAst'] / $resultAvgPts['countAst'];
$totalAvgStl = $resultAvgPts['sumStl'] / $resultAvgPts['countStl'];
$totalAvgBlk = $resultAvgPts['sumBlk'] / $resultAvgPts['countBlk'];



$sqlUpdateAvgPts = "UPDATE player_port_avg SET avg_pts='$totalAvgPts', avg_reb='$totalAvgReb',
avg_ast='$totalAvgAst', avg_stl='$totalAvgStl', avg_blk='$totalAvgBlk', games_played='$totalEvent' WHERE user_id='$userIdno'";
if (mysqli_query($conn, $sqlUpdateAvgPts)) {
  //echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}





} // END OF EDIT






  ?>


  <style type="text/css">
  body{
        background: #373940;
      }
      
      .socket{
        width: 200px;
        height: 200px;
        position: absolute;
        left: 50%;
        margin-left: -100px;
        top: 50%;
        margin-top: -100px;
      }
      
      .hex-brick{
        background: #ABF8FF;
        width: 30px;
        height: 17px;
        position: absolute;
        top: 5px;
        animation-name: fade;
        animation-duration: 2s;
        animation-iteration-count: infinite;
        -webkit-animation-name: fade;
        -webkit-animation-duration: 2s;
        -webkit-animation-iteration-count: infinite;
      }
      
      .h2{
        transform: rotate(60deg);
        -webkit-transform: rotate(60deg);
      }
      
      .h3{
        transform: rotate(-60deg);
        -webkit-transform: rotate(-60deg);
      }
      
      .gel{
        height: 30px;
        width: 30px;  
        transition: all .3s;
        -webkit-transition: all .3s;
        position: absolute;
        top: 50%;
        left: 50%;
      }
      
      .center-gel{
        margin-left: -15px;
        margin-top: -15px;
        
        animation-name: pulse;
        animation-duration: 2s;
        animation-iteration-count: infinite;
        -webkit-animation-name: pulse;
        -webkit-animation-duration: 2s;
        -webkit-animation-iteration-count: infinite;
      }
      
      .c1{
        margin-left: -47px;
        margin-top: -15px;
      }
      
      .c2{
        margin-left: -31px;
        margin-top: -43px;
      }
      
      .c3{
        margin-left: 1px;
        margin-top: -43px;
      }
      
      .c4{
        margin-left: 17px;
        margin-top: -15px;
      }
      .c5{
        margin-left: -31px;
        margin-top: 13px;
      }
      
      .c6{
        margin-left: 1px;
        margin-top: 13px;
      }
      
      .c7{
        margin-left: -63px;
        margin-top: -43px;
      }
      
      .c8{
        margin-left: 33px;
        margin-top: -43px;
      }
      
      .c9{
        margin-left: -15px;
        margin-top: 41px;
      }
      
      .c10{
        margin-left: -63px;
        margin-top: 13px;
      }
      
      .c11{
        margin-left: 33px;
        margin-top: 13px;
      }
      
      .c12{
        margin-left: -15px;
        margin-top: -71px;
      }
      
      .c13{
        margin-left: -47px;
        margin-top: -71px;
      }
      
      .c14{
        margin-left: 17px;
        margin-top: -71px;
      }
      
      .c15{
        margin-left: -47px;
        margin-top: 41px;
      }
      
      .c16{
        margin-left: 17px;
        margin-top: 41px;
      }
      
      .c17{
        margin-left: -79px;
        margin-top: -15px;
      }
      
      .c18{
        margin-left: 49px;
        margin-top: -15px;
      }
      
      .c19{
        margin-left: -63px;
        margin-top: -99px;
      }
      
      .c20{
        margin-left: 33px;
        margin-top: -99px;
      }
      
      .c21{
        margin-left: 1px;
        margin-top: -99px;
      }
      
      .c22{
        margin-left: -31px;
        margin-top: -99px;
      }
      
      .c23{
        margin-left: -63px;
        margin-top: 69px;
      }
      
      .c24{
        margin-left: 33px;
        margin-top: 69px;
      }
      
      .c25{
        margin-left: 1px;
        margin-top: 69px;
      }
      
      .c26{
        margin-left: -31px;
        margin-top: 69px;
      }
      
      .c27{
        margin-left: -79px;
        margin-top: -15px;
      }
      
      .c28{
        margin-left: -95px;
        margin-top: -43px;
      }
      
      .c29{
        margin-left: -95px;
        margin-top: 13px;
      }
      
      .c30{
        margin-left: 49px;
        margin-top: 41px;
      }
      
      .c31{
        margin-left: -79px;
        margin-top: -71px;
      }
      
      .c32{
        margin-left: -111px;
        margin-top: -15px;
      }
      
      .c33{
        margin-left: 65px;
        margin-top: -43px;
      }
      
      .c34{
        margin-left: 65px;
        margin-top: 13px;
      }
      
      .c35{
        margin-left: -79px;
        margin-top: 41px;
      }
      
      .c36{
        margin-left: 49px;
        margin-top: -71px;
      }
      
      .c37{
        margin-left: 81px;
        margin-top: -15px;
      }
      
      .r1{
        animation-name: pulse;
        animation-duration: 2s;
        animation-iteration-count: infinite;
        animation-delay: .2s;
        -webkit-animation-name: pulse;
        -webkit-animation-duration: 2s;
        -webkit-animation-iteration-count: infinite;
        -webkit-animation-delay: .2s;
      }
      
      .r2{
        animation-name: pulse;
        animation-duration: 2s;
        animation-iteration-count: infinite;
        animation-delay: .4s;
        -webkit-animation-name: pulse;
        -webkit-animation-duration: 2s;
        -webkit-animation-iteration-count: infinite;
        -webkit-animation-delay: .4s;
      }
      
      .r3{
        animation-name: pulse;
        animation-duration: 2s;
        animation-iteration-count: infinite;
        animation-delay: .6s;
        -webkit-animation-name: pulse;
        -webkit-animation-duration: 2s;
        -webkit-animation-iteration-count: infinite;
        -webkit-animation-delay: .6s;
      }
      
      .r1 > .hex-brick{
        animation-name: fade;
        animation-duration: 2s;
        animation-iteration-count: infinite;
        animation-delay: .2s;
        -webkit-animation-name: fade;
        -webkit-animation-duration: 2s;
        -webkit-animation-iteration-count: infinite;
        -webkit-animation-delay: .2s;
      }
      
      .r2 > .hex-brick{
        animation-name: fade;
        animation-duration: 2s;
        animation-iteration-count: infinite;
        animation-delay: .4s;
        -webkit-animation-name: fade;
        -webkit-animation-duration: 2s;
        -webkit-animation-iteration-count: infinite;
        -webkit-animation-delay: .4s;
      }
      
      .r3 > .hex-brick{
        animation-name: fade;
        animation-duration: 2s;
        animation-iteration-count: infinite;
        animation-delay: .6s;
        -webkit-animation-name: fade;
        -webkit-animation-duration: 2s;
        -webkit-animation-iteration-count: infinite;
        -webkit-animation-delay: .6s;
      }
      
      
      @keyframes pulse{
        0%{
          -webkit-transform: scale(1);
          transform: scale(1);
        }
        
        50%{
          -webkit-transform: scale(0.01);
          transform: scale(0.01);
        }
        
        100%{
          -webkit-transform: scale(1);
          transform: scale(1);
        }
      }
      
      @keyframes fade{
        0%{
          background: #ABF8FF;
        }
        
        50%{
          background: #90BBBF;
        }
        
        100%{
          background: #ABF8FF;
        }
      }
      
      @-webkit-keyframes pulse{
        0%{
          -webkit-transform: scale(1);
          transform: scale(1);
        }
        
        50%{
          -webkit-transform: scale(0.01);
          transform: scale(0.01);
        }
        
        100%{
          -webkit-transform: scale(1);
          transform: scale(1);
        }
      }
      
      @-webkit-keyframes fade{
        0%{
          background: #ABF8FF;
        }
        
        50%{
          background: #389CA6;
        }
        
        100%{
          background: #ABF8FF;
        }
      }
</style>

<body>
    <div class="socket">
      <div class="gel center-gel">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c1 r1">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c2 r1">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c3 r1">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c4 r1">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c5 r1">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c6 r1">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      
      <div class="gel c7 r2">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      
      <div class="gel c8 r2">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c9 r2">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c10 r2">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c11 r2">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c12 r2">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c13 r2">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c14 r2">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c15 r2">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c16 r2">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c17 r2">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c18 r2">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c19 r3">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c20 r3">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c21 r3">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c22 r3">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c23 r3">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c24 r3">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c25 r3">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c26 r3">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c28 r3">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c29 r3">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c30 r3">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c31 r3">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c32 r3">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c33 r3">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c34 r3">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c35 r3">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c36 r3">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      <div class="gel c37 r3">
        <div class="hex-brick h1"></div>
        <div class="hex-brick h2"></div>
        <div class="hex-brick h3"></div>
      </div>
      
    </div>
  </body>






<script type="text/javascript">
   setTimeout(function() {
    window.location.href = `portfolio_ses.php`;
  }, 3000);
</script>

