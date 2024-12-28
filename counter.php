<?php
include("database.inc");
// $sql2="SELECT * FROM userlist";
// $result=mysqli_query($conn,$sql2);
// if(mysqli_num_rows($result)>0){
//     while($row=mysqli_fetch_assoc($result)){
//         if(isset($_POST['delete'.$row['id']])){
//             $sql3="DELETE FROM userlist WHERE id = ".$row['id'];
//             mysqli_query($conn, $sql3);
//         }
//     }
// }
$sql2 = "SELECT * FROM userlist";
$stmt = $pdo->query($sql2); // Execute query and fetch results

if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if (isset($_POST['delete' . $row['id']])) {
            // Use prepared statement for the DELETE query
            $sql3 = "DELETE FROM userlist WHERE id = :id";
            $deleteStmt = $pdo->prepare($sql3);
            $deleteStmt->execute([':id' => $row['id']]);
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
        <table border="5">
            <thead>
                <tr>
                    <th><h1>Name</h1></th>
                    <th><h1>IC</h1></th>
                    <th><h1>Phone</h1></th>
                    <th><h1>Date</h1></th>
                    <th><h1>Time</h1></th>
                    <th><h1>Access</h1></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM userlist";
                $stmt = $pdo->query($sql); // Execute query and fetch results

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <form method="post" >
                        <tr>
                            <td><h1><?php echo htmlspecialchars($row["Name"]); ?></h1> </td>
                            <td><h1><?php echo htmlspecialchars($row["IC"]); ?></h1></td>
                            <td><h1><?php echo htmlspecialchars($row["phone"]); ?></h1></td>
                            <td><h1><?php echo htmlspecialchars($row["Date"]); ?></h1></td>
                            <td><h1><?php echo htmlspecialchars($row["Time"]); ?></h1></td>
                            <td><h1><?php echo htmlspecialchars($row["Access"]); ?></h1></td>
                            <td><button class="delete" id="delete" name="delete<?php echo $row["id"]; ?>">Delete</button></td>
                        </tr>
                    </form>
                <?php
                    }}
                ?>
            </tbody>
        </table>
        <!-- <div class="list" style="padding-right:100px;">
            
            <h1>IC</h1>
            <h1>Phone</h1>
            <h1>Date</h1>
            <h1>Time</h1>
            <h1>Access</h1>
        </div> -->
        
        <!-- <div class="list"><h1>01/01/2024</h1><h1>Nufail Hazim</h1><h1>8:00PM</h1><h1>RE678</h1><button class="delete">Delete</button></div> -->
        
    </div>
</body>
</html>
