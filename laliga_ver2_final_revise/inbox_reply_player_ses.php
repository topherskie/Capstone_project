<?php require 'inc/header_ses.php'; ?>

<?php 

 $userIdno . "<BR>";
  
    $userType . "<BR>";

  $dataSesIdno = '';
   $dataSesIdnoOther = '';
  $toResponse = isset($_POST['toResponse']);
  if (isset($_POST['btnPlayerChatReply'])) {
    $cmCurrentSesIdno = $_POST['dataChatOthers'];
     "<br>";
     $toResponse = $_POST['dataChatMe'];



    if($userIdno != $cmCurrentSesIdno) {
      $dataSesIdno =  $cmCurrentSesIdno;
      $dataSesIdnoOther = $toResponse;
    } else if($userIdno == $cmCurrentSesIdno) {
      $dataSesIdno =  $toResponse;
      $dataSesIdnoOther = $cmCurrentSesIdno;
    }

  }



// $sqlChatOthers = "SELECT user_lname, user_fname FROM user WHERE user_idno='$toResponse'";
//   $resultChatOthers = $conn->query($sqlChatOthers) or die($conn->error);
//   $fetchChatOthers = $resultChatOthers->fetch_assoc();

//   $fetchCompleteName = $fetchChatOthers['user_fname'] . ' ' . $fetchChatOthers['user_lname'];


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

const dataSesIdno = '<?php echo $dataSesIdno; ?>';
const dataSesIdnoOther = '<?php echo  $dataSesIdnoOther; ?>';
//const fetchCompleteName = '<?php// echo $fetchChatOthers['user_fname'] . ' ' . $fetchChatOthers['user_lname']; ?>';

console.log(dataSesIdno);
console.log(dataSesIdnoOther);

Talk.ready.then(function () {

  var me = new Talk.User({
    id: dataSesIdnoOther,
    name: dataSesIdnoOther,
    email: 'alice@example.com',
    photoUrl: 'https://i.pinimg.com/1200x/5d/a0/8d/5da08d24bc4c7d2847ee5dfa1604b114.jpg',
    
  });

  window.talkSession = new Talk.Session({
    appId: 'touhrrBJ',
    me: me,
  });

  var other = new Talk.User({
    id:dataSesIdno,
    name: dataSesIdno,
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