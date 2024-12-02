<!DOCTYPE html>
<html lang="en">

<!-- HEADER ------------------------------------------------------------------------------------------------>

<?php
include_once "./include/header.php";

$id = $_SESSION["id"];

$sql = "SELECT COUNT(*) AS booked FROM schedule WHERE helperid = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $rowBook = $row['booked'];
} else {
    $rowHelper = 0;
}

$sql = "SELECT COUNT(*) AS pending FROM booking WHERE helperid = $id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $rowPending = $row['pending'];
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
            <label id="number"><?php echo $rowPending; ?></label>
            <div id="title">Pending Approval</div>
        </div>

        <div class="box">
            <label id="number"><?php echo $rowBook; ?></label>
            <div id="title">Total Booked</div>
        </div>
    </div>
    <!-- SCRIPT ------------------------------------------------------------------------------------------------>

</body>

</html>