<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5 p-4 shadow rounded-3">
        <!-- Button trigger modal -->
        <button type="button" id="add" class="btn btn-outline-dark float-end mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            +Add Student
        </button>
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Gender</th>
                    <th>Profile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    require 'conn.php';
                    $select="SELECT * FROM tbl_student";
                    $ex=$conn->query($select);
                    while($row=mysqli_fetch_assoc($ex)){
                        echo '
                            <tr>
                                <td>'.$row['id'].'</td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['gender'].'</td>
                                <td>
                                    <img src="'.$row['profile'].'" width="40px"
                                        height="40px" class="rounded-circle" alt="">
                                </td>
                                <td>
                                    <button id="delete" class="btn btn-outline-danger">Delete</button>
                                    <button id="edit" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                </td>
                            </tr>
                        ';
                    }
                 ?>
            </tbody>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Student</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form" action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id">
                                <div class="mb-2">
                                    <label for="" class="form-label">Username</label>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username...">
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Gender</label>
                                    <select name="gender" class="form-select" id="gender">
                                        <option value="">--other--</option>
                                        <option value="male">Male</option>
                                        <option value="female">female</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Profile</label>
                                    <input type="file" id="file" class="form-control" name="file">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="save" data-bs-dismiss="modal" class="btn btn-primary">Add</button>
                                <button type="button" id="update" data-bs-dismiss="modal" class="btn btn-success">update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </table>
    </div>

</body>
</html>
<script>
    $(document).ready(function(){
        $('#add').click(function(){
            $('#update').hide()
            $('#save').show()
            $('#exampleModalLabel').text('Add Student')
        })
        $('#save').click(function(){
            const username=$('#username').val()
            const gender=$('#gender').val()
            const file=$('#file')[0].files[0]
            const imgurl=URL.createObjectURL(file)
            
            let formdata= new FormData()
            formdata.append('username',username)
            formdata.append('gender',gender)
            formdata.append('file',file)
            $.ajax({
                url:'insert.php',
                method:'POST',
                data:formdata,
                contentType:false,
                processData:false,
                success:function(response){
                    $('#form').trigger('reset');
                    $('tbody').append(`
                        <tr>
                            <td>${response}</td>
                            <td>${username}</td>
                            <td>${gender}</td>
                            <td>
                                <img src="${imgurl}" width="40px"
                                    height="40px" class="rounded-circle" alt="">
                            </td>
                            <td>
                                <button class="btn btn-outline-danger">Delete</button>
                                <button class="btn btn-outline-warning">Edit</button>
                            </td>
                        </tr>
                    `);
                }
            })
        })
        $(document).on('click','#edit',function(){
            $('#update').show()
            $('#save').hide()
            $('#exampleModalLabel').text('Update Student')
            const row=$(this).closest('tr')
            const id=row.find('td:eq(0)').text().trim()
            const name=row.find('td:eq(1)').text().trim()
            const gender=row.find('td:eq(2)').text().trim()
            // const profile=row.find('td:eq(3) img').attr('src');
            $('#id').val(id)
            $('#username').val(name)
            $('#gender').val(gender)
             
            $('#update').click(function(){
                const id=$('#id').val()
                const username=$('#username').val()
                const gender=$('#gender').val()
                const file=$('#file')[0].files[0]
                
                let formdata= new FormData()
                formdata.append('id',id)
                formdata.append('username',username)
                formdata.append('gender',gender)
                formdata.append('file',file)
                $.ajax({
                    url:'update.php',
                    method:'POST',
                    data:formdata,
                    contentType:false,
                    processData:false,
                    success:function(){
                        if(row.find('td:eq(0)').text().trim()==id){
                            row.find('td:eq(1)').text(username)
                            row.find('td:eq(2)').text(gender)
                            if(file){
                                const imgurl=URL.createObjectURL(file)
                                row.find('td:eq(3) img').attr('src',imgurl)
                            }
                        }
                    }
                })
            })
           
            
        })
        $(document).on('click','#delete',function(){
            if(!confirm("Are you sure?"))return
            const row=$(this).closest('tr');
            const id=row.find('td:first').text().trim()
            console.log(id);
            const formdata=new FormData()
            formdata.append('id',id)
            $.ajax({
                url:'delete.php',
                method:'POST',
                data:{
                    id
                },
                success:function(res){
                    row.remove()
                }
            })
        })
    })
</script>