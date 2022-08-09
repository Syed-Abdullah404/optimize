
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="index.php">About Us</a>
                    <a class="btn btn-link" href="contact.php">Contact Us</a>
                    <a class="btn btn-link" href="courses.php">Services</a>
                    <a class="btn btn-link" href="product.php">Products</a>
                    <a class="btn btn-link" href="">Blog</a>
                </div>
                <?php
$query = $con->query('SELECT * FROM `companyprofile`');
while ($row = $query->fetch_assoc()) { ?>

                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><?php echo $row['address'];?></p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><?php echo $row['phone'];?></p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i><?php echo $row['email'];?></p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="<?php echo $row['whatsapp'];?>"><i class="fab fa-whatsapp"></i></a>
                        <a class="btn btn-outline-light btn-social" href="<?php echo $row['facebook'];?>"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="<?php echo $row['instagram'];?>"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href="<?php echo $row['linkedin'];?>"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <?php
}
?>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                       
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">Optimize Pros</a><br><br> 
                       
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>