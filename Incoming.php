<?php include('connect.php');



if (isset($_POST['scanned_content']) || isset($_POST['parkingNumber'])) {
  $number = isset($_POST['scanned_content']) ? $_POST['scanned_content'] : $_POST['parkingNumber'];
  $sql = "select * from tbl_booking where parkingnumber = $number";
  $result = mysqli_query($conn, $sql);
  $row  = mysqli_fetch_array($result);
  $spot_id = $row['spot_id'];
  $parkingnumber = $row['parkingnumber'];
  $status = $row['status'];

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $spot_id = $row['spot_id'];
    $parkingnumber = $row['parkingnumber'];
    $status = $row['status'];
    if($status =="Booked")
    {
      $query1 = mysqli_query($conn, "UPDATE `tbl_parking_spot` SET `status`='3' WHERE `id` = $spot_id");
      $query2 = mysqli_query($conn, " UPDATE `tblvehicle` SET `Status`='IN' WHERE  `ParkingNumber` = $parkingnumber");
      $query3 = mysqli_query($conn, " UPDATE `tbl_booking` SET `status`='IN' WHERE  `parkingnumber` = $number");
      echo "<script>alert('The vehicle entry was successful');</script>";
      echo "<script>window.location.href ='manage-incomingvehicle.php'</script>";  
    }
    else
    {
      echo "<script>alert('The code has been expired');</script>";
      echo "<script>window.location.href ='add-vehicle.php'</script>";  
    }
  } else {
    // If no booking is found, show an alert and redirect
    echo "<script>
            alert('No booking found for the entered parking number.');
            window.location.href = 'add-vehicle.php'; // Replace with your target page
          </script>";
    exit();
}
  
}
?>