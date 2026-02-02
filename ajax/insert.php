<?php
    require 'conn.php';
    if(isset($_SERVER['REQUEST_METHOD'])=='POST'){
        if(!is_dir('profile')){
            mkdir('profile',0777,true);
        }
        $name=$_POST['username'];
        $gender=$_POST['gender'];
        $file=$_FILES['file']['name'];
        $tmp_name=$_FILES['file']['tmp_name'];
        $path='profile/'.time().'_'.$file;
        move_uploaded_file($tmp_name,$path);
        $insert="INSERT INTO tbl_student (name,gender,profile) VALUES ('$name','$gender','$path')";
        $ex=$conn->query($insert);
        $select_id="SELECT id FROM tbl_student ORDER BY id DESC LIMIT 1";
        $rs=mysqli_query($conn,$select_id);
        $row=mysqli_fetch_assoc($rs);
        echo $row['id'];
    }