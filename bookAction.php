<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('connect.php');
$categoryArray = [];
$sql = mysqli_query($conn, "SELECT * FROM tblcategory");
while ($row = mysqli_fetch_array($sql)) {
    $categoryArray[$row['ID']] = $row['VehicleCat'];
}
if (isset($_POST['submit'])) {
  $spot_id = $_POST['spot_id'];
  $category = $_POST['category'];
  $catename = $categoryArray[$_POST['category']];
  $parkingnumber = mt_rand(100000000, 999999999);
  $catename = "Four Wheeler Vehicle";
  $vehcomp = $_POST['vehcomp'];
  $vehreno = $_POST['vehreno'];
  $ownername = $_POST['ownername'];
  $ownercontno = $_POST['ownercontno'];
  $enteringtime = $_POST['enteringtime'];


  $query = mysqli_query($conn, "insert into  tblvehicle(ParkingNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,status) value('$parkingnumber','$catename','$vehcomp','$vehreno','$ownername','$ownercontno','Book')");


  $query2 = mysqli_query($conn, "UPDATE `tbl_parking_spot` SET `status`='2' WHERE `id` = $spot_id");
  $query3 = mysqli_query($conn, "INSERT INTO `tbl_booking`( `spot_id`, `category`, `parkingnumber`, `myemail`, `status`) VALUES ($spot_id,'$catename',$parkingnumber,'$myemail','Booked')");

  if ($query) {
    echo "<script>alert('Vehicle Entry Detail has been added');</script>";
    echo "<script>window.location.href ='mybookings.php'</script>";
  } else {
    echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    echo "<script>window.location.href ='mybookings.php'</script>";

  }

}
?>