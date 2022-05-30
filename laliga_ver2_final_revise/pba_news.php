<?php 


// initialization
// From URL to get webpage contents.
$url = "https://www.pba.ph/news";
 
// Initialize a CURL session.
$ch = curl_init();
 
// Return Page contents.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
//grab URL and pass it to the variable.
curl_setopt($ch, CURLOPT_URL, $url);
 
$result = curl_exec($ch);
 
// echo $result;

curl_close($ch);
 ?>


 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <title>cURL Test</title>
 </head>
 <body>
  <style type="text/css">
    .main-container {
      padding: 12px;
      margin-top: 55px;
 
    }
  </style>
 <div class="main-container"><button><a href="player_home_ses.php">BACK TO PAGE</a></button></div>

<br>
 <div>
  <?php echo $result; ?>
 </div>
 </body>
 </html>
