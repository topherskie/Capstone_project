<?php include 'inc/header_login_state.php'; ?>

<?php 
echo  $sesIdno . "<BR>";
echo $sesUser . "<BR>";;
echo  $sesUserType . "<BR>";

// $sucessSub =  $_SESSION["currentPayIdno"];
		
$sqlCheckPay ="SELECT * FROM payment_tracker WHERE user_idno='$sesIdno'";
$resultPay = mysqli_query($conn, $sqlCheckPay) or die( mysqli_error($conn));
$resultCurrentSub = mysqli_fetch_array($resultPay);

// echo $resultCurrentSub['payment_idno'];
// set date format correctly first.
//var_dump($resultCurrentSub['date_sub_started']);
$datas = $resultCurrentSub['date_sub_started'];
$dateConvert = strtotime($datas);
$currentStartDate = date("m-d-Y", $dateConvert);

echo $currentStartDate;

// calculate date base on sub 30 days
$dateExpirationDate = date('m-d-Y', strtotime($currentStartDate . ' + 30 days'));
echo "<br>";
echo $dateExpirationDate;

// check dates 
$subDurationDate =  new DateTime($dateExpirationDate); // getting the exp date duration enddate
$now = new DateTime();

// check the expiration date of the subscription
if($subDurationDate < $now) {
	echo 'date is in the past';
	// if pass the time create trigger to save the dates of subscroption to another table and delete current table so user can subscript another information.
	// retrict access to paid address
	// create trigger for this 1
} else {
	echo 'user still within subscription period';
}




 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Recruit</title>
</head>
<body>
<div class="alert alert-success text-center" role="alert">
 <h3> Congratulations you have successfully unlock more features!</h3>
</div>



<script type="text/javascript">

const href = "recruit_players_ses_state.php";	

routeToPage(href);

function routeToPage(page) {
		setTimeout(() => {
		window.location.href = page;
	}, 2000);
}

</script>

</body>
</html>