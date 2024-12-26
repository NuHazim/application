<?php
include("database.inc");
if (isset($_POST['submit'])) {
    // Retrieve input values
    $name = $_POST['name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $access = $_POST['access'];
    $IC = $_POST['IC'];
    $phone = $_POST['phone'];

    // Prepare the SQL query using placeholders
    $sql = "INSERT INTO userlist (Name, Date, Time, Access, IC, phone) VALUES (:name, :date, :time, :access, :IC, :phone)";
    $stmt = $pdo->prepare($sql);

    // Bind parameters to prevent SQL injection
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':time', $time, PDO::PARAM_STR);
    $stmt->bindParam(':access', $access, PDO::PARAM_STR);
    $stmt->bindParam(':IC', $IC, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);

    // Execute the prepared statement
    $stmt->execute();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application</title>
    <link rel="stylesheet" href="styleclient.css">
</head>
<body>
    <div class="container">
        <h1>Application form</h1>
        <form class="form" action="client.php" method="post">
            <div class="question"><label>Name:</label><input name="name" type="text" placeholder="Enter name here..." required></div>
            <div class="question"><label>IC:</label><input name="IC" type="text" ></div>      
            <div class="question"><label>Phone No:</label><input name="phone" type="text" ></div>      
            <div class="question"><label>Date:</label><input name="date" type="date" required></div>
            <div class="question"><label>Time:</label><input name="time" type="time" required></div>
            <div class="question"><label>Access Code:</label><input name="access" type="text" placeholder="Enter Acess code here..." required></div>
      

            <div class="centerbutton"><button type="submit" name="submit" class="button">Submit</button></div>
        </form>
    </div>
</body>
</html>
