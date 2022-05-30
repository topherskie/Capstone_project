<?php include 'inc/header_login_state.php'; ?>
<?php
	
  echo  $sesIdno . "<BR>";
  echo $sesUser . "<BR>";;
  echo  $sesUserType . "<BR>";




 

  if(isset($_POST['btnChatMatch'])) {

  	$txtPostMatchCurrentIdno = $_POST['txtPostMatchCurrentIdno'];
  	//echo $txtPostMatchCurrentIdno;

    // me name 
    $getMeName = "SELECT * FROM user WHERE user_idno='$txtPostMatchCurrentIdno'";
    $queryMeName = mysqli_query($conn, $getMeName);
    $resultMeName = mysqli_fetch_assoc($queryMeName);

    $meName = $resultMeName['user_fname'] . ' ' . $resultMeName['user_lname'];


     // other name  
    $getMeOther = "SELECT * FROM user WHERE user_idno='$sesIdno'";
    $queryMeOther = mysqli_query($conn, $getMeOther);
    $resultMeOther = mysqli_fetch_assoc($queryMeOther);

    $meOther = $resultMeOther['user_fname'] . ' ' . $resultMeOther['user_lname'];




    // check if data me, other exist me = current login user
    $checkMsgPlayer = "SELECT * FROM chat_routes_players WHERE me='$sesIdno' AND other='$txtPostMatchCurrentIdno' and me='$txtPostMatchCurrentIdno' and other='$sesIdno'";
    $checkQueryPlayer = mysqli_query($conn, $checkMsgPlayer);
    $resultRowPlayer = mysqli_num_rows($checkQueryPlayer);

    if($resultRowPlayer > 0) {
      echo 'data connection P2P exist';
    } else {

    $sqlInsertChatRoutes = "INSERT INTO chat_routes_players (me, other, mep_name, otherp_name) VALUES ('$sesIdno', '$txtPostMatchCurrentIdno', '$meName', '$meOther')";

    if ($conn->query($sqlInsertChatRoutes) === TRUE) {
        echo "New record created successfully";
  } else {
      echo "Error: " . $sqlInsertChatRoutes . "<br>" . $conn->error;
  }


    }



  


  } // end of main IF ELSE


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Find Match Chat</title>
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
const chatOther = '<?php echo $txtPostMatchCurrentIdno; ?>';

Talk.ready.then(function () {

  var me = new Talk.User({
    id: sesIdno,
    name: sesIdno,
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
    name: chatOther,
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