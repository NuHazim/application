<?php
include("database.inc");
if (isset($_GET['action'])) {
    // Retrieve input values
    $action = $_GET['action'];
    $rfid = $_GET['rfid'];
    //echo "action is " . $action. "<br>";
    $sql2 = "SELECT * FROM userlist WHERE Access='".$rfid."'";
    $stmt = $pdo->query($sql2); // Execute query and fetch results

    if ($stmt->rowCount() > 0) {
        
        //while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //}
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $name = $row["Name"];
        
        if($action == 'login'){
            echo "Login for rfid ". $rfid. " which name is ".$name. "<br>";
        } else {
            echo "Logout for rfid ". $rfid. " which name is ".$name. "<br>";
        }
    } else {
        echo "No record found for rfid ". $rfid;
    }
} else {
  echo "No post value of action and rfid parameter";

}
?>