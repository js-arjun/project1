<?php include('connect.php'); ?>
<?php

$sql = "select * from admin where id = '" . $_SESSION["id"] . "'";
$query = $conn->query($sql);
while ($row = mysqli_fetch_array($query)) {
  //print_r($row);
  extract($row);
  $fname = $row['fname'];
  $lname = $row['lname'];
  $email = $row['email'];
  $contact = $row['contact'];
  //$dob1 = $row['dob'];
  $gender = $row['gender'];
  $image = $row['image'];
}
?>

<body>
  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
      <nav class="navbar header-navbar pcoded-header">
        <div class="navbar-wrapper">
          <div class="navbar-logo">
            <a href="profile.php">
              <div class="text-center">
                <image class="profile-img" src="uploadImage/Logo/logo.png" style="width: 90%"></image>
              </div>
            </a>
          </div>
          <div class="navbar-container container-fluid">
            <ul class="nav-left">
              <li class="header-search">
                <div class="main-search morphsearch-search">
                  <div class="input-group">
                    <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                    <input type="text" class="form-control">
                  </div>
                </div>
              </li>
              <li>
                <a href="#!" onclick="javascript:toggleFullScreen()">
                  <i class="feather icon-maximize full-screen"></i>
                </a>
              </li>
            </ul>
            <ul class="nav-right">

              <a href="profile.php">
                <img src="uploadImage/profile/<?php echo $image; ?>" alt="Profile Image" class="profile-img" style="width: 45px; height: 45px; border-radius: 50%;">
              </a>


            </ul>
          </div>
        </div>
      </nav>