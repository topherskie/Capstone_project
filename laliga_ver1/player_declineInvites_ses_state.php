<?php 
require 'configs/db.php';

// DECLINE MATCH REQUEST DELETE WHILE SEINDING A EMAIL
$txtRequesterEmails = '';
$txtsesEmails = '';
$txtInviteIdno = '';
if(isset($_GET['btnDeclineInvite'])) {
    $txtRequesterEmails = $_GET['txtRequesterEmails'];
    $txtsesEmails = $_GET['txtsesEmails']; 
    $txtInviteIdno = $_GET['txtInviteIdno']; 


// sql to delete a record
$sqlDeleteInvite = "DELETE FROM recruit_inivites WHERE invite_idno='$txtInviteIdno'";


if ($conn->query($sqlDeleteInvite) === TRUE) {
  //echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}


    

} // END OF DECLINE INVITE

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Databases</title>
 	<script src="https://smtpjs.com/v3/smtp.js">
</script>
 </head>
 <body>




<script type="text/javascript">
let txtRequesterEmails = "<?php echo $txtRequesterEmails; ?>";
let txtsesEmails = "<?php echo $txtsesEmails; ?>";

console.log(txtRequesterEmails);
console.log(txtsesEmails);

const msgBookDecline = `
<h4>Laliga Pilipinas</h4>
    <br>
     <img src='https://cdn.pixabay.com/photo/2019/06/10/15/11/basketball-4264543__480.png' alt='basketball logo'>
    <p>Hello! The recruit player has been declined. Thank you</p>
`;


function sendDeclineMsgInvites() {
	Email.send({
    Host : "smtp.elasticemail.com",
    Username : "tophersanchez777@gmail.com",
    Password : "E51A979BF7F40C7BC792FD2D7EEEA1BC8C2E",
    To : txtRequesterEmails,
    From : "tophersanchez777@gmail.com",
    Subject : "Decline Match request.",
    Body : msgBookDecline,
}).then((message) => {
  console.log(message);
});

} // end of sendDeclineMsgInvites



function sendDeclineMsgInvites2() {
	Email.send({
    Host : "smtp.elasticemail.com",
    Username : "tophersanchez777@gmail.com",
    Password : "E51A979BF7F40C7BC792FD2D7EEEA1BC8C2E",
    To : txtsesEmails,
    From : "tophersanchez777@gmail.com",
    Subject : "Decline Match request.",
    Body : msgBookDecline,
}).then((message) => {
  console.log(message);
});

} // end of sendDeclineMsgInvites


sendDeclineMsgInvites();
sendDeclineMsgInvites2();






setTimeout(function() {
         window.location.href = `profile_ses_state.php`;
      },7000)

 	</script>
 
 </body>
 </html>