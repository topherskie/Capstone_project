<?php include 'inc/header_login_state.php'; ?>
<?php 
  
  // echo  $sesIdno . "<BR>";
  // echo $sesUser . "<BR>";;
  // echo  $sesUserType . "<BR>";
  // echo $sesFname . ' ' . $sesLname;

  $txtCurrentAdd = '';
if (isset($_POST['btnCheckLoc'])) {
$txtCurrentAdd = $_POST['txtCurrentAdd'];


}



// directions
$txtOrig = '';
$txtDes = '';
$country = "Philippines";
if(isset($_POST['btnDirLoc'])) {
$txtOrig = $_POST['txtOrig'];
$txtDes = $_POST['txtDes'];


}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Location</title>
  <style type="text/css">
 .modal-bod {
  text-align: center;
 }

 .btn-modal-main-container {

/*  border:  2px solid grey;*/
  text-align: center;

 }

 .direc-main-container  {
  width: 50%;
  margin: auto;
 }

 .direct-container-frame {
  
  text-align: center;
  margin: auto;
 }

 .adjust-iframe {

  width: 50%;
  margin:  auto;
 }




 @media only screen and (max-width: 600px) {
  .adjust-iframe {
    width: 100%;
    border: none;
  }

  .direct-container-frame {
    border: 3px solid cornflowerblue;
  }

}





  </style>
</head>
<body>






<!-- Button trigger modal -->
<div class="btn-modal-main-container">
  <div>
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Location
</button>
  </div>
</div>




<div class="direc-main-container">
  <div>
    <form method="POST">
    <label>Origin location:</label>
    <input type="text" name="txtOrig" placeholder="enter your current location">
    <label>Destination location:</label>
    <input type="text" name="txtDes">
    <input type="submit" name="btnDirLoc" value="Estimate" class="btn btn-outline-primary" placeholder="enter your destination">
    </form>
  </div>

</div>
<br>

<div class="direct-container-frame">
  
  <div>
    <iframe
    class="adjust-iframe"
  width="700"
  height="600"
  style="border:0"
  loading="lazy"
  allowfullscreen
  referrerpolicy="no-referrer-when-downgrade"
  src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyCCdjYoHIrwQPplmWjTX5YZ0jLoYsWV618&origin=<?php echo $txtOrig; ?>+<?php echo $country;  ?>&destination=<?php echo $txtDes; ?>+<?php echo $country; ?>&avoid=tolls|highways">
</iframe>
  </div>

</div>



















<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Check Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-bod">
        
    <iframe
  width="330"
  height="600"
  style="border:0"
  loading="lazy"
  allowfullscreen
  referrerpolicy="no-referrer-when-downgrade"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCCdjYoHIrwQPplmWjTX5YZ0jLoYsWV618&q=<?php echo $txtCurrentAdd; ?>">
</iframe>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        <form action="post_court_ses_state.php" method="POST">
          <input type="submit" class="btn btn-primary" value="BACK">
        </form>
      </div>
    </div>
  </div>
</div>





<script type="text/javascript">
  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>

<?php include 'inc/footer.php'; ?>


