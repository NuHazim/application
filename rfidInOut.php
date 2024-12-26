<?php
include("database.inc");
if (isset($_GET['action'])) {
    // Retrieve input values
    $action = $_GET['action'];
    $rfid = $_GET['rfid'];
    echo "action is " . $action;
} else {
  echo "No post value of post";

}
?>