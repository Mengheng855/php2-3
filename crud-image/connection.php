<?php
    try {
        $conn=mysqli_connect('localhost','root','','db_php_2-3');
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>