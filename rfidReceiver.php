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
  function fetchTableData() {
    fetch('/application/gettable.php').then(response => response.json()).then(data => {
      const table = document.getElementById('dataTable');
      table.innerHTML = ''; // Clear the table
      if (data.length === 1 && data[0].name === 'No Data') {
          const tr = document.createElement('tr');
          tr.innerHTML = "<td colspan='3' class='text-center'>No data available</td>";
          table.appendChild(tr);
        
      } else {
          data.forEach((row, index) => {
            const tr = document.createElement('tr');
            if (index === 0) {
                tr.classList.add('first-row');
                tr.innerHTML = "<td>${row.name}</td><td>${row.IC}</td><td>${row.phone} <span style='color: #6A1B9A; font-weight: bold;'>Now Serving</span></td>";
            } else {
                tr.innerHTML = "<td>${row.name}</td><td>${row.IC}</td><td>${row.phone}</td>";
            }
            tr.innerHTML = "<td colspan='3' class='text-center'>No data available</td>";
            table.appendChild(tr);
          });
      }
          
     });
  }

  setInterval(fetchTableData, 1000); // Update every second
  </script>

  </script>
</div>
</body>
</html>