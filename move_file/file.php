<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4 p-5 shadow rounded-3 w-50">
        <form action="move_file.php" method="post" enctype="multipart/form-data">
            <img id="image" src="https://i.pinimg.com/736x/9d/16/4e/9d164e4e074d11ce4de0a508914537a8.jpg" width="200px" height="200px" class="rounded-circle" alt="">
            <input id="file" name="file" type="file" class="form-control"> <br> <br>
            <button name="btnSubmit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
<script>
    $(document).ready(function(){
        $('#file').hide() 
        $('#image').click(function(){
            $('#file').click()
        })
        $('#file').change(function(){
            const file=this.files[0];
            if(file){
                const image=URL.createObjectURL(file)
                $('#image').attr('src',image)
            }
        })
    })
</script>