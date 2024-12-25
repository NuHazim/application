<?php
include("database.inc");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>
  <style>
  body { background-color: #f0edd5; }
  .header { display: flex; align-items: center; margin-top: 20px; }
  .table-container { margin-top: 20px; }
  .table th { background-color: #6A1B9A; color: white; }
  .table td { background-color: #d0b1e6; }
  .table tbody .first-row td { background-color: #FF6F20;}
  .logo-container { text-align: left; margin-top: 10px; }
  .logo { max-width: 150px; height: auto; }
  </style>
</head>
<body>
<div class='container'>
<div class='header d-flex align-items-center justify-content-between'>
<img src= 'https://www.usm.my/templates/yootheme/cache/48/USM-Crest-Circle-483ccddf.png' alt='Company Logo' class='logo'>
<img src= 'https://www.usm.my/templates/yootheme/cache/ef/Logotype-Trans-ef69118e.png' alt='Company Logo' class='logo'>
<img src= 'https://www.usm.my/templates/yootheme/cache/d6/APEX-Trans-d66fb89b.png' alt='Company Logo' class='logo'>
<h1 class='title'>RFID Queue Status</h1>
</div>
  <div class='table-container'>
      <table class='table table-bordered table-striped'>
          <thead><tr><th>Name</th><th>IC</th><th>Phone</th></tr></thead>
          <tbody id='dataTable'>
          </tbody>
      </table>
  </div>
  <script>
  </script>
</div>
</body>
</html>