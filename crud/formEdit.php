<?php
    include 'connection.php'; 
    $id=$_GET['id'];
    $select="SELECT * FROM tbl_employee WHERE id='$id'";
    $rs=$conn->query($select);
    $row=mysqli_fetch_assoc($rs)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="p-3">
    <a href="table.php"><i class="fa-solid fa-left-long fs-2"></i></a>
    <div class="container mt-4 p-4 shadow w-50 rounded-2">
        <h2 class="text-center">Form Edit</h2>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <div class="mb-2">
                <label for="" class="form-label">Employee Name</label>
                <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control" placeholder="Enter Employee Name...">
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Gender</label>
                <select name="gender" id="" class="form-select">
                    <option value="" disabled >---other---</option>
                    <option value="male" <?=   $row['gender']=='male'?'selected':'' ?>>Male</option>
                    <option value="female" <?=   $row['gender']=='female'?'selected':'' ?>>Female</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" value="<?= $row['email'] ?>" class="form-control" placeholder="Enter email...">
            </div>
            <div class="mb-2">
                <label class="form-label">Position</label>
                <select name="position" class="form-select">
                    <option value="" disabled >-- Select Position --</option>
                    <?php 
                        $positions = [
                            'manager' => 'Manager',
                            'assistant' => 'Assistant',
                            'developer' => 'Developer',
                            'designer' => 'Designer',
                            'accountant' => 'Accountant',
                            'hr' => 'HR',
                            'marketing' => 'Marketing',
                            'sales' => 'Sales',
                            'intern' => 'Intern'
                        ];
                        foreach($positions as $key=>$value){
                            echo '
                                <option value="'.$key.'" '.($row['position']==$key?'selected':'').' >'.$value.'</option>
                            ';
                        }
                     ?>
                </select>
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Salary</label>
                <input type="number" name="salary" value="<?= $row['salary'] ?>" class="form-control" placeholder="Enter salary...">
            </div>
            <button name="btnUpdate" type="submit" class="btn btn-warning d-flex mx-auto">Update</button>
        </form>
    </div>
</body>

</html>