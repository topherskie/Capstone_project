<?php require 'inc/header_ses.php'; ?>

<?php 
error_reporting(0);
$userIdno;
$userFirstname;
$userLastname;
$chatIdno = '';
$chatIdnoOthers = '';
// initialize values for chat
if(isset($_GET['btnMsg'])) {


$chatIdnoOthers = $_GET['chatIdno'];

$chatIdnoOthers;
// query the me_name - the player who click the MESSAGE btn
    $sqlUserMe = "SELECT * FROM users WHERE user_id='$userIdno'";
    $queryMeName = mysqli_query($conn, $sqlUserMe);
    $resultMeName = mysqli_fetch_assoc($queryMeName);

	$me_nameFull = $resultMeName['user_firstname'] . ' ' . $resultMeName['user_lastname'];
 $me_nameFull;
//echo "<br>";


// query the other - the organizer fullname 
$sqlUserOther = "SELECT * FROM users WHERE user_id='$chatIdnoOthers'";
$queryOtherName = mysqli_query($conn, $sqlUserOther);
    $resultOtherName = mysqli_fetch_assoc($queryOtherName);

$other_nameFull = $resultOtherName['user_firstname'] . ' ' . $resultOtherName['user_lastname'];

//echo $other_nameFull;

 	// check if data exist 
    $checkChatOrg = "SELECT * FROM chat_routes WHERE me='$userIdno' AND other='$chatIdnoOthers'";
    $queryChatOrg = mysqli_query($conn, $checkChatOrg);
    $checkChatOrg = mysqli_num_rows($queryChatOrg);




    if($checkChatOrg > 0) {
      //echo 'connection already establish';
    } else {

        $sqlInsertChatRoutes = "INSERT INTO chat_routes (me, other, me_name, other_name) VALUES ('$userIdno', '$chatIdnoOthers', '$me_nameFull', '$other_nameFull')";

    if ($conn->query($sqlInsertChatRoutes) === TRUE) {
        //echo "New record created successfully";


  } else {
      echo "Error: " . $sqlInsertChatRoutes . "<br>" . $conn->error;
  }

    } // end of upper else





} // END OF btnMsg

$sqlChatOthers = "SELECT user_firstname, user_lastname FROM users WHERE user_id='$chatIdnoOthers'";
  $resultChatOthers = $conn->query($sqlChatOthers) or die($conn->error);
  $fetchChatOthers = $resultChatOthers->fetch_assoc();

  $fetchCompleteName = $fetchChatOthers['user_firstname'] . ' ' . $fetchChatOthers['user_lastname'];


 ?>




 <!DOCTYPE html>
  <html>
  <head>
  	<meta charset="utf-8">
  	<title>Chat</title>
  	<script>
(function(t,a,l,k,j,s){
s=a.createElement('script');s.async=1;s.src="https://cdn.talkjs.com/talk.js";a.head.appendChild(s)
;k=t.Promise;t.Talk={v:3,ready:{then:function(f){if(k)return new k(function(r,e){l.push([f,r,e])});l
.push([f])},catch:function(){return k&&new k()},c:l}};})(window,document,[]);
</script>
  </head>
  <body>
	  		




<div id="talkjs-container" style="width: 90%; margin: 20px; height: 500px">
  <i>Loading chat...</i>
</div>


<script type="text/javascript" defer>
	
const userIdno = '<?php echo $userIdno; ?>';
const chatOther = '<?php echo $chatIdnoOthers; ?>';

const sesIdnoName = '<?php echo $userFirstname . ' ' . $userLastname; ?>';
const sesOthers = '<?php echo $fetchCompleteName; ?>';

Talk.ready.then(function () {

  var me = new Talk.User({
    id: userIdno,
    name: sesIdnoName,
    email: 'alice@example.com',
    photoUrl: 'img_profiles/laligaLogo.png',
    welcomeMessage: '.',
  });

  window.talkSession = new Talk.Session({
    appId: 'touhrrBJ',
    me: me,
  });

  var other = new Talk.User({
    id: chatOther,
    name: sesOthers,
    email: 'Sebastian@example.com',
    photoUrl: 'img_profiles/laligaLogo.png',
    welcomeMessage: '.', 
  });
  
  var conversation = talkSession.getOrCreateConversation(
    Talk.oneOnOneId(me, other)
  );

  conversation.setParticipant(me);
  conversation.setParticipant(other);

  var inbox = talkSession.createInbox({ selected: conversation });
  inbox.mount(document.getElementById('talkjs-container'));
  
});



</script>
<?php require 'inc/footer.php'; ?>