<?php 
include 'inc/header_login_state.php'; 
 //require "configs/db.php";
	
// POST MATCH
    if(isset($_POST['btnPostMatch'])) {
        $cmDesc =  $_POST['cmDesc'];
        $cmCity =  $_POST['cmCity'];
      	$cmCurrentSesIdno = $_POST['cmCurrentSesIdno'];
        $cmDate = $_POST['cmDate'];
        $cmStartTime = $_POST['cmStartTime'];
        $cmEndTime = $_POST['cmEndTime']; 

       

        // query
       	$sqlInsertCm = "INSERT INTO casual_matches (user_idno, cm_desc, cm_location, cm_date_game, cm_start_time, cm_end_time, mr_fullname) VALUES ('$cmCurrentSesIdno', '$cmDesc', '$cmCity', '$cmDate', '$cmStartTime', '$cmEndTime', '$sesFullname')";

       if ($conn->query($sqlInsertCm) == TRUE) {
				 // echo "New record created successfully";
				} else {
				  echo "Error: " . $sqlInsertCm . "<br>" . $conn->error;
				}

				

    }  // end if main if else of isset
	



   // delete post
    if(isset($_POST['btnDeletePost'])) {
    	$currentPostIdno = $_POST['currentPostIdno'];

    	$sqlDeletePost = "DELETE FROM casual_matches WHERE cm_idno = '$currentPostIdno'";

    	if ($conn->query($sqlDeletePost) === TRUE) {
 			 //echo "Record deleted successfully";
			} else {
  			echo "Error deleting record: " . $conn->error;
		}

    } // END OF DELETE IF ELESE


// UPDATE/ EDIT

if(isset($_POST['btnUpdateSave'])) {
	 $cmDesc =  $_POST['cmDesc'];
      $cmCity =  $_POST['cmCity'];
      $cmCurrentIdnos = $_POST['cmCurrentIdno'];
      $cmDate = $_POST['cmDate'];
      $cmStartTime = $_POST['cmStartTime'];
      $cmEndTime = $_POST['cmEndTime']; 

      $sqlUpdatePosts = "UPDATE casual_matches SET cm_desc = '$cmDesc', cm_location = '$cmCity', cm_date_game = '$cmDate', cm_start_time='$cmStartTime', cm_end_time='$cmEndTime' WHERE cm_idno='$cmCurrentIdnos'";


      if ($conn->query($sqlUpdatePosts) === TRUE) {

  			//echo "Record updated successfully";
            
		} else {

 			 echo "Error updating record: " . $conn->error;  
	   }


} // END OF EDIT IF ELSE



 ?>

 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <title>FindMatch</title>
     <style type="text/css">
         #link {color: #E45635;display:block;font: 12px "Helvetica Neue", Helvetica, Arial, sans-serif;text-align:center; text-decoration: none;}
#link:hover {color: #CCCCCC}

#link, #link:hover {-webkit-transition: color 0.5s ease-out;-moz-transition: color 0.5s ease-out;-ms-transition: color 0.5s ease-out;-o-transition: color 0.5s ease-out;transition: color 0.5s ease-out;}

/** BEGIN CSS **/
        body {background: #333333;}
        @keyframes rotate-loading {
            0%  {transform: rotate(0deg);-ms-transform: rotate(0deg); -webkit-transform: rotate(0deg); -o-transform: rotate(0deg); -moz-transform: rotate(0deg);}
            100% {transform: rotate(360deg);-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); -o-transform: rotate(360deg); -moz-transform: rotate(360deg);}
        }

        @-moz-keyframes rotate-loading {
            0%  {transform: rotate(0deg);-ms-transform: rotate(0deg); -webkit-transform: rotate(0deg); -o-transform: rotate(0deg); -moz-transform: rotate(0deg);}
            100% {transform: rotate(360deg);-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); -o-transform: rotate(360deg); -moz-transform: rotate(360deg);}
        }

        @-webkit-keyframes rotate-loading {
            0%  {transform: rotate(0deg);-ms-transform: rotate(0deg); -webkit-transform: rotate(0deg); -o-transform: rotate(0deg); -moz-transform: rotate(0deg);}
            100% {transform: rotate(360deg);-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); -o-transform: rotate(360deg); -moz-transform: rotate(360deg);}
        }

        @-o-keyframes rotate-loading {
            0%  {transform: rotate(0deg);-ms-transform: rotate(0deg); -webkit-transform: rotate(0deg); -o-transform: rotate(0deg); -moz-transform: rotate(0deg);}
            100% {transform: rotate(360deg);-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); -o-transform: rotate(360deg); -moz-transform: rotate(360deg);}
        }

        @keyframes rotate-loading {
            0%  {transform: rotate(0deg);-ms-transform: rotate(0deg); -webkit-transform: rotate(0deg); -o-transform: rotate(0deg); -moz-transform: rotate(0deg);}
            100% {transform: rotate(360deg);-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); -o-transform: rotate(360deg); -moz-transform: rotate(360deg);}
        }

        @-moz-keyframes rotate-loading {
            0%  {transform: rotate(0deg);-ms-transform: rotate(0deg); -webkit-transform: rotate(0deg); -o-transform: rotate(0deg); -moz-transform: rotate(0deg);}
            100% {transform: rotate(360deg);-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); -o-transform: rotate(360deg); -moz-transform: rotate(360deg);}
        }

        @-webkit-keyframes rotate-loading {
            0%  {transform: rotate(0deg);-ms-transform: rotate(0deg); -webkit-transform: rotate(0deg); -o-transform: rotate(0deg); -moz-transform: rotate(0deg);}
            100% {transform: rotate(360deg);-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); -o-transform: rotate(360deg); -moz-transform: rotate(360deg);}
        }

        @-o-keyframes rotate-loading {
            0%  {transform: rotate(0deg);-ms-transform: rotate(0deg); -webkit-transform: rotate(0deg); -o-transform: rotate(0deg); -moz-transform: rotate(0deg);}
            100% {transform: rotate(360deg);-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); -o-transform: rotate(360deg); -moz-transform: rotate(360deg);}
        }

        @keyframes loading-text-opacity {
            0%  {opacity: 0}
            20% {opacity: 0}
            50% {opacity: 1}
            100%{opacity: 0}
        }

        @-moz-keyframes loading-text-opacity {
            0%  {opacity: 0}
            20% {opacity: 0}
            50% {opacity: 1}
            100%{opacity: 0}
        }

        @-webkit-keyframes loading-text-opacity {
            0%  {opacity: 0}
            20% {opacity: 0}
            50% {opacity: 1}
            100%{opacity: 0}
        }

        @-o-keyframes loading-text-opacity {
            0%  {opacity: 0}
            20% {opacity: 0}
            50% {opacity: 1}
            100%{opacity: 0}
        }
        .loading-container,
        .loading {
            height: 100px;
            position: relative;
            width: 100px;
            border-radius: 100%;
        }


        .loading-container { margin: 40px auto }

        .loading {
            border: 2px solid transparent;
            border-color: transparent #fff transparent #FFF;
            -moz-animation: rotate-loading 1.5s linear 0s infinite normal;
            -moz-transform-origin: 50% 50%;
            -o-animation: rotate-loading 1.5s linear 0s infinite normal;
            -o-transform-origin: 50% 50%;
            -webkit-animation: rotate-loading 1.5s linear 0s infinite normal;
            -webkit-transform-origin: 50% 50%;
            animation: rotate-loading 1.5s linear 0s infinite normal;
            transform-origin: 50% 50%;
        }

        .loading-container:hover .loading {
            border-color: transparent #E45635 transparent #E45635;
        }
        .loading-container:hover .loading,
        .loading-container .loading {
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
        }

        #loading-text {
            -moz-animation: loading-text-opacity 2s linear 0s infinite normal;
            -o-animation: loading-text-opacity 2s linear 0s infinite normal;
            -webkit-animation: loading-text-opacity 2s linear 0s infinite normal;
            animation: loading-text-opacity 2s linear 0s infinite normal;
            color: #ffffff;
            font-family: "Helvetica Neue, "Helvetica", ""arial";
            font-size: 10px;
            font-weight: bold;
            margin-top: 45px;
            opacity: 0;
            position: absolute;
            text-align: center;
            text-transform: uppercase;
            top: 0;
            width: 100px;
        }
     </style>
 </head>
 <body>
 

<div class="loading-container">
    <div class="loading"></div>
    <div id="loading-text">Processing..</div>
</div>


<script type="text/javascript">


  setTimeout(function() {
    window.location.href = 'findMatch_ses_state.php';
  }, 2000);
</script>
 </body>
 </html>