

// grab the 2 ids contains sessionIDNO and 
const txtChatMe = document.getElementById("txtChatMe");
const txtChatOther = document.getElementById("txtChatOther");

	

Talk.ready.then(function () {

  var me = new Talk.User({
    id: txtChatMe.value,
    name: 'test1',
    email: 'alice@example.com',
    photoUrl: 'https://i.pinimg.com/1200x/5d/a0/8d/5da08d24bc4c7d2847ee5dfa1604b114.jpg',
    welcomeMessage: 'Hey there! How are you? :-)',
  });

  window.talkSession = new Talk.Session({
    appId: 'touhrrBJ',
    me: me,
  });

  var other = new Talk.User({
    id: txtChatOther.value,
    name: 'jen2',
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






