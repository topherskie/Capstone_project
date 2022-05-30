<?php 
//error_reporting(0);
require 'config/db.php';
session_start();

$userIdno = $_SESSION['user_id'];
$userType = $_SESSION['user_type'];
$userName = $_SESSION['user_username'];
$userEmail = $_SESSION['user_email'];
$userFirstname = $_SESSION['user_firstname'];
$userLastname = $_SESSION['user_lastname'];
$userAddress = $_SESSION['user_address'];
$userSubs = $_SESSION['user_subs'];
$userDob = $_SESSION['user_dob'];
$userBrgy = $_SESSION['user_brgy'];


$userIdno;
$userType;
 $userName;
$userEmail;
$userFirstname;
$userLastname;
$userAddress;
$userDob;

// check if session is ok
if($userIdno == '') {
  header("Location: index.php");
}

 ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- for notification -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<!-- for graph -->
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>






 <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <!-- accessing a file in a another file -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Laliga Pilipinas</title>
<style type="text/css"> 
* {
  font-family: arial;

}

.color-a {
  text-decoration: none;
}

.color-a:hover {
  color: red;
}

.img-des-title-ses {
  width:50px;
} 

</style>

</head>
<body>
 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="player_home_ses.php">
      <img src="local_img/laligaLogo.png" class="img-des-title-ses">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="player_home_ses.php">Home
  
          </a>

        </li>
        <li class="nav-item">
          <a class="nav-link active" href="profile_ses.php">Profile</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active hide-port" href="portfolio_ses.php">Portfolio</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active hide-scout" href="scout_player_ses.php">Scout Players</a>
        </li>

         <li class="nav-item">
          <a class="nav-link active hide-hl" href="player_hl_ses.php">Player Highlights</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active hide-hl" href="inbox_ses.php">Message</a>
        </li>


        <li class="nav-item">
          <a class="nav-link active hide-to-ss" href="player_invite_info.php">Invites</a>
        </li>

          <li class="nav-item">
          <a class="nav-link active hide-to-tt" href="invites_history_ses.php">Invites History</a>
        </li>



        <li class="nav-item">
          <a class="nav-link active hide-from-player" href="player_recruitList_ses.php">Recruits</a>
        </li>

         <li class="nav-item">
          <a class="nav-link active hide-from-player-dec" href="recruit_history_ses.php">Recruits History</a>
        </li>

         <li class="nav-item">
          <a class="nav-link active" href="call_ses.php">Live Meet</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active hide-to-pl" href="scout_tranc_ses.php">Payment Transactions</a>
        </li>




<!-- notification -->
          <li class="dropdown">
       <a href="#" class="dropdown-toggle color-a badge" data-toggle="dropdown">
        <span class="label label-pill label-danger count" style="border-radius:15px;"></span>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="34" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
</svg>
       </a>
       <ul class="dropdown-menu"></ul>
      </li>


      </ul>




      <div>
          <a href="./logout_ses.php" class="btn btn-primary">Logout</a>
      </div>

    </div>
  </div>
</nav>



<script type="text/javascript">
  let userType = "<?php echo $userType; ?>";


  // scout
  if(userType == 'Scout') {
    document.querySelector('.hide-port').style.display = 'none';
  }


  //scout
 if(userType == 'Scout') {
    document.querySelector('.hide-hl').style.display = 'none';
  }



// player
  if(userType == 'Player') {
    document.querySelector('.hide-scout').style.display = 'none';
  }


// player
if(userType == 'Player') {
  document.querySelector('.hide-from-player').style.display = 'none';
}

if(userType == 'Player') {
  document.querySelector('.hide-to-pl').style.display = 'none';
}

if(userType == 'Scout') {
   document.querySelector('.hide-to-ss').style.display = 'none';
}

if(userType == 'Player') {

     document.querySelector('.hide-from-player-dec').style.display = 'none';
}

if(userType == 'Scout') {
     document.querySelector('.hide-to-tt').style.display = 'none';
}


</script>







