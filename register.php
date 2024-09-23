<?php
session_start();
include('connect.php'); // Include your database connection file

// Function to create a salt for password hashing
function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}

if (isset($_POST['btn_register'])) {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = hash('sha256', createSalt() . hash('sha256', $_POST['password']));
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $addr = $_POST['addr'];
    $notes = "Normal user";
    $image = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];
    $role_id = 2; 
    $created_on = date('Y-m-d');
    $updated_on = date('Y-m-d');
    $last_login = '0000-00-00';
    $delete_status = 0; 

    // Upload image to server
    move_uploaded_file($temp_name, "uploads/" . $image);

    // Insert user data into database
    $sql = "INSERT INTO admin (username, email, password, fname, lname, gender, dob, contact, addr, notes, image, created_on, updated_on, role_id, last_login, delete_status) VALUES ('$username', '$email', '$password', '$fname', '$lname', '$gender', '$dob', '$contact', '$addr', '$notes', '$image', '$created_on', '$updated_on', '$role_id', '$last_login', '$delete_status')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('User registered successfully');</script>";
        // Redirect to login page after successful registration
        echo "<script>window.location.href = 'index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="popup_style.css">
    <link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
</head>

<body class="fix-menu">
    <section class="login-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="auth-box card">
                        <br>
                        <div class="text-center">
                        </div>
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                </div>
                            </div>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group form-primary">
                                    <input type="text" name="username" class="form-control" required="" placeholder="Username">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="email" name="email" class="form-control" required="" placeholder="Email">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control" required="" placeholder="Password">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="fname" class="form-control" required="" placeholder="First Name">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="lname" class="form-control" required="" placeholder="Last Name">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <select name="gender" class="form-control" required="">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="date" name="dob" class="form-control" required="" placeholder="Date of Birth">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="contact" class="form-control" required="" placeholder="Contact">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="form-group form-primary">
                                    <textarea name="addr" class="form-control" required="" placeholder="Address"></textarea>
                                    <span class="form-bar"></span>
                                </div>

                                <div class="form-group form-primary">
                                    <input type="file" name="image" class="form-control" required="">
                                    <span class="form-bar"></span>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="btn_register" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">REGISTER</button>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="login.php" class="btn btn-success btn-md btn-block waves-effect text-center m-b-20">LOGIN</a>
                                    </div>
                                </div><br><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>