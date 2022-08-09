<?php
error_reporting(0);
include('header.php');
$query = $con->query('select * from companyprofile');
while ($row = $query->fetch_assoc()) {
?>



    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h4 class="mb-3">Compant Profile</h4>

                    <div class="container-fluid">
                    <form method="POST" action="./Queries.php" enctype="multipart/form-data">
                        <input type="hidden" name="companyprofileId" id="aboutId" value="<?php echo $row['id']?>">

                            <div class="form-group">
                                <h2 class="text-center">Company Information</h2>
                                <label class="fw-bold">Name:</label>
                                <input type="text" value="<?php echo $row['name']; ?>" class="form-control mb-2" placeholder=" Name" name="name">

                                <label class="fw-bold">Logo:</label>
                               <input type="file" class="form-control mb-3" name="fileToUpload" value="<?php echo $row['logo']; ?>" />
                                <input type="hidden" name="old" value="<?php echo $row['logo']; ?>">
                                <img src="./images/logo/<?php echo $row['logo'];?>" width="70px" height="70px">

                                <h2 class="text-center">Contact</h2>
                                <label class="fw-bold">Phone No:</label><br>
                                <input type="text" class="form-control mb-2" placeholder="Ph no." name="phone" value="<?php echo $row['phone']; ?>">

                                <label class="fw-bold">E-mail:</label><br>
                                <input type="email" class="form-control mb-2" placeholder="E-mail" name="email" value="<?php echo $row['email']; ?>">

                                <label class="fw-bold ">Address:</label>
                                <textarea class="form-control mb-2" name="address"><?php echo htmlspecialchars($row['address']); ?></textarea>

                                <h2 class="text-center">Social Media</h2>
                                <label class="fw-bold">Facebook:</label><br>
                                <input type="text" class="form-control mb-2" placeholder="www.facebook.com" name="fb" value="<?php echo $row['facebook']; ?>">

                                <label class="fw-bold">Instagram:</label><br>
                                <input type="text" class="form-control mb-2" placeholder="www.instagram.com" name="insta" value="<?php echo $row['instagram']; ?>">

                                <label class="fw-bold">Whatsapp:</label><br>
                                <input type="text" class="form-control mb-2" placeholder="Whatsapp Number" name="whatsapp" value="<?php echo $row['whatsapp']; ?>">

                                <label class="fw-bold">LinkedIn:</label><br>
                                <input type="text" class="form-control mb-2" placeholder="www.linkedin.com" name="linkedin" value="<?php echo $row['linkedin']; ?>">


                            </div>
                            <button type="submit" class="btn btn-primary text-end" name="companyProfileUpdate">update</button>
                        <?php
                          }
                        ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->


    <?php
    include('footer.php');
    ?>