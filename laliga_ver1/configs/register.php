<?php

 require 'db.php';


  if(isset($_POST['btnRegister'])) {
    $txtUser = trim($_POST['txtUser']);
    $txtEmail = trim($_POST['txtEmail']);
    $txtFname = trim($_POST['txtFname']);
    $txtMi = trim($_POST['txtMi']);
    $txtLname = trim($_POST['txtLname']);
    $txtPwd = trim($_POST['txtPwd']);
    $txtGender = trim($_POST['txtGender']);
    $txtDob = trim($_POST['txtDob']);
    $txtAddress = trim($_POST['txtAddress']);
    $txtContactNo = trim($_POST['txtContactNo']);
    $txtUserType = trim($_POST['txtUserType']);
    $txtUserCity = trim($_POST['txtUserCity']);

    $sql_insert = "INSERT INTO user (user_type, user_email, user_username, user_password, user_fname, user_mname, user_lname, user_dob, city, user_address, user_gender, user_contact_no) VALUES('$txtUserType', '$txtEmail', '$txtUser', '$txtPwd', '$txtFname', '$txtMi', '$txtLname', '$txtDob', '$txtUserCity', '$txtAddress', '$txtGender', '$txtContactNo')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
      }

      $conn->close();

  }





 ?>
