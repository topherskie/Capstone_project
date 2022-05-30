<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test email</title>
	<script src="https://smtpjs.com/v3/smtp.js">
</script>
<style type="text/css">
	.g {
		color: red;
		font-weight: bold;
	}
</style>
</head>
<body>
p 

<button id="sendMail">Click</button>


<script type="text/javascript">
let sendMail = document.getElementById("sendMail");
const steve ="hello this is steve";



sendMail.addEventListener("click", function() {


	Email.send({
    Host : "smtp.elasticemail.com",
    Username : "tophersanchez777@gmail.com",
    Password : "E51A979BF7F40C7BC792FD2D7EEEA1BC8C2E",
    To : 'techtofer@gmail.com',
    From : "tophersanchez777@gmail.com",
    Subject : "This is the subject",
    Body : '<h1 class="g">hello</h1>'
}).then(
  message => alert(message)
);


});



</script>
</body>
</html>