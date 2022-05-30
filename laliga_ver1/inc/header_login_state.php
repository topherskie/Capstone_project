
<?php require 'configs/server.php'; ?>

<?php

$sesUserType = $_SESSION['user_type'];
$sesUser = $_SESSION['user_username'];
$sesIdno =  $_SESSION['user_idno'];
$sesFname = $_SESSION['user_fname'];
$sesLname = $_SESSION['user_lname'];
$sesFname = $_SESSION['user_fname']; 
$sesLname = $_SESSION['user_lname']; 
$sesFullname = $sesFname . ' ' . $sesLname;
$sesUserEmail = $_SESSION['user_email'];

// // check current subscription if ACTIVE OR INACTIVE
// $notYetSubscribe = 'http://localhost/0_capstone/laliga_pilipinas_ver1/recruit_players_ses_state.php';
// $currentlySubscribe = 'http://localhost/0_capstone/laliga_pilipinas_ver1/user_ses_subscription.php';

// $sqlSub = "SELECT * FROM payment_tracker WHERE user_idno  = '$sesIdno'";

// $resultSubs = $conn->query($sqlSub);
// $resultDataSubs = mysqli_fetch_assoc($resultSubs);


//  // Creates DateTime objects
//   $datetime1 = date_create('17-09-2018');
//   $datetime2 = date_create('25-09-2018');

//  echo $resultDataSubs['date_sub_started'];


//   // Calculates the difference between DateTime objects
//   $interval = date_diff($datetime1, $datetime2);
  
//   // Display the result
//   echo $interval->format('Difference between two dates: %R%a days');



if($sesUser == '') {
  header("location: index.php");
}

// $sqlIdno = "SELECT user_idno FROM user WHERE user_username = '$sesUser'";
  
//   $resultIdno = mysqli_fetch_array($sqlIdno);
//   $_SESSION["user_idno"] = $resultIdno['user_idno'];




 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style_loader.css">
    <link rel="stylesheet" href="css/style_global.css">
    <link rel="stylesheet" href="css/style_header.css">
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="css/style_recruit_players.css">
    <link rel="stylesheet" type="text/css" href="css/control_events.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" type="text/css" href="css/style_profile.css">
    <!-- font awesome -->
    <link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
    <script src="https://kit.fontawesome.com/d5478f09b9.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



  <script src="scripts/modal_login.js"></script>
    <script src="scripts/sideBar_nav.js"></script>
    <title>La-Liga Pilipinas</title>
    <style type="text/css">
      .fa-color {
        color: ;
      }

     
    </style>

<!-- head -->






</head>
<body>


<span style="font-size:30px;cursor:pointer" onclick="openNav()" class="sideHide">&#9776; <!--open--></span>
<div class="sidenav" id="mySidenav">
  <nav>
    <a href="javascript:void(0)" class="closebtn sideHide sideOpen" onclick="closeNav()">&times;</a>
    <ul>
      
      <li class="header-li"><a href="home_ses_state.php"><i class="fa fa-home"></i></a></li>
        <li class="header-li"><a href="profile_ses_state.php"><i class="fa fa-user"></i></a></li>
      <li class="header-li"><a href="bskball_news_ses_state.php"><i class="fa fa-newspaper"></i></a></li>
      <li class="header-li hide-li4"><a href="post_court_ses_state.php"><i class="fa fa-location fa-color"></i></a></li>
      <li class="header-li hide-li1"><a href="findMatch_ses_state.php"><i class="fa fa-basketball"></i></a></li>
      <li class="header-li hide-li2"><a href="recruit_players_ses_state.php"><i class="fa fa-file"></i></a></li>
       <li class="header-li hide-li3"><a href="post_court_ses_state.php"><i class="fa fa-clipboard" aria-hidden="true"></i></a></li>
       <li class="header-li hide-li5"><a href="tournament_ses_state.php"><i class="fa fa-shield"></i></a></li>
        <li class="header-li hide-li6"><a href="tournament_events_ses_state.php"> <i class="fa fa-trophy" aria-hidden="true"></i></a></li>
       <li class="header-li"><a href="inbox_ses_state.php"><i class="fa fa-message"></i></a></li>
       <li class="header-li hide-li7"><a href="inbox_player_ses_state.php"><i class="fa-regular fa-message"></i></a></li>
       <li class="header-li"><a href="call_ses_state.php"><i class="fas fa-video"></i></a></li>

      <!-- <li  class="header-li"><button><i class="material-icons">&#xe7f4;</i></button></li> -->
      <li style="float:right"><a href="logout.php" class=""><i class="fas fa-sign-out-alt"></i></a>
    </ul>

  </nav>
  </div>






<script>
  
  const currentUserType = '<?php echo $sesUserType; ?>';
  const linkHide1 = document.querySelector(".hide-li1");
  const linkHide2 = document.querySelector(".hide-li2");
  const linkHide3 = document.querySelector(".hide-li3");
  const linkHide4 = document.querySelector(".hide-li4");
 const linkHide5 = document.querySelector(".hide-li5");
  const linkHide6 = document.querySelector(".hide-li6");
  const linkHide7 = document.querySelector(".hide-li7");

  if (currentUserType == 'court_owner') {
    linkHide1.style.display = "none";
    linkHide2.style.display = "none";
    linkHide4.style.display = "none";
    linkHide5.style.display = "none";
    linkHide6.style.display = "none";
    linkHide7.style.display = "none";

  } else if (currentUserType != 'court_owner') {
    linkHide3.style.display="none";
  }



console.log(currentUserType);
</script>

