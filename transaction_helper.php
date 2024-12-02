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

        #print {
            width: 100px;
            height: 25px;
            margin-left: 733px;
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

        #print:hover {
            background: rgb(170, 8, 39);
        }
    </style>
</head>

<!-- BODY -------------------------------------------------------------------------------------------------->

<body>
    <div class="transaction_form" style="display: flexbox;">
        <div class="searchmap" style="width: auto; margin-left: 135px; display:flex;">
            <label style="width: auto; margin-top: 10px; color: white;">Filter by:</label>

            <select class="select" name="selectOption" id="selectOption" style="width: 185px; margin-left: 10px; background-position: 150px;">
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

            <div>
                <li id="print" name="print"><a href="generate_pdf_helper.php" style="color: white; text-decoration: none;">PDF</a></li>
            </div>
        </div>

        <div style="width: 1093px;  min-height: 390px; height: auto; margin-top: 10px; margin-left: 135px; border-radius: 15px; padding-top: 13px; padding-bottom: 13px; background-color: white;">
            <div style="width: auto; min-height: 390px; height: auto; background-color: white;">
                <div id="transac" class="transac" style="width: auto; background: gray;">

                    <?php
                    $id = $_SESSION['id'];

                    $sql = "SELECT schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE schedule.helperid = '$id'";

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

    <script>
        $(document).ready(function() {
            $('#selectOption').change(function() {
                var selectedOption = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: 'transaction_helper_month.php',
                    data: {
                        option: selectedOption
                    },
                    success: function(response) {
                        $('#transac').html(response);
                    }
                });
            });
        });
    </script>

    <script src="js/script.js"></script>

    <script>
        function printTable() {
            var printContents = document.getElementById('printableTable').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;

            setTimeout(function() {
                location.reload();
            }, 500);
        }
    </script>

</body>

</html>