<?php 
include '../page/header.php';
session_start();
if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin']!=1){
    header('location:../auth/login.php');
    exit;
}
?>
    <h1>welcome to dashboard</h1>
    <a href="../auth/logout.php" class="btn btn-primary">logout</a>

    
<?php include '../page/footer.php' ?>
