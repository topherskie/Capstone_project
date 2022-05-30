<?php
require 'configs/db.php';
require 'configs/server.php';
// require 'configs/login.php';
// require 'configs/register.php';
?>



<!DOCTYPE html>
<html>
<title>La-Liga Pilipinas</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
<script src="scripts/modal_login.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/style_loader.css">
<link rel="stylesheet" href="css/style_global.css">
<link rel="stylesheet" href="css/style_login.css">
<link rel="stylesheet" href="css/style_recruit_players.css">

<style>

/* Full height image header */
.img-jumbotron {
  background-position: top;
  background-size: cover;
  background-image: url("local_img/bg.jpg");
  height: 92vh;
  color: whitesmoke;
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="index.php" class="w3-bar-item w3-button w3-wide" font-size="10">La-Liga Pilipinas</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> HOME</a>
      <a href="bskball_news.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i> NEWS</a>
      <a href="find_court.php" class="w3-bar-item w3-button"><i class="fa fa-th"></i> FIND COURT</a>
      <a href="find_match.php" class="w3-bar-item w3-button"><i class="fa fa-usd"></i> FIND MATCH</a>
      <a href="recruit_players.php" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> RECRUIT PLAYER</a>
      <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;" class="active btn-login-header">REGISTER</button>
      <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="active btn-login-header">LOGIN</button>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button">HOME</a>
  <a href="news.php" onclick="w3_close()" class="w3-bar-item w3-button">NEWS</a>
  <a href="find_court.php" onclick="w3_close()" class="w3-bar-item w3-button">FIND COURT</a>
  <a href="find_match.php" onclick="w3_close()" class="w3-bar-item w3-button">FIND MATCH</a>
  <a href="recruit_players.php" onclick="w3_close()" class="w3-bar-item w3-button">RECRUIT PLAYER</a>
  <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;" class="active btn-login-header">REGISTER</button>
  <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="active btn-login-header">LOGIN</button>
</nav>






<!-- login modal -->
  <div id="id01" class="modal">

  <form class="modal-content animate" action="index.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="local_img/laligaLogo.png" alt="Avatar" class="avatar">
    </div>

    <!-- modal -->
    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username or Email" name="txtLogUser" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="txtLogPwd" required>

      <input type="submit" name="btnLogin" class="btn-login" value="Login">

     
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="password_reset.php">password?</a></span>
    </div>
  </form>
  </div>

  

<!-- REGISTER form modal -->

<div id="id02" class="modal">

<form class="modal-content animate" action="index.php" method="POST">
<div class="imgcontainer">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <img src="local_img/laligaLogo.png" alt="Avatar" class="avatar">
</div>

<!-- modal register -->
<div class="container">
  <!-- <label for="txtUser"><b>Username</b></label> -->
  <input type="text" placeholder="Enter Username" name="txtUser" required>

  <!-- <label for="txtEmail"><b>Email</b></label> -->
  <input type="text" placeholder="Enter email" name="txtEmail" required>

  <!-- <label for="txtFname"><b>Firstname</b></label> -->
  <input type="text" placeholder="Enter Firstname" name="txtFname" required>

  <!-- <label for="txtMi"><b>Middle Initial</b></label> -->
  <input type="text" placeholder="Enter Middle Initial" name="txtMi" required>

  <!-- <label for="txtLname"><b>Lastname</b></label> -->
  <input type="text" placeholder="Enter Lastname" name="txtLname" required>

  <!-- <label for="txtPwd"><b>Password</b></label> -->
  <input type="password" placeholder="Enter Password" name="txtPwd" required>

  <br>
  <!-- <label for="txtGender"><b>Gender</b></label> -->
  <select name="txtGender">
      <option value="male">Male</option>
      <option value="female">Female</option>
  </select>

  <!-- <label for="txtDob"><b>Date of Birth</b></label> -->
  <input type="date" placeholder="Enter Dob" name="txtDob" required>
  <br>

  <p>Select Register type:</p>
  <select name="txtUserType" id="txtUserType">
  <option value="player">PLAYER</option>
  <option value="court_owner">COURT OWNER</option>
  </select>

 <!--  <p>Select City:</p>
  <select name="txtUserCity" id="txtUserCity">
  <option value="Cebu City">Cebu City</option>
  <option value="Mandaue City">Mandaue City</option>
  <option value="Carcar City">Carcar City</option>
  <option value="Lapu-Lapu City">Lapu-Lapu City</option>
  <option value="Bogo City">Bogo City</option>
  </select> -->

  <!-- <label for="txtAddress"><b>Address</b></label> -->
  <input type="text" placeholder="Enter Address" name="txtAddress" required>

  <!-- <label for="txtContactNo"><b>Contact No.</b></label> -->
  <input type="text" placeholder="Enter contact No." name="txtContactNo" required>

  <input type="submit" name="btnRegister" class="btn-login"  value="Register" />

</div>

<div class="container" style="background-color:#f1f1f1">
  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
  <span class="psw">Forgot <a href="#">password?</a></span>
</div>
</form>
</div>
