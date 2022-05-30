<?php require 'inc/header_ses.php'; ?>

<?php 

 $userIdno . "<BR>";
   $userType . "<BR>";

  
  $toResponse = isset($_POST['toResponse']);
  if (isset($_POST['btnChatReply'])) {
    $cmCurrentSesIdno = $_POST['dataChatOthers'];
    $toResponse = $_POST['dataChatMe'];
  }



$sqlChatOthers = "SELECT user_firstname, user_lastname FROM users WHERE user_id='$toResponse'";
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





<script type="text/javascript">
const cmCurrentSesIdno = '<?php echo $_POST['dataChatOthers']; ?>';
const toResponse = '<?php echo $toResponse; ?>';
const fetchCompleteName = '<?php echo $fetchChatOthers['user_firstname'] . ' ' . $fetchChatOthers['user_lastname']; ?>';


Talk.ready.then(function () {

  var me = new Talk.User({
    id: cmCurrentSesIdno,
    name: cmCurrentSesIdno,
    email: 'alice@example.com',
    photoUrl: 'https://i.pinimg.com/1200x/5d/a0/8d/5da08d24bc4c7d2847ee5dfa1604b114.jpg',
    
  });

  window.talkSession = new Talk.Session({
    appId: 'touhrrBJ',
    me: me,
  });

  var other = new Talk.User({
    id: toResponse,
    name:fetchCompleteName,
    email: 'Sebastian@example.com',
    photoUrl: 'https://demo.talkjs.com/img/sebastian.jpg',
    
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