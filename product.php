<?php
include('header.php');
?>

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Products</h1>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    

    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">

            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Products</h6>
                <h1 class="mb-5">Our Products</h1>
            </div>
 
            <div class="row g-4 justify-content-center">
            <?php
$query = $con->query('SELECT * FROM `products`');
while ($row = $query->fetch_assoc()) { ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative p-3 overflow-hidden">
                            <img class="img-fluid" src="./dashboard/images/products/<?php echo $row['image'];?>" alt="">
                            
                        </div>
                        <div class="text-center p-4 ">
                            
                            
                            <h5 class="mb-4"><?php echo $row['name'];?></h5>
                            <p>Searching for an organization to get your site made to advance your item and administrations? We have proficient website specialists who will make a site for you, as indicated by your necessities.</p>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-5 py-2" style="border-radius: 30px 30px 30px 30px;">Demo</a>
                        </div>
                        
                    </div>
                </div>
                <?php
            }
            ?>
                
            </div>
           
        </div>
    </div>
    <!-- Courses End -->


   <?php

   include('footer.php');
   ?>