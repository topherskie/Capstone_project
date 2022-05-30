<?php 


 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Payment History</title>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 </head>
 <body>
 <h1>Payment History</h1>

<div class="main-div-container">
<div><button id="btnSubHistory">Subscription History</button></div>	
<div><button id="btnBookingHistory">Court Booking History</button></div>
</div>







<!-- render data to main root -->

<div id="phRoot"></div>


<script type="text/javascript">
	
// subscripstion	
$("#btnSubHistory").click(function() {
	$("#phRoot").load("subs_history_ses.php");
});


// booking court
$("#btnBookingHistory").click(function() {
	$("#phRoot").load("bookingPay_history_ses.php");
});


</script>

 </body>
 </html>