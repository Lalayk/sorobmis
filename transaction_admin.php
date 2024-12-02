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
    </style>
</head>

<!-- BODY -------------------------------------------------------------------------------------------------->

<body>
    <div class="transaction_form" style="margin-top: -0px; padding-left: 55px; display: flex;">
        <div class="searchmap" style="width: 265px; margin-left: -210px;">
            <label style="width: 300px; margin-top: 10px; color: white;">Filter by:</label>

            <select class="select" name="selectOption" id="selectOption" style="margin-left: 10px; background-position: 150px;">
                <option value="all">All</option>
                <option value="january">January</option>
                <option value="february">February</option>
                <option value="march">March</option>
                <option value="april">April</option>
                <option value="may">May</option>
                <option value="june">June</option>
                <option value="july">July</option>
                <option value="august">August</option>
                <option value="september">September</option>
                <option value="october">October</option>
                <option value="november">November</option>
                <option value="december">December</option>
            </select>

            <div class="icon-map" style="margin-left: 75px;">
                <i class="fa-solid fa-sort"></i>
            </div>
        </div>

        <div style="width: 1093px; height: 394px; margin-top: 67px; margin-left: -265px; border-radius: 15px; padding-top: 13px; padding-bottom: 13px; background-color: white;">
            <div style="width: auto; height: 390px; background-color: white; overflow: auto;">
                <div id="transac" class="transac" style="width: auto; background: gray;">

                    <?php

                    $sql = "SELECT accounts.firstname as first, accounts.lastname as last, schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                    ?>
                            <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                                <p><?php echo " " . $row["first"] . " " .  $row["last"] . " have an appointment with " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
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

    <script>
        $(document).ready(function () {
            $('#selectOption').change(function () {
                var selectedOption = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: 'transaction_admin_month.php', 
                    data: { option: selectedOption },
                    success: function (response) {
                        $('#transac').html(response);
                    }
                });
            });
        });
    </script>

    <script src="js/script.js"></script>

</body>

</html>