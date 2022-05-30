<?php include 'configs/server.php'; ?>
<?php


session_destroy();

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <style type="text/css">
       * {
  box-sizing: border-box;
}
body {
  margin: 0;
  font-family: "Cairo", sans-serif;
  background-color: black;
}
div {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  color: white;
}
div span {
  font-size: 80px;
  letter-spacing: 5px;
  text-transform: uppercase;
  line-height: 1;
  mix-blend-mode: difference;
}
div::before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  width: 100px;
  height: 100%;
  background-color: white;
  animation: move 4s linear infinite;
}
@keyframes move {
  0%,
  100% {
    left: 0;
  }
  50% {
    left: calc(100% - 100px);
  }
}
     </style>
   </head>
   <body>
     <div>
  <span>See you soon.</span>
</div>


     <script>
        setTimeout(() => {
          window.location.href = 'index.php';
        }, 3100);
     </script>
   </body>
 </html>
