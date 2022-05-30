<?php require 'inc/header_ses.php'; ?>
<?php 	
error_reporting(0);
 $userIdno;
$eventId = '';
$userId = '';
if(isset($_GET['btnGal'])) {
$eventId = $_GET['eventId'];
$userId = $_GET['userId'];


} // END OF btnGal
 $eventId;
 $userId;






$alertSuc = '';
$alertImgMsg = '';
if(isset($_POST['btnPortUpload'])) {
$targetDir = "port_img/";

foreach($_FILES['portImg']['name'] as $key=>$val) {
 // File upload path 
$fileName = basename($_FILES['portImg']['name'][$key]); 
$targetFilePath = $targetDir . $fileName; 

$portImgInsert = "INSERT INTO player_portfolio_img (event_id, user_id, port_img)
VALUES ('$eventId', '$userId', '$fileName')";

if ($conn->query($portImgInsert) === TRUE) {
    $alertSuc = "alert alert-success";
 $alertImgMsg = "Images uploaded Successfully";
} else {
  echo "Error: " . $portImgInsert . "<br>" . $conn->error;
}






// INSERT CERTIFICATE TO FOLDER

    if (move_uploaded_file($_FILES["portImg"]["tmp_name"][$key], $targetFilePath))  {
            //$msg = "Image uploaded successfully";
        } else{
            $msg = "Failed to upload image";
      }



} // end of foreach



} // END OF btnPortUpload




// query all image 
$imgRender = "SELECT * FROM player_portfolio_img WHERE user_id='$userIdno' AND event_id='$eventId'";
$sqlQueryImg = mysqli_query($conn, $imgRender);





// delete
if(isset($_POST['btnDelImg'])) {
$eventId = $_POST['eventId'];
$userId = $_POST['userId'];
$imgPortId = $_POST['imgPortId'];

$sqlDel = "DELETE FROM player_portfolio_img WHERE eventimg_id ='$imgPortId'";

if ($conn->query($sqlDel) === TRUE) {
  //echo "Record deleted successfully";
   //header("Location: port_gallery_ses.php?eventId={$eventId}&userId=${userId}&btnGal=Gallery");
} else {
  echo "Error deleting record: " . $conn->error;
}


} // END OF btnDelImg

 ?>
 <link href="https://fonts.googleapis.com/css?family=Raleway:600,900" rel="stylesheet">


 <style type="text/css">
 * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: Raleway;
  background-color: #whitesmoke;
}

.heading {
    text-align: center;
    font-size: 1.5em;
    letter-spacing: 1px;
    padding: 25px;
    color: #383838;
}

.gallery-image {
  padding: 20px;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.gallery-image img {
  height: 360px;
  width: 400px;
  transform: scale(1.0);
  transition: transform 0.4s ease;
}

.img-box {
  box-sizing: content-box;
  margin: 10px;
  height: 360px;
  width: 400px;
  overflow: hidden;
  display: inline-block;
  color: white;
  position: relative;
  background-color: white;
}

.caption {
  position: absolute;
  bottom: 5px;
  left: 20px;
  opacity: 0.0;
  transition: transform 0.3s ease, opacity 0.3s ease;
}

.transparent-box {
  height: 250px;
  width: 350px;
  background-color:rgba(0, 0, 0, 0);
  position: absolute;
  top: 0;
  left: 0;
  transition: background-color 0.3s ease;
}

.img-box:hover img { 
  transform: scale(1.1);
}

.img-box:hover .transparent-box {
  background-color:rgba(0, 0, 0, 0.1);
}

.img-box:hover .caption {
  transform: translateY(-20px);
  opacity: 1.0;
}

.img-box:hover {
  cursor: pointer;
}

.caption > p:nth-child(2) {
  font-size: 0.8em;
}

.opacity-low {
  opacity: 0.5;

}    

.img-main{
    width:  50%;
    text-align: center;
    margin: auto;
}



@media only screen and (max-width: 500px) {
  .img-main {
    width: 100%;
    padding: 8px;
    margin: 8px;
  }
}



 </style>


<br>
<div class="<?php echo $alertSuc . ' ' . "img-main" ?>" role="alert">
  <?php echo $alertImgMsg; ?>
</div>
<div class="container img-main animate__animated animate__backInDown">
    <div>
        <form action="" method="POST" enctype="multipart/form-data" class="form-control">
            <input type="file" name="portImg[]" multiple class="form-control" required>
            <br>
            <input type="submit" name="btnPortUpload" value="Upload" class="btn btn-outline-primary">
        </form>
    </div>
</div>





<p class="heading">Event Photos</p>
  <div class="gallery-image">

<?php while($rowImg = $sqlQueryImg->fetch_assoc()): ?>
    <div class="img-box animate__animated animate__backInLeft">
      <img src="<?php echo "port_img/".$rowImg['port_img']; ?>" alt="" />
      <div class="transparent-box">
        <div class="caption">
          <p></p>
          <p class="opacity-low">
             <form method="POST" action="">
                <input type="hidden" name="eventId" value="<?php echo $eventId; ?>">
                <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                <input type="hidden" name="imgPortId" value="<?php echo $rowImg['eventimg_id']; ?>">
                  <input type="submit" name="btnDelImg" value="Remove" class="btn btn-outline-danger">
              </form>
          </p>
        </div>
      </div> 
    </div>
 <?php endwhile; ?>
   



  
  </div>






<?php require 'inc/footer.php'; ?>