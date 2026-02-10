<?php
    require '../connection.php';
    if(isset($_POST['register'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
        $register="INSERT INTO tbl_user (username,email,password)
        VALUES ('$username','$email','$password')";
        $ex=$conn->query($register);
        if($ex){
            header('location: login.php');
        }
    }