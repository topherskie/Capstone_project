<?php include 'inc/header_login_state.php'; ?>
<?php 
  
  $sesIdno . "<BR>";
  $sesUser . "<BR>";;
  $sesUserType . "<BR>";
  $sesFname;
   $sesLname;

$row= '';
$img = '';
$hlVid = '';
if(isset($_POST['btnPlayerBio'])) {
  $txtPidno = $_POST['txtCheckPlayerBio'];

   $txtPidno;

  $sqlCheckRecruit ="SELECT * FROM user WHERE user_idno='$txtPidno'";
 $result = $conn->query($sqlCheckRecruit);
$resultCheck = mysqli_fetch_array($result); 
$resultImg = $resultCheck['img_profile'];
$resultMoments = $resultCheck['hl_moments'];
$img  = "img_profiles/".$resultImg; 
$hlVid = "hl_moments/".$resultMoments;
}
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Recruiter Profile</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
}

.title {
  color: grey;
  font-size: 18px;
}

.btn-r {
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

.pro-link {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

.btn-r:hover, .pro-link:hover {
  opacity: 0.7;
}
  </style>
</head>
<body>

  <!-- highlights -->
  <div class="hl-main-container">

    <div class="hl-child-container">
       
        
        <div> 

      <video width="320" height="540" controls autoplay>
         <source src="<?php echo $hlVid; ?>" type="video/mp4">
        </video>      

   </div>

   </div>

   

  </div>

  <div class="card">
  <img src="<?php echo $img; ?>" alt="<?php echo $resultCheck['user_fname']; ?>" style="width:100%">
  <h4><?php echo $resultCheck['user_fname']; ?></h4>
  <p class="title"><?php echo $resultCheck['user_email']; ?></p>
  <p>Harvard University</p>
  <p><button class="btn-r">Player</button></p>
</div>




 


</body>
</html>