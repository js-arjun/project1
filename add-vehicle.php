<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('connect.php'); ?>

<div class="pcoded-content">
  <div class="pcoded-inner-content">
    <div class="main-body">
      <div class="page-wrapper">
        <div class="page-header">
          <div class="row align-items-end">
            <div class="col-lg-8">
              <div class="page-header-title">
                <div class="d-inline">
                  <h4>Add Vehicle</h4>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                  <li class="breadcrumb-item">
                    <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                  </li>
                  <li class="breadcrumb-item"><a>Add Vehicle</a></li>
                  <li class="breadcrumb-item"><a href="add-vehicle.php">Add Vehicle</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header"></div>
                <div class="card-block">
                  <h1>QR Code Scanner</h1>
                  <button class="button" id="scanButton">Scan QR Code</button>
                  <video id="preview"></video>
                  <div id="qrResult"></div>

                  <h2>Manual Entry</h2>
                  <form id="manualEntryForm" method="post" action="Incoming.php">
                    <label for="parkingNumber">Parking Number:</label>
                    <input type="text" id="parkingNumber" name="parkingNumber" required>
                    <button class="button" type="submit">Submit</button>
                  </form>

                  <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
                  <script>
                    function scanQRCode() {
                      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                      scanner.addListener('scan', function (content) {
                        document.getElementById('qrResult').innerText = 'Scanned QR Code: ' + content;
                        scanner.stop();
                        document.getElementById('preview').style.display = 'none';
                        sendScannedContent(content);
                      });
                      Instascan.Camera.getCameras().then(function (cameras) {
                        if (cameras.length > 0) {
                          scanner.start(cameras[0]);
                        } else {
                          console.error('No cameras found.');
                        }
                      }).catch(function (e) {
                        console.error(e);
                      });
                    }
                    document.getElementById('scanButton').addEventListener('click', function() {
                      scanQRCode();
                    });

                    function sendScannedContent(content) {
                      let form = document.createElement('form');
                      form.setAttribute('method', 'post');
                      form.setAttribute('action', 'Incoming.php');

                      let input = document.createElement('input');
                      input.setAttribute('type', 'hidden');
                      input.setAttribute('name', 'scanned_content');
                      input.setAttribute('value', content);

                      form.appendChild(input);
                      document.body.appendChild(form);
                      form.submit();
                    }
                  </script>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
