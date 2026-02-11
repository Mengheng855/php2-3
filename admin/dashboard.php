<?php 
include '../page/header.php';

if(!isset($_COOKIE['is_admin']) || $_COOKIE['is_admin']!=1){
    header('location:../auth/login.php');
    exit;
}
?>
    <h1>welcome to dashboard</h1>
    <a href="../auth/logout.php" class="btn btn-primary">logout</a>    
<?php include '../page/footer.php' ?>
