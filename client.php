<?php
include("database.php");
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $access=$_POST['access'];
    $sql="INSERT INTO userlist(Name,Date,Time,Access) VALUES ('$name','$date','$time','$access')";
    mysqli_query($conn,$sql);
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
            <div class="question"><label>Date:</label><input name="date" type="date" required></div>
            <div class="question"><label>Time:</label><input name="time" type="time" required></div>
            <div class="question"><label>Access Code:</label><input name="access" type="text" placeholder="Enter Acess code here..." required></div>
            <div class="centerbutton"><button type="submit" name="submit" class="button">Submit</button></div>
        </form>
    </div>
</body>
</html>