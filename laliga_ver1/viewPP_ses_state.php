<?php require_once 'inc/header_login_state.php'; ?>
<?php
 // echo  $sesIdno . "<BR>";
 //  echo $sesUser . "<BR>";;
 //  echo  $sesUserType . "<BR>";
 //  echo $sesFname;
 //  echo $sesLname;

$userIdno = '';

if(isset($_GET['userIdno'])) {
    $userIdno = $_GET['userIdno'];
}
$userIdno;
echo $userIdno;

// check if user exist
$checkUser = "SELECT * FROM user WHERE user_idno='$userIdno'";
$checkUserQuery = mysqli_query($conn, $checkUser);
$resultCheckUser = mysqli_num_rows($checkUserQuery);



if($resultCheckUser <= 0) {
    'No user yet';
}else {

    $sqlGetUser = "SELECT * FROM user WHERE user_idno='$userIdno'";
    $sqlUserQuery = mysqli_query($conn, $sqlGetUser);
    $fetchUserInfo = mysqli_fetch_assoc($sqlUserQuery);

}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Player Profile</title>
    <style type="text/css">
      .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}



button:hover, a:hover {
  opacity: 0.7;
} 


    </style>
</head>
<body>


<div class="profile-view-main-container">
    <div class="card">
  <img src="<?php echo "img_profiles/".$fetchUserInfo['img_profile']; ?>" alt="John" style="width:100%">
  <br>
  <h4><?php echo $fetchUserInfo['user_fname'] . ' ' . $fetchUserInfo['user_lname']; ?></h4>
  <p><?php echo $fetchUserInfo['user_email']; ?></p>
  <div style="margin: 24px 0;">
    
    <div>
          <video width="320" height="540" controls autoplay>
         <source src="<?php echo "hl_moments/".$fetchUserInfo['hl_moments']; ?>" type="video/mp4">
        </video>  
    </div>

  </div>
  
</div>
</div>


</body>
</html>