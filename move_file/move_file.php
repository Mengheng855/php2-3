<?php
    if(isset($_POST['btnSubmit'])){
        if(!is_dir('image')){
            mkdir('image',0777,true);
        }
        $file=$_FILES['file']['name'];
        $tmp_name=$_FILES['file']['tmp_name'];
        $path="image/".$file;
        $move=move_uploaded_file($tmp_name,$path);
        if($move){
            header('location: file.php');
        }
    }
?>