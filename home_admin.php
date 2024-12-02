<!DOCTYPE html>
<html lang="en">

<!-- HEADER ------------------------------------------------------------------------------------------------>

<?php
include_once "./include/header.php";

$sql = "SELECT COUNT(*) AS helper FROM accounts WHERE type = 'helper'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $rowHelper = $row['helper'];
} else {
    $rowHelper = 0;
}

$sql = "SELECT COUNT(*) AS residents FROM accounts WHERE type = 'residents'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $rowClient = $row['residents'];
} else {
    $rowClient = 0;
}
?>

<head>
    <style>
        #home a:before {
            width: 100%;
        }

        .box {
            width: 330px;
            height: 150px;
            padding-top: 50px;
            border-radius: 10px;
            text-align: center;
            background-color: white;
            display: flexbox;
        }

        #number {
            font-size: 40px;
            font-weight: bold;
        }

        #title {
            margin-top: 30px;
            
            font-weight: bold;
        }
    </style>
</head>

<!-- BODY -------------------------------------------------------------------------------------------------->

<body>
    <div style="width: 1078px; height: 400px; margin-left: 117px; padding-top: 10px; display: flex;  justify-content: center;">
        <div class="box" style="margin-left: 50px; margin-right: 50px;">
            <label id="number"><?php echo $rowHelper; ?></label>
            <div id="title">Registered Residents</div>
        </div>

        <div class="box">
            <label id="number"><?php echo $rowClient; ?></label>
            <div id="title">Requested Certificates, Indigency, Health Records, Permits</div>
        </div>
    </div>
    <!-- SCRIPT ------------------------------------------------------------------------------------------------>

</body>

</html>