<?php
// Include the library
require 'phpqrcode/qrlib.php';

// Function to generate QR code from a number
function generateQRCode($number, $file_path) {
    // QR code content (in this case, it's the number)
    $content = $number;

    // Output file (make sure it has the .png extension)
    $output_file = $file_path;

    // Generate QR code
    QRcode::png($content, $output_file);
}

// Get the number (vid) from the query string
$number = isset($_GET['vid']) ? $_GET['vid'] : '';

// File path where QR code will be saved
$file_path = "qrcodes/qr_".$number.".png";

// Generate QR code
generateQRCode($number, $file_path);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        h1 {
            margin-bottom: 20px;
        }
        .qr-code {
            width: 300px; /* Adjust size as needed */
            height: auto;
        }
        .button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>QR Code</h1>
    
    <!-- Display the QR code image -->
    <img src="<?php echo $file_path; ?>" alt="QR Code" class="qr-code">

    <!-- Download link for the QR code -->
    <a href="<?php echo $file_path; ?>" download class="button">Download QR Code</a>

    <!-- Button to go to home page -->
    <a href="booking.php" class="button">Go Back</a>
</body>
</html>
