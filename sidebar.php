 <?php
  include('connect.php');
  $sql = "select * from admin where id = '" . $_SESSION["id"] . "'";
  $result = $conn->query($sql);
  $ro = mysqli_fetch_array($result);
  $userType = $ro['role_id'];

  ?>


 <div class="pcoded-main-container">
   <div class="pcoded-wrapper">
     <nav class="pcoded-navbar">
       <div class="pcoded-inner-navbar main-menu">
         <div class="pcoded-navigatio-lavel">Navigation</div>
         <ul class="pcoded-item pcoded-left-item">
           <?php if (isset($userType) && $userType == 1) { ?>

             <li class="">
               <a href="index.php">
                 <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                 <span class="pcoded-mtext">Dashboard</span>
               </a>
             </li>
           <?php }  ?>

           <?php if (isset($userType) && $userType == 2) { ?>
             <li class="pcoded-hasmenu">
             <a href="javascript:void(0)">
               <span class="pcoded-micon"><i class="feather icon-book"></i></span>
               <span class="pcoded-mtext">Slot Booking</span>
             </a>
             <ul class="pcoded-submenu">
               <li class="">
                 <a href="booking.php">
                   <span class="pcoded-micon"><i class="fa fa-plus"></i></span>
                   <span class="pcoded-mtext">Book A Slot</span>
                 </a>
               </li>
               <li class="">
                 <a href="mybookings.php">
                   <span class="pcoded-mtext">Manage Bookings</span>
                 </a>
               </li>

             </ul>

           </li>
          


           <?php }  ?>
           <li class="pcoded-hasmenu">
             <a href="javascript:void(0)">
               <span class="pcoded-micon"><i class="fa fa-user"></i></span>
               <span class="pcoded-mtext">Manage Profile</span>
             </a>
             <ul class="pcoded-submenu">
               <li class="">
                 <a href="profile.php">
                   <span class="pcoded-micon"><i class="fa fa-plus"></i></span>
                   <span class="pcoded-mtext">Edit Profile</span>
                 </a>
               </li>
               <li class="">
                 <a href="changepassword.php">
                   <span class="pcoded-mtext">Change Password</span>
                 </a>
               </li>

             </ul>

           </li>
           <?php if (isset($userType) && $userType == 2) { ?>

           <li class="">
               <a href="review.php">
                 <span class="pcoded-micon"><i class="feather icon-book"></i></span>
                 <span class="pcoded-mtext">Review</span>
               </a>
             </li>
             <?php }  ?>
      
           <?php if (isset($userType) && $userType == 1) { ?>

             <li class="pcoded-hasmenu">
               <a href="javascript:void(0)">
                 <span class="pcoded-micon"><i class="fa fa-bars"></i></span>
                 <span class="pcoded-mtext">Manage Category</span>
               </a>
               <ul class="pcoded-submenu">
                 <li class="">
                   <a href="addcategory.php">
                     <span class="pcoded-micon"><i class="fa fa-plus"></i></span>
                     <span class="pcoded-mtext">Add Category</span>
                   </a>
                 </li>
                 <li class="">
                   <a href="manage-category.php">
                     <span class="pcoded-mtext">View Categories</span>
                   </a>
                 </li>

               </ul>

             </li>


           <?php }  ?>

           <?php if (isset($userType) && $userType == 1) { ?>

             <li class="pcoded-hasmenu">
               <a href="javascript:void(0)">
                 <span class="pcoded-micon"><i class="fa fa-bars"></i></span>
                 <span class="pcoded-mtext">Manage Parking Spot</span>
               </a>
               <ul class="pcoded-submenu">
                 <li class="">
                   <a href="addSpots.php">
                     <span class="pcoded-micon"><i class="fa fa-plus"></i></span>
                     <span class="pcoded-mtext">Add Parking Spot</span>
                   </a>
                 </li>
                 <li class="">
                   <a href="manage-spots.php">
                     <span class="pcoded-mtext">View Parking spots</span>
                   </a>
                 </li>

               </ul>

             </li>


           <?php }  ?>
           <?php if (isset($userType) && $userType == 1) { ?>

           <li class="">
             <a href="add-vehicle.php">
               <span class="pcoded-micon"><i class="fa fa-automobile"></i></span>
               <span class="pcoded-mtext">Vehicle Entry</span>
             </a>
           </li>
           <?php }  ?>

           <?php if (isset($userType) && $userType == 1) { ?>

             <li class="pcoded-hasmenu">
               <a href="javascript:void(0)">
                 <span class="pcoded-micon"><i class="fa fa-retweet"></i></span>
                 <span class="pcoded-mtext">Vehicle In/Out</span>
               </a>
               <ul class="pcoded-submenu">
               <li class="">
                   <a href="manage_vehicle_booking.php">
                     <span class="pcoded-mtext">Manage Booked Vehicle</span>
                   </a>
                 </li>

                 <li class="">
                   <a href="manage-incomingvehicle.php">
                     <span class="pcoded-mtext">Manage In Vehicle</span>
                   </a>
                 </li>
            

                 <li class="">
                   <a href="manage-outgoingvehicle.php">
                     <span class="pcoded-mtext">Manage Out Vehicle</span>
                   </a>
                 </li>
               </ul>
             </li>
           <?php }  ?>


           <?php if (isset($userType) && $userType == 1) { ?>

             <li class="pcoded-hasmenu">
               <a href="javascript:void(0)">
                 <span class="pcoded-micon"><i class="fa fa-book"></i></i></span>
                 <span class="pcoded-mtext">Reports</span>
               </a>
               <ul class="pcoded-submenu">
                 <li class="">
                   <a href="bwdates-report-ds.php">
                     <span class="pcoded-mtext">Searchable Reports</span>
                   </a>
                 </li>

               </ul>
             </li>
           <?php }  ?>

           <?php if (isset($userType) && $userType == 1) { ?>

             <li class="">
               <a href="search_v.php">
                 <span class="pcoded-micon"><i class="feather icon-search"></i></span>
                 <span class="pcoded-mtext">Parking Status</span>
               </a>
             </li>
           <?php }  ?>
           <?php if (isset($userType) && $userType == 1) { ?>

<li class="">
    <a href="feedback.php">
      <span class="pcoded-micon"><i class="feather icon-book"></i></span>
      <span class="pcoded-mtext">Feedbacks</span>
    </a>
  </li>
  <?php }  ?>

           <li class="">
             <a href="logout.php">
               <span class="pcoded-micon"><i class="feather icon-log-out"></i></span>
               <span class="pcoded-mtext">Logout</span>
             </a>
           </li>

         </ul>
       </div>
     </nav>