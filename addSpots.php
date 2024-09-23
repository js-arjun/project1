<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('connect.php'); ?>

<?php
// Function to fetch categories
function getCategories($conn) {
    $categories = [];
    $query = mysqli_query($conn, "SELECT * FROM tblcategory");
    while ($row = mysqli_fetch_assoc($query)) {
        $categories[] = $row;
    }
    return $categories;
}


if (isset($_POST['submit'])) {
   
    $parking_spot = $_POST['parking_spot'];
    $category =  $_POST['category'];
 
    $query = mysqli_query($conn, "insert into tbl_parking_spot  (`spot_name`, `spot_category`, `status`) VALUES ('$parking_spot',$category,1)");
    if ($query) {
      echo "<script>alert('Vehicle Category Entry Detail has been added');</script>";
      echo "<script>window.location.href ='manage-spots.php'</script>";
    } else {
      echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
  }

// Get categories
$categories = getCategories($conn);
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
                  <h4>Add Parking Spot</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="card">
            <div class="card-block">
              <form role="form" method="post" action="#">
                <div class="form-group row">
                  <label class="col-lg-2">Parking Spot</label>
                  <input class="form-control col-lg-6" name="parking_spot" placeholder="Parking Spot" required="true">
                  <br>
                </div>
                <div class="form-group row">
                  <label class="col-lg-2">Category</label>
                  <select class="form-control col-lg-6" name="category" required="true">
                    <option value="">Select Category</option>
                    <?php foreach ($categories as $category) : ?>
                      <option value="<?php echo $category['ID']; ?>"><?php echo $category['VehicleCat']; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <br>
                </div>
                <div class="col-lg-12">
                  <button type="submit" name="submit" class="btn btn-primary m-b-0">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include("footer.php"); ?>
