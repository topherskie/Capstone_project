<?php 
include "configs/db.php";


$sqlViewRequest = "SELECT * FROM docs_organizer";
$resultViewRequest = mysqli_query($conn, $sqlViewRequest);


// UPDATE TO accepted
if(isset($_POST['btnApprovedDocs'])) {
$docIdno = $_POST['docIdno'];
$user_idnoPromo = $_POST['user_idnoPromo'];
$sqlDocs = "UPDATE docs_organizer SET doc_status='accepted' WHERE doc_idno='$docIdno'";



if ($conn->query($sqlDocs) === TRUE) {
  echo "Approved successfully";
  header("Location: 0_admin.php");

} else {
  echo "Error updating record: " . $conn->error;
}

// dupate user profile status to organizer and verified user table
$sqlUserUpgradeType = "UPDATE user set user_type_upgrade='Organizer', quality_status='Verified' WHERE user_idno='$user_idnoPromo '";

if ($conn->query($sqlUserUpgradeType) === TRUE) {
  echo "Approved successfully";
  header("Location: 0_admin.php");

} else {
  echo "Error updating record: " . $conn->error;
}

} // end of main IF ELSE 






$conn->close();

 ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>
</head>
<body>

<ul>
  <li><a class="active" href="#home">Home</a></li>
   <li><a class="active" href="#home">Organizer Request</a></li>
</ul>


<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Doc ID</th>
      <th scope="col">Requester ID</th>
      <th scope="col">Player Name</th>
      <th scope="col">Doc Type</th>
      <th scope="col">Doc File name</th> 
      <th scope="col">Doc Status</th>
      <th scope="col">Date Submitted</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

<?php while($rowDocs = $resultViewRequest->fetch_assoc()): ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $rowDocs['doc_idno']; ?></th>
      <td><?php echo $rowDocs['user_idno']; ?></td>
      <td><?php echo $rowDocs['player_name']; ?></td>
      <td><?php echo $rowDocs['doc_type']; ?></td>
      <td>
		<p><?php echo $rowDocs['doc_file_name']; ?></p>
      	<a href="docs_file/<?php echo $rowDocs['doc_file_name']; ?>" download>Doc Download</a>
      	<a href="docs_file/<?php echo $rowDocs['doc_file_name']; ?>" target="_blank">View (PDF ONLY)</a>
      </td>
      <td><?php echo $rowDocs['doc_status']; ?></td>
       <td><?php echo $rowDocs['doc_timestamp']; ?></td>
      <td>
      	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      		<input type="hidden" name="docIdno"  value="<?php echo $rowDocs['doc_idno']; ?>">
      		<input type="submit" name="btnApprovedDocs" value="Approved" id="btnA">
      		<br>	
          <input type="hidden" name="user_idnoPromo" value="<?php echo $rowDocs['user_idno']; ?>">
      		<input type="submit" name="btnDeclineDocs" value="Decline" >
      	</form>
      </td>
    </tr>
  </tbody>
 <?php endwhile; ?>

</table>




<script type="text/javascript">
	
	

</script>

</body>
</html>