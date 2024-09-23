<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('connect.php');

if (isset($_GET['bookId'])) {
  $number = isset($_GET['bookId']) ? $_GET['bookId'] : '';
  
  $sql = "select * from tbl_booking where id = $number";
  $result = mysqli_query($conn, $sql);
  $row  = mysqli_fetch_array($result);
  $spot_id = $row['spot_id'];
  $parkingnumber = $row['parkingnumber'];
  $query2 = mysqli_query($conn, "UPDATE `tbl_parking_spot` SET `status`='1' WHERE `id` = $spot_id");
  $query2 = mysqli_query($conn, " UPDATE `tblvehicle` SET `Status`='LOST' WHERE  `ParkingNumber` = $parkingnumber");
  $query2 = mysqli_query($conn, " UPDATE `tbl_booking` SET `status`='CANCEL' WHERE  `id` = $number ");
  echo "<script>alert('The Booking has been cancelled');</script>";

  echo "<script>window.location.href ='mybookings.php'</script>";

}
?>