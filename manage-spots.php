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
                                    <h4>Manage Parking Spots</h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a>Parking Spots</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="manage-spots.php">Manage Parking Spots</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-body">

                    <div class="card">
                        <div class="card-header">
                            <div class="col-sm-10">

                                <a href="addSpots.php"><button class="btn btn-primary pull-right">+ Add Parking Spot</button></a>

                            </div>

                        </div>
                        <div class="card-block">
                            <div class="table-responsive dt-responsive">
                                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Parking spot</th>
                                            <th> Category</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $ret = mysqli_query($conn, "select *from  tbl_parking_spot");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($ret)) {
                                        $status = "Free spot";
                                        if ($row['status'] == 1) {
                                            $status = "Free spot";
                                        } else if ($row['status'] == 2) {
                                            $status = "Booked spot";
                                        } else if ($row['status'] == 3) {
                                            $status = "Allocated spot";
                                        } else if ($row['status'] == 4) {
                                            $status = "Disabled spot";
                                        } else {
                                            $status = "Deleted spot";
                                        }

                                    ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $row['spot_name']; ?></td>


                                                <td><?php echo $categoryArray[$row['spot_category']]; ?></td>
                                                <td><?php echo $status; ?></td>
                                                <td>
                                                    <?php if ($row['status'] == 1) : ?>
                                                        <form method="post" action="disable_spot.php">
                                                            <input type="hidden" name="spot_id" value="<?php echo $row['id']; ?>">
                                                            <button type="submit" name="disable_spot" class="btn btn-danger" onclick="return confirm('Are you sure you want to disable this spot?')">Disable</button>
                                                        </form>
                                                    <?php elseif ($row['status'] == 4) : ?>
                                                        <form method="post" action="enable_spot.php">
                                                            <input type="hidden" name="spot_id" value="<?php echo $row['id']; ?>">
                                                            <button type="submit" name="enable_spot" class="btn btn-success" onclick="return confirm('Are you sure you want to enable this spot?')">Enable</button>
                                                        </form>
                                                    <?php endif; ?>
                                                </td>

                                            </tr>

                                        </tbody>
                                    <?php
                                        $cnt = $cnt + 1;
                                    } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="#">
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

<?php include('footer.php'); ?>
<?php if (!empty($_SESSION['success'])) {  ?>
    <div class="popup popup--icon -success js_success-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
            <h3 class="popup__content__title">
                Success
            </h3>
            <p><?php echo $_SESSION['success']; ?></p>
            <p>
                <?php echo "<script>setTimeout(\"location.href = 'manage-spots.php';\",1500);</script>"; ?>
                <button class="button button--success" data-for="js_success-popup">Close</button>
            </p>
        </div>
    </div>

    <?php unset($_SESSION["success"]);
    ?>
<?php } ?>

<script>
    var addButtonTrigger = function addButtonTrigger(el) {
        el.addEventListener('click', function() {
            var popupEl = document.querySelector('.' + el.dataset.for);
            popupEl.classList.toggle('popup--visible');
        });
    };

    Array.from(document.querySelectorAll('button[data-for]')).
    forEach(addButtonTrigger);
</script>