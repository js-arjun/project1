<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('connect.php'); ?>

<?php
if (isset($_POST['book_spot'])) {
    $spot_id = $_POST['spot_id'];
    $category = $_POST['category'];
}

?>

<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Book a spot</h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a>Book A Spot</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="booking.php">Book Parking</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="card">
                                <div class="card-header">

                                </div>
                                <div class="card-block">
                                    <form id="main" method="post" enctype="multipart/form-data" action="bookAction.php">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Vehicle Company</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="vehcomp" name="vehcomp" placeholder="Vehicle Company" required="">
                                                <span class="messages"></span>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Registration Number</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="vehreno" name="vehreno" placeholder="Registration Number" required="">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Owner Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="ownername" name="ownername" class="form-control" placeholder="Owner Name" required="true">
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Owner Contact Number</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="ownercontno" name="ownercontno" class="form-control" placeholder="Owner Contact Number" required="true" maxlength="10" pattern="[0-9]+">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <input type="hidden" name="spot_id" value="<?php echo $spot_id; ?>">
                                        <input type="hidden" name="category" value="<?php echo $category; ?>">
                                        <div class="form-group row">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" name="submit" class="btn btn-primary m-b-0">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php include('footer.php'); ?>