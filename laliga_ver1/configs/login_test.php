<?php
require 'db.php';
 session_start();




 if(isset($_POST['btnLogin'])) {

    // grab user type to check if player or court_owner
    $txtUserType = ($_POST['txtUserType']);
 
    $txtLogUser = trim($_POST['txtLogUser']);
   $txtLogPwd = trim($_POST['txtLogPwd']);

    $sqlCheckUser = "SELECT * FROM user WHERE  user_username='txtLogUser' AND user_password='$txtLogPwd'";
    $sqlCheckResultUser = mysqli_query($conn, $sqlCheckUser);
    $sqlNumRowsUser = mysqli_num_rows($sqlCheckResultUser);

    if($sqlNumRowsUser < 0) {
        echo 'no data found';
    } else {

        $sql_select = "SELECT * FROM user WHERE user_username = '$txtLogUser' AND user_password='$txtLogPwd' OR user_email='$txtLogUser'";
        $result = $conn->query($sql_select);

        if($row = mysqli_fetch_array($result)) {
            $_SESSION['user_idno'] = $row['user_idno'];
            $_SESSION['user_username'] = $row['user_username'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['user_fname'] = $row['user_fname'];
            $_SESSION['user_lname'] = $row['user_lname'];
            $_SESSION['user_email'] = $row['user_email'];
            header("location: home_ses_state.php"); // route to player page
   
         } else {
           echo 'no records match or user type invalid';
         }

        
    }


 } // end of login ifelse
 

 ?>