<?php
include("database.inc");
    $sql = "SELECT * FROM rfidlist order by id;";
    $stmt = $pdo->query($sql); // Execute query and fetch results
    $jsonString = "[";

    if ($stmt->rowCount() > 0) {
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $name = htmlspecialchars($row["Name"]);
            $IC = htmlspecialchars($row["IC"]);
            $Date = htmlspecialchars($row["Date"]);
            $Time = htmlspecialchars($row["Time"]);
            $Access = htmlspecialchars($row["Access"]);
            $Phone = "-";
            $jsonString=$jsonString. "{\"name\":\"" . $name . "\",\"IC\":\"" . $IC . "\",\"phone\":\"" . $Phone  . "\"}";

        }
        
    }

    $jsonString=$jsonString."]";
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($jsonString);

?>