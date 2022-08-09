<?php
include('db.php');
if(!empty($_SESSION['id'])){
    $id = $_SESSION['id'];
        $result = mysqli_query($con, "SELECT * from user where id = $id");
        $row = mysqli_fetch_assoc($result);
    }
    else{
    
        echo "<script>window.location='signin.php'</script>";
    }
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- auto hide -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <?php
        $query = $con->query('select logo from companyprofile');
        while ($row = $query->fetch_assoc()) {
        ?>

            <!-- Sidebar Start -->
            <div class="sidebar pe-4 pb-3">
                <nav class="navbar bg-light navbar-light">
                    <a href="index.html" class="navbar-brand mx-4 mb-3">
                        <img src="images/logo/<?php echo $row['logo']; ?>" alt="" srcset="" height="70px">

                    </a>
                <?php
            }
                ?>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="services.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Services</a>
                    <a href="product.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Products</a>
                    <a href="about.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>About</a>
                    <a href="companyprofile.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Profile</a>

                </div>
                </nav>
            </div>
            <!-- Sidebar End -->

            <!-- Content Start -->
            <div class="content">
                <!-- Navbar Start -->
                <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                    </a>
                    <a href="#" class="sidebar-toggler flex-shrink-0">
                        <i class="fa fa-bars"></i>
                    </a>
                    <form class="d-none d-md-flex ms-4">
                        <input class="form-control border-0" type="search" placeholder="Search">
                    </form>
                    <div class="navbar-nav align-items-center ms-auto">


                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <img class="rounded-circle me-lg-2" src="images/user/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <span class="d-none d-lg-inline-flex">Profile</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">

                                <a href="logout.php" class="dropdown-item">Log Out</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- Navbar End -->
                <?php

                if ($_GET['msg'] == 'image-already-exist') {
                ?>
                    <div class="alert alert-danger mt-3" id="myWish">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Error! </strong> &nbsp &nbsp &nbsp Image already exist
                    </div>
                <?php
                }

                if ($_GET['msg'] == 'Service-Deleted') {
                ?>
                    <div class="alert alert-danger mt-3" id="myWish">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Success </strong> &nbsp &nbsp &nbsp Service Deleted
                    </div>
                <?php
                }

                if ($_GET['msg'] == 'please-insert-an-image') {
                ?>
                    <div class="alert alert-danger mt-3" id="myWish">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Error! </strong> &nbsp &nbsp &nbsp Please insert an image
                    </div>
                <?php
                }

                if ($_GET['msg'] == 'update-sucessfully') {
                ?>
                    <div class="alert alert-success mt-3" id="myWish">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Error! </strong> &nbsp &nbsp &nbsp update-sucessfully
                    </div>
                <?php
                }


                if ($_GET['msg'] == 'update-about') {
                ?>
                    <div class="alert alert-success mt-3" id="myWish">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong> </strong> &nbsp &nbsp &nbsp Abouts Update
                    </div>
                <?php
                }
                if ($_GET['msg'] == 'companyProfile') {
                ?>
                    <div class="alert alert-success mt-3" id="myWish">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong> </strong> &nbsp &nbsp &nbsp Company Profile update
                    </div>
                <?php
                }
                if ($_GET['msg'] == 'image-already-exist') {
                ?>
                    <div class="alert alert-danger mt-3" id="myWish">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Error! </strong> &nbsp &nbsp &nbsp Image already exist
                    </div>
                    <?php
                    if ($_GET['msg'] == 'Product-Deleted') {
                    ?>
                        <div class="alert alert-danger mt-3" id="myWish">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>Success </strong> &nbsp &nbsp &nbsp Product-Deleted
                        </div>
                <?php
                    }
                }
                ?>