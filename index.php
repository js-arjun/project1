<!DOCTYPE html>
<html lang="en">
<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<?php
include('connect.php');
$sql = "select * from admin where id = '" . $_SESSION["id"] . "'";
$result = $conn->query($sql);
$row1 = mysqli_fetch_array($result);
$userType = $row1['role_id'];

$dateSevenDaysAgo = date('Y-m-d', strtotime('-7 days'));
$dateOneDayAgo = date('Y-m-d', strtotime('-1 days'));
$today = date('Y-m-d');
$ret = mysqli_query($conn, "select count(ID) as id1 from tblvehicle WHERE status = 'IN'");
$row = mysqli_fetch_array($ret);


$ret = mysqli_query($conn, "select count(ID) as id2 from tblvehicle");
$row1 = mysqli_fetch_array($ret);
    
// echo $row['id1'];
// print_r($row);exit;
// echo "select count(ID) as id3 FROM tblvehicle WHERE InTime >= '$dateOneDayAgo'";
// exit;
$ret = mysqli_query($conn, "select count(ID) as id5 FROM tblvehicle WHERE InTime >= '$today'");
$row4 = mysqli_fetch_array($ret);

$ret = mysqli_query($conn, "select count(ID) as id3 FROM tblvehicle WHERE InTime >= '$dateOneDayAgo'");
$row2 = mysqli_fetch_array($ret);

$ret = mysqli_query($conn, "select count(ID) as id4 FROM tblvehicle WHERE InTime >= '$dateSevenDaysAgo'");
$row3 = mysqli_fetch_array($ret);


$ret = mysqli_query($conn, "select count(ID) as id6 FROM admin ");
$row5 = mysqli_fetch_array($ret);

?>


<div class="pcoded-content">
  <div class="pcoded-inner-content">
    <div class="main-body">
      <div class="page-wrapper full-calender">
        <div class="page-body">
          <div class="row">


            <?php if ($userType == 1 ) {
              ?>
                <div class="col-xl-3 col-md-6">
                  <div class="card bg-c-green update-card">
                    <div class="card-block">
                      <div class="row align-items-end">
                        <div class="col-8">

                          <h4 class="text-white"><?php echo $row['id1']; ?></h4>
                          <h6 class="text-white m-b-0">Parked Vehicle</h6>
                        </div>
                        <div class="col-4 text-right">
                          <canvas id="update-chart-2" height="50"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php 
            } ?>

<?php if ($userType == 1 ) {
              ?>
                <div class="col-xl-3 col-md-6">
                  <div class="card bg-c-pink update-card">
                    <div class="card-block">
                      <div class="row align-items-end">
                        <div class="col-8">

                          <h4 class="text-white"><?php echo $row4['id5']; ?></h4>
                          <h6 class="text-white m-b-0">Todays Vehicle Bookings</h6>
                        </div>
                        <div class="col-4 text-right">
                          <canvas id="update-chart-3" height="50"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php }
             ?>



            <div class="col-xl-3 col-md-6">
              <div class="card bg-c-lite-green update-card">
                <div class="card-block">
                  <div class="row align-items-end">
                    <div class="col-8">

                      <h4 class="text-white"><?php echo $row2['id3']; ?></h4>
                      <h6 class="text-white m-b-0">Yesterdays Vehicle Entries</h6>
                    </div>
                    <div class="col-4 text-right">
                      <canvas id="update-chart-4" height="50"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-md-6">
              <div class="card bg-c-lite-green update-card">
                <div class="card-block">
                  <div class="row align-items-end">
                    <div class="col-8">

                      <h4 class="text-white"><?php echo $row3['id4']; ?></h4>
                      <h6 class="text-white m-b-0">Last 7 days Vehicle Entries</h6>
                    </div>
                    <div class="col-4 text-right">
                      <canvas id="update-chart-4" height="50"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6">
              <div class="card bg-c-lite-green update-card">
                <div class="card-block">
                  <div class="row align-items-end">
                    <div class="col-8">

                      <h4 class="text-white"><?php echo $row1['id2']; ?></h4>
                      <h6 class="text-white m-b-0">Total Vehicle Entries</h6>
                    </div>
                    <div class="col-4 text-right">
                      <canvas id="update-chart-4" height="50"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php if ($userType == 1 ) {
              ?>
                <div class="col-xl-3 col-md-6">
                  <div class="card bg-c-yellow update-card">
                    <div class="card-block">
                      <div class="row align-items-end">
                        <div class="col-8">

                          <h4 class="text-white"><?php echo $row5['id6']-1; ?></h4>
                          <h6 class="text-white m-b-0">Total Registered Users</h6>
                        </div>
                        <div class="col-4 text-right">
                          <canvas id="update-chart-1" height="50"></canvas>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php }
            ?>

            <div class="card col-xl-12 col-md-6 m-t-3">

              <div class="table-responsive dt-responsive m-t-50">
                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                  <thead>
                    <tr>
                      <th>S.NO</th>
                      <th>Parking Number</th>
                      <th>Owner Name</th>
                      <th>Vehicle Reg Number</th>

                    </tr>
                  </thead>
                  <?php
                  $ret = mysqli_query($conn, "select *from   tblvehicle where Status=''");
                  $cnt = 1;
                  while ($row = mysqli_fetch_array($ret)) {
                  ?>
                    <tbody>
                      <tr>
                        <td><?php echo $cnt; ?></td>
                        <td><?php echo $row['ParkingNumber']; ?></td>
                        <td><?php echo $row['OwnerName']; ?></td>
                        <td><?php echo $row['RegistrationNumber']; ?></td>

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
  </div>


  <?php include('footer.php'); ?>