<?php include('connect.php'); ?>

<?php
if (isset($_POST['disable_spot'])) {
    $spot_id = $_POST['spot_id'];
    $sql = "UPDATE tbl_parking_spot SET status = 4 WHERE id = $spot_id";
    mysqli_query($conn, $sql);
    
    header("Location: manage-spots.php");
    exit();
}


?>
