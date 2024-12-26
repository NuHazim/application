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
        $ic = $row["IC"];
        $phone = $row["phone"];
        
        if($action == 'login'){
            echo "Login for rfid ". $rfid. " which name is ".$name. "<br>";
            $access=$rfid;
           
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $date=date('Y-m-d');
            $time=date('H:i:s');
            // Prepare the SQL query using placeholders
            $sql = "INSERT INTO rfidlist (Name, IC, Phone, Date, Time,Access) VALUES (:name,:ic,:phone, :date, :time, :access)";
            $stmt = $pdo->prepare($sql);

            // Bind parameters to prevent SQL injection
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':ic', $ic, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->bindParam(':time', $time, PDO::PARAM_STR);
            $stmt->bindParam(':access', $access, PDO::PARAM_STR);

            // Execute the prepared statement
            $stmt->execute();
        } else {
            echo "Logout for rfid ". $rfid. " which name is ".$name. "<br>";
            $sql3 = "SELECT id FROM rfidlist WHERE Access='".$rfid."' order by Date,Time limit 1";
            $stmt3 = $pdo->query($sql3); // Execute query and fetch results
            if ($stmt3->rowCount() > 0) {
        
                //while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                //}
                $row = $stmt3->fetch(PDO::FETCH_ASSOC);
                $id = $row["id"];
                echo "Will delete record for id ". $id."<br>";
                // delete this id from 
                $sql4 = "DELETE from rfidlist WHERE id = :id";
                $stmt4 = $pdo->prepare($sql4);

                // Bind parameters to prevent SQL injection
                $stmt4->bindParam(':id', $id, PDO::PARAM_INT );
                $stmt4->execute();
            } else {
                echo "No record found in queue for rfid ". $rfid;
            }

        }
    } else {
        echo "No record found for rfid ". $rfid;
    }
} else {
  echo "No post value of action and rfid parameter";

}
?>