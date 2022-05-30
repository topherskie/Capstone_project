<?php require 'inc/header_ses.php'; ?>
<?php 	

$userIdno;
$userType;
 $userName;
$userEmail;
$userFirstname;
$userLastname;
$userAddress;
$userDob;


$eventId = '';
$userId = '';
if(isset($_GET['btnGal'])) {
$eventId = $_GET['eventId'];
$userId = $_GET['userId'];


} // END OF btnGal



// query all image 
$imgRender = "SELECT * FROM player_portfolio_img WHERE user_id='$userId' AND event_id='$eventId'";
$sqlQueryImg = mysqli_query($conn, $imgRender);



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
                  <input type="hidden" name="btnDelImg" value="Remove" class="btn btn-outline-danger">
              </form>
          </p>
        </div>
      </div> 
    </div>
 <?php endwhile; ?>
   



  
  </div>






<?php require 'inc/footer.php'; ?>