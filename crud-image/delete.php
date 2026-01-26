<?php
    require 'connection.php';
    if(isset($_POST['btnDelete'])){
        $id=$_POST['id'];
        $delete="DELETE FROM tbl_product WHERE id='$id'";
        $ex=$conn->query($delete);
        if($ex){
            echo '<script>window.location.href="table.php"</script>';
        }
    }