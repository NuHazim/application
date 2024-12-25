<?php
include("database.inc");
$sql2="SELECT * FROM userlist";
$result=mysqli_query($conn,$sql2);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        if(isset($_POST['delete'.$row['id']])){
            $sql3="DELETE FROM userlist WHERE id = ".$row['id'];
            mysqli_query($conn, $sql3);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>counter</title>
    <link rel="stylesheet" href="stylecounter.css">
</head>
<body>
    <div class="container">
        <h1>List of Applications</h1>
        <div class="list" style="padding-right:100px;">
            <h1>Date</h1>
            <h1>Name</h1>
            <h1>Time</h1>
            <h1>Access</h1>
        </div>
        <?php
            $sql="SELECT * FROM userlist";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
        ?>
        <form method="post" class="list" id="list">
            <h1><?php echo $row["Date"];?></h1>
            <h1><?php echo $row["Name"];?></h1>
            <h1><?php echo $row["Time"];?></h1>
            <h1><?php echo $row["Access"];?></h1>
            <button class="delete" id="delete" name="delete<?php echo $row["id"];?>">Delete</button>
        </form>
        <?php
            }}
        ?>
        <!-- <div class="list"><h1>01/01/2024</h1><h1>Nufail Hazim</h1><h1>8:00PM</h1><h1>RE678</h1><button class="delete">Delete</button></div> -->
        
    </div>
</body>
</html>