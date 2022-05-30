<?php 

require 'configs/db.php';


$sql ="SELECT casual_matches.cm_idno, casual_matches.user_idno, casual_matches.cm_desc, casual_matches.cm_location, 
casual_matches.cm_date_posted, casual_matches.cm_date_game, casual_matches.cm_start_time, casual_matches.cm_end_time,  match_requesters.mr_status FROM casual_matches LEFT OUTER JOIN match_requesters ON casual_matches.cm_idno = match_requesters.cm_idno";
$result = mysqli_query($conn, $sql);
//$sqlData = mysqli_fetch_assoc($result);


while($row = mysqli_fetch_array($result)) {
  echo "<br>";
  echo $row['user_idno'];
   echo "<br>";
  echo $row['cm_desc'];
   echo "<br>";
  echo $row['mr_status'];
   echo "<br>";
  echo $row['cm_location'];
}



 ?>
