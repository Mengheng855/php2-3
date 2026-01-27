<?php
    require 'connection.php';
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $pro_name=$_POST['pro_name'];
        $qty=$_POST['qty'];
        $price=$_POST['price'];
        $total=$qty*$price;
        if(!empty($_FILES['file']['name'])){
            $file=$_FILES['file']['name'];
            $tmp_name=$_FILES['file']['tmp_name'];
            $path='image/'.$file;
            move_uploaded_file($tmp_name,$path);
            $update="UPDATE tbl_product SET product_name='$pro_name',
            qty='$qty',price='$price',total='$total',image='$path' WHERE id='$id'";
        }else{
            $update="UPDATE tbl_product SET product_name='$pro_name',
            qty='$qty',price='$price',total='$total' WHERE id='$id'";
        }
        $rs=$conn->query($update);
        if($rs){
            echo '<script>window.location.href="table.php"</script>';
        }
    }