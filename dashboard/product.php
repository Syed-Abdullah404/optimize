<?php
error_reporting(0);
include('header.php');

?>

<!-- add Modal -->
<div class="modal fade " id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add Products</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./Queries.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="name" class="form-control" id="exampleInputEmail1" name="name">

                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" id="formFile" name="fileToUpload">
                        <label for="exampleInputEmail1" class="form-label mt-1">Demo Link</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="link">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <textarea name="desc" class="form-control"></textarea>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="addProducts" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php $query = $con->query('select * from products');
while ($row = $query->fetch_assoc()) { ?>
    <!-- edit Modal -->
    <div class="modal fade " id="editexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form role="form" class="text-start" method="POST" action="./Queries.php" enctype="multipart/form-data">
                        <input type="text" name="pId" id="pid" value="">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="name" id="pname" class="form-control" name="pname">
                            <label for="exampleInputEmail1" class="form-label mt-1">Demo Link</label>
                            <input type="name" class="form-control" id="pdemo" name="pdemo">

                            <label for="exampleInputPassword1" class="form-label">Description</label>
                            <textarea name="pdesc" id="pdesc" class="form-control"></textarea>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Image</label>
                                <input type="file" class="form-control mb-3" name="fileToUpload" value="<?php echo $row['image']; ?>" />
                                <input type="hidden" name="old" value="<?php echo $row['image']; ?>">
                                <img src="images/products/<?php echo $row['image'] ?>" width="70px" height="70px">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="editProduct" class="btn btn-primary">Edit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- delete Modal -->
<div class="modal fade " id="deleteexampleModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="./Queries.php" method="POST">
            <input type="hidden" name="ProIdDel" id="ProIdDel" value="">
            <input type="hidden" name="ProNameDel" id="ProNameDel" value="">
            <input type="hidden" name="ProImgDel" id="ProImgDel" value="">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary" name="delProduct">Yes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-3">Add Products</h4>
                <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#addModal">Add Products<i class="fa fa-plus ms-2"></i></button>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Demo Link</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = $con->query('select * from products');
                            while ($row = $query->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><img src="images/products/<?php echo $row['image']; ?>" alt="" width="70px" height="70px"></td>
                                    <td><?php echo $row['desc']; ?></td>
                                    <td><?php echo $row['link']; ?></td>
                                    <td>
                                        <button type="button" class="editbtn btn btn-lg btn-lg-square btn-success " data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                        <button type="submit" class="delbtn btn btn-lg btn-lg-square btn-danger " data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->


<?php
include('footer.php');
?>