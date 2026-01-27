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
    <div class="container mt-4 p-5 shadow rounded-3">
        <!-- Button trigger modal -->
        <button type="button" id="add" class="btn btn-outline-dark float-end mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            +Add Product
        </button>
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>QTY</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    require 'connection.php';
                    $select="SELECT * FROM tbl_product";
                    $result=$conn->query($select);
                    while($row=mysqli_fetch_assoc($result)){
                        echo '
                        <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['product_name'].'</td>
                            <td>'.$row['qty'].'</td>
                            <td>$'.$row['price'].'</td>
                            <td>$'.$row['total'].'</td>
                            <td>
                                <img id="img" src="'.$row['image'].'" width="35"
                                    class="rounded-circle" alt="">
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <form action="delete.php" method="post">
                                        <input type="hidden" name="id" value="'.$row['id'].'">
                                        <button name="btnDelete" class="btn btn-outline-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                                    </form>
                                    <button id="edit" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                </div>
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form" action="insert.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id">
                                <div class="mb-2">
                                    <label for="pro_name" class="form-label">Product Name</label>
                                    <input id="pro_name"  name="pro_name" type="text" class="form-control" placeholder="Product Name...">
                                </div>
                                <div class="mb-2">
                                    <label for="qty" class="form-label">QTY</label>
                                    <input id="qty" type="number" name="qty" class="form-control" placeholder="QTY...">
                                </div>
                                <div class="mb-2">
                                    <label for="price" class="form-label">Price</label>
                                    <input id="price" type="number" step="0.01" name="price" class="form-control" placeholder="Price...">
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Image</label> <br>
                                    <img id="image" src="https://i.pinimg.com/736x/4c/3e/02/4c3e027d03ea726d4696eb368852a174.jpg" width="110px" height="113px" class="rounded-circle" alt="">
                                    <input id="file" name="file" type="file" class="form-control" placeholder="Price...">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" id="save" name="submit" class="btn btn-primary">Save</button>
                                <button type="submit" id="update" name="update" class="btn btn-warning">Update</button>
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
        $('#file').hide()
        $('#image').click(function(){
            $('#file').click()
        })
        $('#file').change(function(){
            let file=this.files[0]
            if(file){
                let image=URL.createObjectURL(file)
                $('#image').attr('src',image)
            }
        })
        $('#add').click(function(){
            $('#save').show()
            $('#update').hide()
            $('#exampleModalLabel').text('Add Product')
            $('#form').attr('action','insert.php')
            $('#form').trigger('reset')
            $('#image').attr('src','https://i.pinimg.com/736x/4c/3e/02/4c3e027d03ea726d4696eb368852a174.jpg')
        })
        $(document).on('click','#edit',function(){
            $('#save').hide()
            $('#update').show()
            $('#exampleModalLabel').text('Edit Product')
            $('#form').attr('action','update.php')
            const row=$(this).closest('tr');
            const id=row.find('td:eq(0)').text().trim()
            const pro_name=row.find('td:eq(1)').text().trim()
            const qty=row.find('td:eq(2)').text().trim()
            const price=row.find('td:eq(3)').text().trim().slice(1)
            const image=row.find('img').attr('src')
            console.log(price);
            
            $('#id').val(id)
            $('#pro_name').val(pro_name)
            $('#qty').val(qty)
            $('#price').val(price)
            $('#image').attr('src',image)
         
        })
    })
</script>