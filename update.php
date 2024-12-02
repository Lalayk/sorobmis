<?php
require('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "updateStatusToRead") {
    $updateSql = "UPDATE messages SET status = 'READ'";
    $conn->query($updateSql);
}

$conn->close();
