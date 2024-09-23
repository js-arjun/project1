<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('connect.php'); ?>
<?php
$slotArr = [];
$sql = mysqli_query($conn, "SELECT * FROM tbl_parking_spot");
while ($row = mysqli_fetch_array($sql)) {
    $slotArr[$row['id']] = $row['spot_name'];
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
                                    <h4>Manage Incoming Vehicle</h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a>Manage Vehicle</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="manage-incomingvehicle.php">Manage Incoming Vehicle</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-body">
                    <div class="card-block">
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Slot Number</th>
                                        <th>Parking Category</th>
                                        <th>Parking Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                $ret = mysqli_query($conn, "select * from tbl_booking where myemail='$myemail'");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $slotArr[$row['spot_id']]; ?></td>
                                            <td><?php echo $row['category']; ?></td>
                                            <td><?php echo $row['parkingnumber']; ?></td>
                                            <td>
                                                <?php if ($row['status'] == 'Booked') : ?>
                                                    <a href="downloadQR.php?vid=<?php echo $row['parkingnumber']; ?>" style="cursor:pointer" class="btn btn-xs btn-success"><i class="feather icon-printer m-t-10 f-16 "></i></a>
                                                    <a href="cancelBooking.php?bookId=<?php echo $row['id']; ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to cancel the booking?');"><i class="feather icon-clock m-t-10 f-16 "></i></a>
                                                <?php elseif ($row['status'] == 'CANCEL') : ?>
                                                    <span class="badge badge-warning">Cancelled</span>
                                                <?php else : ?>
                                                    <span class="badge badge-danger">Expired</span>
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
                <?php echo "<script>setTimeout(\"location.href = 'manage-incomingvehicle.php';\",1500);</script>"; ?>
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