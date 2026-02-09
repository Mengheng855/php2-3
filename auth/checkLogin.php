<?php 
    require '../connection.php';
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $select="SELECT password FROM tbl_user WHERE email='$email'";
        $ex=mysqli_query($conn,$select);
        $row=mysqli_fetch_assoc($ex);
        if($password==$row['password']){
            header('location:../user/user.php');
        }else{
            echo '<script>alert("khos...!")</script>';
        }
    }