<?php 
include '../page/header.php';
session_start();
?>
    <h1>welcome to user</h1>
    <?php 
    if(isset($_SESSION['is_admin'])){
        echo '
            <a href="../auth/logout.php" class="btn btn-primary">logout</a>
        ';
    }else{
        echo '
            <a href="../auth/login.php" class="btn btn-primary">Login</a>
            <a href="../auth/register.php" class="btn btn-primary">Register</a>
        ';
    }
     ?>
<?php include '../page/footer.php' ?>
