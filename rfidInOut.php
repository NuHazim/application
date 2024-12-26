<?php
include("database.inc");
if (isset($_POST['action'])) {
    // Retrieve input values
    $action = $_POST['action'];
    $rfid = $_POST['rfid'];
    echo "action is " + $action;
} else {
  echo "No post value of post";

}
?>