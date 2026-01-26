<?php
    include 'connection.php';
    if(isset($_POST['btnUpdate'])){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $position=$_POST['position'];
        $salary=$_POST['salary'];
        $update="UPDATE tbl_employee SET name='$name',
        gender='$gender',email='$email',position='$position',salary='$salary'
        WHERE id='$id'";   
        $result=$conn->query($update);
        if($result){
            header('location: table.php');
        }
    }
?>