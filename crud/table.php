<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4 p-4 shadow rounded-3">
        <a href="form.php" class="btn btn-success float-end mb-2">+Add Employee</a>
        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>email</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include 'connection.php';
                    $select="SELECT * FROM tbl_employee";
                    $ex=mysqli_query($conn,$select);
                    while($row=mysqli_fetch_assoc($ex)){
                        echo '
                            <tr>
                                <td>'.$row['id'].'</td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['gender'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['position'].'</td>
                                <td>'.$row['salary'].'</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <form action="delete.php" method="post">
                                            <input type="hidden" name="id" value="'.$row['id'].'">
                                            <button name="delete" class="btn btn-outline-danger" onclick="return confirm(\'jg delete ot\')">Delete</button>
                                        </form>
                                        <a href="formEdit.php?id='.$row['id'].'" class="btn btn-outline-warning">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>