<?php
error_reporting(0);
include('header.php');
?>
<?php $query = $con->query('select * from abouts limit 1');
while ($row = $query->fetch_assoc()) { ?>

    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h4 class="mb-3">About</h4>
                    <div class="container-fluid">
                        <form method="POST" action="./Queries.php">
                        <input type="hidden" name="aboutId" id="aboutId" value="<?php echo $row['id']?>">
                            <div class="form-group">
                                <label class="fw-bold">Main Heading:</label>
                                <input type="text" name="Ab_Main_Heading" value="<?php echo $row['Ab_Main_Heading']; ?>" class="form-control mb-2" placeholder=" " name="name">
                                <label class="fw-bold ">Detailed Information:</label>
                                <textarea class="form-control mb-2" name="Ab_detailed_Information"><?php echo htmlspecialchars($row['Ab_detailed_Information']); ?></textarea>
                            </div>
                            <h5>Qualities</h5>
                            <label class="fw-bold">Main Heading:</label>
                            <input type="text" class="form-control mb-2" placeholder=" " name="qual_Main_Heading" value="<?php echo $row['qual_Main_Heading']; ?>">
                            <label class="fw-bold ">Text:</label>
                            <textarea class="form-control mb-2" name="qual_Text"><?php echo htmlspecialchars($row['qual_Text']); ?></textarea>
                            <button type="submit" class="btn btn-primary text-end" name="updateAbouts">Update</button>
                        </form>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->

    <?php
    include('footer.php');
    ?>