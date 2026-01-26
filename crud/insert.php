<?php
    include 'connection.php';
    if(isset($_POST['btnSubmit'])){
        $name=$_POST['name'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $position=$_POST['position'];
        $salary=$_POST['salary'];
        $insert="INSERT INTO tbl_employee (name,gender,email,position,salary) 
        VALUES ('$name','$gender','$email','$position','$salary')
        ";
        $execute=mysqli_query($conn,$insert);
        if($execute){
            header('location: form.php');
        }
    }