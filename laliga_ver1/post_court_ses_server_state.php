
<?php 
include 'configs/db.php';
// insert Court details
$filename = '';
$msg = '';
if(isset($_POST['btnCourtList'])) {
  $txtBcName = $_POST['txtBcName'];
  $numRateAmount = $_POST['numRateAmount'];
  $txtCourtLocation = $_POST['txtCourtLocation'];
  $txtArea = $_POST['txtArea'];
  $currentCLid = $_POST['currentCLid']; // SESSION CURRENT OWNER

  $filename = $_FILES["imgCourt"]["name"];
    $tempname = $_FILES["imgCourt"]["tmp_name"];  
    $folder = "img_court/".$filename;  

  $sqlInsertCourtListing = "INSERT INTO basketball_court (user_idno, bc_img, bc_name, bc_rate, bc_address, bc_desc) VALUES ('$currentCLid', '$filename', '$txtBcName', '$numRateAmount', '$txtCourtLocation', '$txtArea')";



  if ($conn->query($sqlInsertCourtListing) === TRUE) {
    echo "New listing added!";
  }   else {
    echo "Error: " . $sqlInsertCourtListing . "<br>" . $conn->error;
  }



  // ADD TRAPS LATER
  // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }

} // END OF MAIN IF insert Court details








// DELETE COURT LISTING
 if(isset($_POST['btnDeleteCL'])) {
      $currentIdnoCL = $_POST['currentIdnoCL'];

      $sqlDeleteCL = "DELETE FROM basketball_court WHERE bc_idno = '$currentIdnoCL'";

      if ($conn->query($sqlDeleteCL) === TRUE) {
       echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
    }

    } // END OF DELETE IF ELESE



// UPDATE COURT LISTING 

if(isset($_POST['btnEditCL'])) {
  $editCourtName = $_POST['editCourtName'];
  $editRate = $_POST['editRate'];
  $editCourtAddress = $_POST['editCourtAddress'];
  $editCourtDesc = $_POST['editCourtDesc'];
  $currentCLid = $_POST['currentCLid'];
  

  $sqlUpdatePostCL = "UPDATE basketball_court SET bc_name='$editCourtName', bc_rate='$editRate', bc_address='$editCourtAddress', bc_desc='$editCourtDesc' WHERE bc_idno='$currentCLid'";  


if ($conn->query($sqlUpdatePostCL) === TRUE) {
 // echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}





} // END OF UPDATE IF ELSE



// UPDATE PHOTO
if(isset($_POST['btnUploadImg'])) {
  $currentCLid = $_POST['currentCLid'];
    $filenameUpdate = $_FILES["imgCourtUpdate"]["name"];
    $tempname = $_FILES["imgCourtUpdate"]["tmp_name"];  
    $folder = "img_court/".$filenameUpdate;

      $sqlUpdatePostCL = "UPDATE basketball_court SET bc_img='$filenameUpdate' WHERE bc_idno='$currentCLid'";  

if ($conn->query($sqlUpdatePostCL) === TRUE) {
 // echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}


// IMAGE 
// img 
if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }


} // END OF IMAGE UPLOAD







// PLAYER PART QUERY
$sqlPlayerCL = "SELECT * FROM basketball_court";
$resultPlayerCL = $conn->query($sqlPlayerCL);


 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update Court</title>
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Dancing Script', cursive;
}

.container {
  width: 100%;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #3A3845;
}

.loader {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
}

.loader h2 {
  position: absolute;
  color: #fff;
  font-size: 2.5rem;
  font-weight: 500;
  animation: animateText 5s ease-in-out infinite;
}

.loader .drops {
  position: relative;
  width: 300px;
  height: 300px;
  display: flex;
  justify-content: center;
  align-items: center;
  filter: url(#Gooey);
}

.loader .drops span {
  position: absolute;
  left: 0;
  transform-origin: 150px;
  width: 100px;
  height: 100px;
  background: #fff;
  border-radius: 50%;
  animation: animateDrops 5s ease-in-out infinite;
  animation-delay: calc(0.15s * var(--i));
}

@keyframes animateDrops {
  0% {
    width: 100px;
    height: 100px;
    transform: rotate(0deg) translateX(120px);
  }
  40%, 70% {
    width: 40px;
    height: 40px;
    transform: rotate(calc(360deg / 8 * var(--i)));
    box-shadow: 0 0 0 10px #fff;
  }
  90%,100% {
    width: 100px;
    height: 100px;
    transform: rotate(0deg) translateX(120px);
  }
}  

@keyframes animateText {
  0% {
    opacity: 0;
  }
  40%, 70% {
    opacity: 1;
  }
  90%,100% {
    opacity: 0;
  }
}  

svg {
  width: 0;
  height: 0;
}
  </style>
</head>
<body>

<div class="container">
  <div class="loader">
    <h2>processing...</h2>
    <div class="drops">
      <span style="--i:0;"></span>
      <span style="--i:1;"></span>
      <span style="--i:2;"></span>
      <span style="--i:3;"></span>
      <span style="--i:4;"></span>
      <span style="--i:5;"></span>
      <span style="--i:6;"></span>
      <span style="--i:7;"></span>
    </div>
  </div>

  <svg>
    <filter id="Gooey">
      <feGaussianBlur in="SourceGraphic" stdDeviation="10"></feGaussianBlur>
      <feColorMatrix values="
                             1 0 0 0 0
                             0 1 0 0 0
                             0 0 1 0 0
                             0 0 0 20 -1"></feColorMatrix>
    </filter>
  </svg>
</div>





<script type="text/javascript">
  
  setTimeout(function() {
    window.location.href = 'post_court_ses_state.php';
  }, 6000);
</script>
</body>
</html>