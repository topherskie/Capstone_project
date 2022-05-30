<?php include 'inc/header_login_state.php'; ?>
<?php 
  
  // echo  $sesIdno . "<BR>";
  // echo $sesUser . "<BR>";;
  // echo  $sesUserType . "<BR>";
  // echo $sesFname;
  // echo $sesLname;

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ballers Meet</title>
    
    <style type="text/css">
      .main-call-container {
      /*  */
        display:  flex;
        text-align: center;
        justify-content: center;
        padding:  12px;
        margin:  8px;
        border-radius: 1em;
        color: grey;
      }

      .call-one-container {
          border:  2px solid gray;
          padding:  12px;
          margin:  8px;
          border-radius: 1em;
          
      }

      .call-two-container {
        border:  2px solid gray;
        padding:  12px;
        margin:  8px;
        border-radius: 1em;
        
      }

      .effect1{
      -webkit-box-shadow: 0 10px 6px -6px #777;
     -moz-box-shadow: 0 10px 6px -6px #777;
          box-shadow: 0 10px 6px -6px #777;
    }



    @media only screen and (max-width: 600px) {
 .main-call-container  {
    display: block;
  }
}


    </style>
  </head>
  <body>
    
    <div class="main-call-container form-group">

      <div class="call-one-container effect1">
         <div><h5>Meet ID: </h5><h5 id="txtMeetID"></h5></div>
        <label>Join Meeting</label>
        <input type="text" id="txtMeetId" placeholder="enter meeting ID" required>
        <div>
          <button id="btnStartNow" class="btn btn-outline-primary">Start Now</button>
        </div>
      </div>
      <br>
        
      <div class="call-two-container effect1">
        <h5>Generate Meet ID</h5>
        <button id="btnStartMeet" class="btn btn-outline-primary">Start Meet</button>
        </div>

        

    </div>




    <div id="root"></div>






















<script defer>
const sesIdno = "<?php echo $sesIdno; ?>";
const sesFname = "<?php echo $sesFname; ?>";
const sesLname = "<?php echo $sesLname; ?>";
const userFullname = sesFname + ' ' + sesLname;
const btnStartMeet = document.getElementById("btnStartMeet");
const btnStartNow = document.getElementById("btnStartNow");
const txtMeetID = document.getElementById("txtMeetID");

// start the meeting 
let txtMeetId = document.getElementById("txtMeetId");
// program to generate random strings

// declare all characters
const characters ='abcdefghijklmnopqrstuvwxyz0123456789';

function generateString(length) {
    let result = ' ';
    const charactersLength = characters.length;
    for ( let i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result;
}

// set randomString and concat with current sesIdno
const randMeetID = generateString(5)
const sesMeetID = randMeetID + sesIdno;
console.log(sesMeetID);






btnStartMeet.addEventListener("click", function() {

txtMeetID.textContent = sesMeetID;
btnStartNow.style.display = 'block';
 txtMeetId.value = sesMeetID.trim();

});











btnStartNow.addEventListener("click", function() {

 var script = document.createElement("script");
      script.type = "text/javascript";
      //
      script.addEventListener("load", function (event) {
        // Initialize the factory function
        const meeting = new VideoSDKMeeting();
       

        // Set apikey, meetingId and participant name
        const apiKey = "09e58463-d119-4c79-aa23-9739c1069de5"; // generated from app.videosdk.live
        const meetingId = txtMeetId.value;
        const name = userFullname;

       


        const config = {
          name: name,
          apiKey: apiKey,
          meetingId: meetingId,

          containerId: null,
          redirectOnLeave: "http://localhost/0_capstone/laliga_pilipinas_ver1/call_ses_state.php",

          micEnabled: true,
          webcamEnabled: true,
          participantCanToggleSelfWebcam: true,
          participantCanToggleSelfMic: true,

          chatEnabled: true,
          screenShareEnabled: true,
          pollEnabled: true,
          whiteboardEnabled: true,
          raiseHandEnabled: true,

          recordingEnabled: false,
          recordingEnabledByDefault: false,
          recordingWebhookUrl: "https://www.videosdk.live/callback",
          recordingAWSDirPath: `/meeting-recordings/${meetingId}/`, // automatically save recording in this s3 path

          brandingEnabled: true,
          brandLogoURL: "https://media.istockphoto.com/vectors/vector-illustration-of-a-basketball-on-fire-with-a-dynamic-dark-a-vector-id1306258108?k=20&m=1306258108&s=612x612&w=0&h=tSCtrUNkPkFI0Fejaz7fEFI2I8VbqDklTupP-Ctg4W4=",
          brandName: "Laliga Pilipinas",
          poweredBy: false,

          participantCanLeave: true, // if false, leave button won't be visible

          // Live stream meeting to youtube
          livestream: {
            autoStart: true,
            outputs: [
              // {
              //   url: "rtmp://x.rtmp.youtube.com/live2",
              //   streamKey: "<STREAM KEY FROM YOUTUBE>",
              // },
            ],
          },

          permissions: {
            askToJoin: false, // Ask joined participants for entry in meeting
            toggleParticipantMic: true, // Can toggle other participant's mic
            toggleParticipantWebcam: true, // Can toggle other participant's webcam
            removeParticipant: true, // Remove other participant from meeting
            endMeeting: true, // End meeting for all participant
            drawOnWhiteboard: true, // Can Draw on whiteboard
            toggleWhiteboard: true, // Can toggle whiteboard
            toggleRecording: true, // Can toggle recording
          },

          joinScreen: {
            visible: true, // Show the join screen ?
            title: meetingId, // Meeting title
            meetingUrl: window.location.href, // Meeting joining url
          },

          pin: {
            allowed: true, // participant can pin any participant in meeting
            layout: "SPOTLIGHT", // meeting layout - GRID | SPOTLIGHT | SIDEBAR
          },

          leftScreen: {
            // visible when redirect on leave not provieded
            actionButton: {
              // optional action button
              label: "Video SDK Live", // action button label
              href: "https://www.google.com/", // action button href
            },
          },
        };

        meeting.init(config);
      });

      script.src =
        "https://sdk.videosdk.live/rtc-js-prebuilt/0.1.26/rtc-js-prebuilt.js";
      document.getElementById("root").appendChild(script);


}); // END OF CREATING MEETING



















































</script>

  </body>
</html>