<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('connect.php'); ?>
<?php
// Fetch categories and create an array with ID as index and VehicleCat as value
$categoryArray = [];
$sql = mysqli_query($conn, "SELECT * FROM tblcategory");
while ($row = mysqli_fetch_array($sql)) {
    $categoryArray[$row['ID']] = $row['VehicleCat'];
}
?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Book Parking Spots</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="booking.php">Book Parking Spot</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="card">
                        <div class="card-block">
                            <div class="parking-spots">
                                <?php
                                $ret = mysqli_query($conn, "SELECT * FROM tbl_parking_spot");
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                    <div class="parking-spot" <?php if ($row['status'] != 1) echo 'style="border: 2px solid red;"'; ?>>
                                        <div class="spot-name"><?php echo $row['spot_name']; ?></div>
                                        <div class="spot-category"><?php echo $categoryArray[$row['spot_category']]; ?></div>
                                        <?php if ($row['status'] == 1) { ?>
                                            <form method="post" action="book_spot.php">
                                                <input type="hidden" name="spot_id" value="<?php echo $row['id']; ?>">
                                                <input type="hidden" name="category" value="<?php echo $row['spot_category']; ?>">
                                                <button type="submit" name="book_spot" class="btn btn-success">Book</button>
                                            </form>
                                        <?php } else { ?>
                                            <p>This spot is not available for booking.</p>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>