<!DOCTYPE html>
<html lang="en">

<!-- HEADER ------------------------------------------------------------------------------------------------>

<?php
include_once "./include/header.php";
?>

<head>
    <style>
        #transaction a:before {
            width: 100%;
        }

        .transaction_form #print {
            width: 100px;
            height: 25px;
            margin-left: 135px;
            padding-top: 10px;
            padding-bottom: 5px;
            text-align: center;
            list-style: none;
            font-family: Arial, sans-serif;
            font-size: 17px;
            background: rgb(93, 8, 39);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            color: white;
            font-weight: 600;
        }

        .transaction_form #print:hover {
            background: rgb(170, 8, 39);
        }
    </style>
</head>

<!-- BODY -------------------------------------------------------------------------------------------------->

<body>

    <div class="transaction_form" style="width: 100px; display: flexbox;">
        <li id="print" name="print"><a href="generate_pdf_user.php" style="color: white; text-decoration: none;">PDF</a></li>

        <div style="width: 1098px;  min-height: 390px; height: auto; margin-top: 10px; margin-left: 135px; border-radius: 15px; padding-top: 13px; padding-bottom: 13px; background-color: white;">
            <div style="width: auto;  min-height: 390px; height: auto; background-color: white; ">
                <div id="transac" class="transac" style="width: auto; background: gray;">


                    <?php
                    $id = $_SESSION['id'];

                    $sql = "SELECT accounts.firstname, accounts.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE schedule.myid = '$id'";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                    ?>
                            <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                                <p>You have an appointment with <?php echo " " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
                                <?php echo "Date: " . $row["date"] . "<br>"; ?>
                                <?php echo "Address: " . $row["address"] . ", Odiongan, Romblon" . "<br>"; ?>
                                <label for=""> <?php echo "<br>" . "Message: " . $row["message"] . "<br>"; ?> </label>
                            </div>

                    <?php
                        }
                    } else {
                        echo '<div style="width: auto; padding-top: 10px; padding-left: 20px; background: white;">No transaction history.</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT -------------------------------------------------------------------------------------------->

    <script src="js/script.js"></script>

</body>

</html>