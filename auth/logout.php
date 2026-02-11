<?php
    setcookie('is_admin',"",time()-(86400 *7),'/');
    header('location:../index.php');