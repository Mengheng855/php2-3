<?php include '../page/header.php' ?>
<a href="../index.php"><i class="fa-solid fa-arrow-left "></i></a>

    <div class="container mt-4 p-5 shadow rounded-3 w-50">
        <h2 class="text-center">Login</h2>
        <form action="checkLogin.php" method="post">
            <div class="mb-2">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email...">
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password...">
            </div>
            <p class="text-center">Don`t have an account?<a href="register.php">register</a></p>
            <button name="login" class="btn btn-primary d-flex mx-auto">Login</button>
        </form>
    </div>
<?php include '../page/footer.php' ?>