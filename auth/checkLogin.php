<?php 
    require '../connection.php';
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $select="SELECT password,is_admin FROM tbl_user WHERE email='$email'";
        $ex=mysqli_query($conn,$select);
        $row=mysqli_fetch_assoc($ex);
        if(password_verify($password,$row['password'])){
            setcookie('is_admin',$row['is_admin'],time()+(86400 *7),'/');
            if($row['is_admin']==1){
                header('location:../admin/dashboard.php');
            }else{
                header('location:../user/user.php');
            }
        }else{
            echo '<script>alert("khos...!")</script>';
        }
    }