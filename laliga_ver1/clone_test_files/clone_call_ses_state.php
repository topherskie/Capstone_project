<?php include 'inc/header_login_state.php'; ?>
<?php 
  
  echo  $sesIdno . "<BR>";
  echo $sesUser . "<BR>";;
  echo  $sesUserType . "<BR>";
  echo $sesFname;
  echo $sesLname;

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Videosdk.live RTC</title>
  </head>
  <body>

    <div id="root"></div>
    <script>
      var script = document.createElement("script");
      script.type = "text/javascript";
      //
      script.addEventListener("load", function (event) {
        // Initialize the factory function
        const meeting = new VideoSDKMeeting();

        // Set apikey, meetingId and participant name
        const apiKey = "09e58463-d119-4c79-aa23-9739c1069de5"; // generated from app.videosdk.live
        const meetingId = "laliga";
        const name = "John Doe";

        const config = {
          name: name,
          apiKey: apiKey,
          meetingId: meetingId,

          containerId: null,
          redirectOnLeave: "https://phpstack-762753-2582918.cloudwaysapps.com/home_ses_state.php",

          micEnabled: true,
          webcamEnabled: true,
          participantCanToggleSelfWebcam: true,
          participantCanToggleSelfMic: true,

          chatEnabled: true,
          screenShareEnabled: true,
          pollEnabled: true,
          whiteboardEnabled: true,
          raiseHandEnabled: true,

          recordingEnabled: true,
          recordingEnabledByDefault: false,
          recordingWebhookUrl: "https://www.videosdk.live/callback",
          recordingAWSDirPath: `/meeting-recordings/${meetingId}/`, // automatically save recording in this s3 path

          brandingEnabled: true,
          brandLogoURL: "https://picsum.photos/200",
          brandName: "Laliga Pilipinas",
          poweredBy: true,

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
            title: "Ballers Meeting", // Meeting title
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
    </script>
  </body>
</html>