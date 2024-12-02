<!DOCTYPE html>
<html lang="en">

<!-- HEADER ------------------------------------------------------------------------------------------------>

<?php
include_once "./include/header.php";
date_default_timezone_set('Asia/Manila');
?>

<head>
    <style>
        #notification a:before {
            width: 100%;
        }
    </style>
</head>

<!-- BODY -------------------------------------------------------------------------------------------------->

<body>
    <div class="transaction_form" style="margin-top: -15px; padding-left: 15px; display: flex;">
        <h3 style="margin-left: 40px;">Messages</h3>

        <div style="width: 680px; height: 390px; margin-top: 60px; margin-left: -100px; border-radius: 15px; padding-top: 13px; padding-bottom: 13px; background-color: white;">
            <div style="width: auto; height: 390px; background-color: white; overflow: auto;">
                <div id="transac" class="transac" style="width: auto; background: gray;">

                    <?php
                    $id = $_SESSION['id'];
                    $sql = "SELECT * FROM messages WHERE helperid='$id'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                    ?>
                            <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; padding-bottom: 1px; background: white;">
                                <p><label style="font-weight: bold;"><?php echo $row["firstname"] . " " . $row["lastname"]; ?></label><label for="" style="float: right;"><?php echo $row["time"] . "<br>"; ?></label></p>
                                <label for=""> <?php echo $row["message"]; ?> </label>
                                <p></p>
                            </div>
                    <?php

                        }
                    } else {
                        echo '<div style="width: auto; padding-top: 10px; padding-left: 20px; background: white;">No notification.</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT -------------------------------------------------------------------------------------------->

</body>

</html>