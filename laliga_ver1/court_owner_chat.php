<?php include 'inc/header_login_state.php'; ?>
<?php 
  
  echo  $sesIdno . "<BR>";
  echo $sesUser . "<BR>";;
  echo  $sesUserType . "<BR>";
  echo $sesFname;
  echo $sesLname;

$chatIdnoOthers = isset($_POST['chatIdno']);

  if(isset($_POST['btnChatCL'])) {

  	$chatIdnoOthers = $_POST['chatIdno'];
  	echo $chatIdnoOthers;

// query the me_name - the player who click the MESSAGE btn
    $sqlUserMe = "SELECT * FROM user WHERE user_idno='$sesIdno'";
    $queryMeName = mysqli_query($conn, $sqlUserMe);
    $resultMeName = mysqli_fetch_assoc($queryMeName);

    $me_nameFull = $resultMeName['user_fname'] . ' ' . $resultMeName['user_lname'];


// query the other - the organizer fullname 
$sqlUserOther = "SELECT * FROM user WHERE user_idno='$chatIdnoOthers'";
$queryOtherName = mysqli_query($conn, $sqlUserOther);
    $resultOtherName = mysqli_fetch_assoc($queryOtherName);

     $other_nameFull = $resultOtherName['user_fname'] . ' ' . $resultOtherName['user_lname'];


  // check if data exist 
    $checkChatOrg = "SELECT * FROM chat_routes WHERE me='$sesIdno' AND other='$chatIdnoOthers'";
    $queryChatOrg = mysqli_query($conn, $checkChatOrg);
    $checkChatOrg = mysqli_num_rows($queryChatOrg);

    if($checkChatOrg > 0) {
      echo 'connection already establish';
    } else {

        $sqlInsertChatRoutes = "INSERT INTO chat_routes (me, other, me_name, other_name) VALUES ('$sesIdno', '$chatIdnoOthers', '$me_nameFull', '$other_nameFull')";

    if ($conn->query($sqlInsertChatRoutes) === TRUE) {
        echo "New record created successfully";


  } else {
      echo "Error: " . $sqlInsertChatRoutes . "<br>" . $conn->error;
  }

    } // end of upper else


  } // end of bthchatCL

echo $chatIdnoOthers;
  

  $sqlChatOthers = "SELECT user_lname, user_fname FROM user WHERE user_idno='$chatIdnoOthers'";
  $resultChatOthers = $conn->query($sqlChatOthers) or die($conn->error);
  $fetchChatOthers = $resultChatOthers->fetch_assoc();

  $fetchCompleteName = $fetchChatOthers['user_fname'] . ' ' . $fetchChatOthers['user_lname'];

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
	
const sesIdno = '<?php echo $sesIdno; ?>';
const chatOther = '<?php echo $chatIdnoOthers; ?>';

const sesIdnoName = '<?php echo $sesFname . ' ' . $sesLname; ?>';
const sesOthers = '<?php echo $fetchCompleteName; ?>';

Talk.ready.then(function () {

  var me = new Talk.User({
    id: sesIdno,
    name: sesIdnoName,
    email: 'alice@example.com',
    photoUrl: 'https://i.pinimg.com/1200x/5d/a0/8d/5da08d24bc4c7d2847ee5dfa1604b114.jpg',
    welcomeMessage: 'Hey there! How are you? :-)',
  });

  window.talkSession = new Talk.Session({
    appId: 'touhrrBJ',
    me: me,
  });

  var other = new Talk.User({
    id: chatOther,
    name: sesOthers,
    email: 'Sebastian@example.com',
    photoUrl: 'https://demo.talkjs.com/img/sebastian.jpg',
    welcomeMessage: 'Hey, how can I help?', 
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

  </body>
  </html>