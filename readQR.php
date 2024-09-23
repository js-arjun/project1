<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
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
        video {
            width: 100%;
            max-width: 640px; /* Adjust size as needed */
            height: auto;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>QR Code Scanner</h1>

    <!-- Button to go to home page -->
    <a href="home.php" class="button">Go to Home</a>

    <!-- Button to open camera and scan QR code -->
    <button class="button" id="scanButton">Scan QR Code</button>

    <!-- Video element to display camera feed -->
    <video id="preview"></video>

    <!-- Display scanned QR code content -->
    <div id="qrResult"></div>

    <!-- Include instascan library -->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <script>
        // Function to open camera and scan QR code
        function scanQRCode() {
            let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
            scanner.addListener('scan', function (content) {
                // Display scanned QR code content
                document.getElementById('qrResult').innerText = 'Scanned QR Code: ' + content;
                
                // Stop scanning and close the camera
                scanner.stop();
                document.getElementById('preview').style.display = 'none';
            });
            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    // Start scanning
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });
        }

        // Attach click event listener to the scan button
        document.getElementById('scanButton').addEventListener('click', function() {
            scanQRCode();
        });
    </script>
</body>
</html>
