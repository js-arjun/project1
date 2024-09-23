<?php include('connect.php');

if (isset($_POST['enable_spot'])) {
    $spot_id = $_POST['spot_id'];
    $sql = "UPDATE tbl_parking_spot SET status = 1 WHERE id = $spot_id";

    mysqli_query($conn, $sql);
    header("Location: manage-spots.php");
    exit();
}

?>