<?php
include('db.php');
error_reporting(0);
// Check if the form was submitted
if (isset($_POST["addServices"])) {
    // Check if file was uploaded without errors
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $name = $_POST["name"];
        $description = $_POST["desc"];

        $filename = $_FILES["fileToUpload"]["name"];
        $filetype = $_FILES["fileToUpload"]["type"];
        $filesize = $_FILES["fileToUpload"]["size"];

        // Validate file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Validate file size - 10MB maximum
        $maxsize = 10 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        // Validate type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("images/service/" . $filename)) {
?>
                <?php
                echo "<script>window.location='services.php?msg=image-already-exist'</script>";
                ?>

                </div>
            <?php


            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "images/service/" . $filename)) {

                    $sql = "INSERT INTO services(`name`,`image`,`desc`) VALUES('$name','$filename','$description')";

                    mysqli_query($con, $sql);

                    echo "<script>window.location='services.php?msg=Category-Added'</script>";
                } else {
                    echo "File is not uploaded";
                }
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else {
        // echo "Error: " . $_FILES["fileToUpload"]["error"];
        echo "<script>window.location='services.php?msg=please-insert-an-image'</script>";
    }
}



if (isset($_POST["delService"])) {
    $id = $_POST["SerIdDel"];
    $delete1 = mysqli_query($con, "select * from `services` where id = '$id'");
    $row = mysqli_fetch_assoc($delete1);
    unlink('images/service/' . $row['image']);
    $delete = "DELETE FROM `services` WHERE id='$id' ";
    mysqli_query($con, $delete);
    // redirection
    echo "<script>window.location='services.php?msg=Service-Deleted'</script>";
}



if (isset($_POST["editService"])) {
    $id = $_POST["serId"];
    $name = $_POST["serName"];
    $desc = $_POST["desc"];
    $filename = $_FILES["fileToUpload"]["name"];
    $tempname = $_FILES["fileToUpload"]["tmp_name"];
    unlink("./images/service/" . $filename);
    $folder = "./images/service/" . $filename;
    $old = $_POST['old'];
    if ($filename == '') {
        $check = $old;
    } else {
        $check = $_FILES["fileToUpload"]["name"];
    }

    $update = "UPDATE `services` SET `name`= '$name', `image` = '$check', `desc` = '$desc' where `id` = '$id'";

    // Execute query
    $file = mysqli_query($con, $update);

    // Now let's move the uploaded image into the folder: image
    move_uploaded_file($tempname, $folder);

    echo "<script>window.location='services.php?msg=update-sucessfully'</script>";
}





if (isset($_POST["addProducts"])) {
    // Check if file was uploaded without errors
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $name = $_POST["name"];
        $description = $_POST["desc"];
        $filename = $_FILES["fileToUpload"]["name"];
        $filetype = $_FILES["fileToUpload"]["type"];
        $filesize = $_FILES["fileToUpload"]["size"];
        $link = $_POST["link"];
        // Validate file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Validate file size - 10MB maximum
        $maxsize = 10 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        // Validate type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("images/products/" . $filename)) {
            ?>
                <?php
                echo "<script>window.location='product.php?msg=image-already-exist'</script>";
                ?>

                </div>
<?php
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "images/products/" . $filename)) {
                    $sql = "INSERT INTO products(`name`,`image`,`desc`, `link`) VALUES('$name','$filename','$description', '$link')";

                    mysqli_query($con, $sql);

                    echo "<script>window.location='product.php?msg=products-Added'</script>";
                } else {
                    echo "File is not uploaded";
                }
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else {
        // echo "Error: " . $_FILES["fileToUpload"]["error"];
    }
}


if (isset($_POST["delProduct"])) {
    $id = $_POST["ProIdDel"];

    $delete1 = mysqli_query($con, "select * from `products` where id = '$id'");
    $row = mysqli_fetch_assoc($delete1);
    unlink('images/products/' . $row['image']);

    $delete = "DELETE FROM `products` WHERE id='$id' ";
    mysqli_query($con, $delete);
    //redirection
    echo "<script>window.location='product.php?msg=Product-Deleted'</script>";
}

if (isset($_POST["editProduct"])) {

    $id = $_POST["pId"];
    $name = $_POST["pname"];
    $link = $_POST["pdemo"];
    $desc = $_POST["pdesc"];
    $filename = $_FILES["fileToUpload"]["name"];
    $tempname = $_FILES["fileToUpload"]["tmp_name"];
    // unlink("./images/products/" . $filename);
    $folder = "./images/products/" . $filename;
    $old = $_POST['old'];
    if ($filename == '') {
        $check = $old;
    } else {
        $check = $_FILES["fileToUpload"]["name"];
    }

    $update = "UPDATE `products` SET `name`= '$name', `image` = '$check', `desc` = '$desc', `link` = '$link' where `id` = '$id'";

    // Execute query
    $file = mysqli_query($con, $update);

    // Now let's move the uploaded image into the folder: image
    move_uploaded_file($tempname, $folder);

     echo "<script>window.location='product.php?msg=update-sucessfully'</script>";







}



if (isset($_POST['updateAbouts'])) {
    $id = $_POST['aboutId'];
    $Ab_Main_Heading = $_POST['Ab_Main_Heading'];
    $Ab_detailed_Information = $_POST['Ab_detailed_Information'];
    $qual_Main_Heading = $_POST['qual_Main_Heading'];
    $qual_Text = $_POST['qual_Text'];
    $query = "UPDATE abouts set Ab_Main_Heading  = '$Ab_Main_Heading ', Ab_detailed_Information = '$Ab_detailed_Information', qual_Main_Heading = '$qual_Main_Heading', qual_Text ='$qual_Text' where id = '$id'";
    $queryCheck = mysqli_query($con, $query);
    if ($queryCheck) {
    echo "<script>window.location='about.php?msg=update-about'</script>";       
    } else {
        echo "not updated";
    }
}


if (isset($_POST["companyProfileUpdate"])) {

    $id = $_POST['companyprofileId'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $fb = $_POST['fb'];
    $insta = $_POST['insta'];
    $whatsapp = $_POST['whatsapp'];
    $linkedin = $_POST['linkedin'];
    $filename = $_FILES["fileToUpload"]["name"];
    $tempname = $_FILES["fileToUpload"]["tmp_name"];
    unlink("./images/logo/" . $filename);
    $folder = "./images/logo/" . $filename;
    $old = $_POST['old'];
    if ($filename == '') {
        $check = $old;
    } else {
        $check = $_FILES["fileToUpload"]["name"];
    }

    $update = "UPDATE `companyprofile` SET `name`= '$name', `logo` = '$check', `phone` = '$phone', `email` = '$email', `address` = '$address' ,`facebook`= '$fb' , `instagram` = '$insta', `whatsapp` = '$whatsapp' , `linkedin` = '$linkedin' where `id` = '$id'";

    // Execute query
    $file = mysqli_query($con, $update);

    // Now let's move the uploaded image into the folder: image
    move_uploaded_file($tempname, $folder);
    echo "<script>window.location='companyprofile.php?msg=companyProfile'</script>";       

    
}
