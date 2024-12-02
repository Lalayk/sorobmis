<?php
ob_start();
include_once "./include/header.php";
$output = ob_get_clean();

if (isset($_POST['option'])) {
    $selectedOption = $_POST['option'];
    if ($selectedOption === 'all') {
        $id = $_SESSION['id'];

        $sql = "SELECT schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE schedule.helperid = '$id'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p>You have an appointmnet with <?php echo " " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
                    <?php echo "Date: " . $row["date"] . "<br>"; ?>
                    <?php echo "Address: " . $row["address"] . ", Odiongan, Romblon" . "<br>"; ?>
                    <label for=""> <?php echo "<br>" . "Message: " . $row["message"] . "<br>"; ?> </label>

                </div>
            <?php

            }
        } else {
            echo '<div style="width: auto; padding-top: 10px; padding-left: 20px; background: white;">No transaction history.</div>';
        }
    } elseif ($selectedOption === 'january') {
        $id = $_SESSION['id'];

        $sql = "SELECT schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE schedule.helperid = '$id' AND MONTH(schedule.date) = '1'";

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
    } elseif ($selectedOption === 'february') {
        $id = $_SESSION['id'];

        $sql = "SELECT schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE schedule.helperid = '$id' AND MONTH(schedule.date) = '2'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p>You have an appointmnet with <?php echo " " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
                    <?php echo "Date: " . $row["date"] . "<br>"; ?>
                    <?php echo "Address: " . $row["address"] . ", Odiongan, Romblon" . "<br>"; ?>
                    <label for=""> <?php echo "<br>" . "Message: " . $row["message"] . "<br>"; ?> </label>

                </div>
            <?php

            }
        } else {
            echo '<div style="width: auto; padding-top: 10px; padding-left: 20px; background: white;">No transaction history.</div>';
        }
    } elseif ($selectedOption === 'march') {
        $id = $_SESSION['id'];

        $sql = "SELECT schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE schedule.helperid = '$id' AND MONTH(schedule.date) = '3'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p>You have an appointmnet with <?php echo " " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
                    <?php echo "Date: " . $row["date"] . "<br>"; ?>
                    <?php echo "Address: " . $row["address"] . ", Odiongan, Romblon" . "<br>"; ?>
                    <label for=""> <?php echo "<br>" . "Message: " . $row["message"] . "<br>"; ?> </label>

                </div>
            <?php

            }
        } else {
            echo '<div style="width: auto; padding-top: 10px; padding-left: 20px; background: white;">No transaction history.</div>';
        }
    } elseif ($selectedOption === 'april') {
        $id = $_SESSION['id'];

        $sql = "SELECT schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE schedule.helperid = '$id' AND MONTH(schedule.date) = '4'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p>You have an appointmnet with <?php echo " " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
                    <?php echo "Date: " . $row["date"] . "<br>"; ?>
                    <?php echo "Address: " . $row["address"] . ", Odiongan, Romblon" . "<br>"; ?>
                    <label for=""> <?php echo "<br>" . "Message: " . $row["message"] . "<br>"; ?> </label>

                </div>
            <?php

            }
        } else {
            echo '<div style="width: auto; padding-top: 10px; padding-left: 20px; background: white;">No transaction history.</div>';
        }
    } elseif ($selectedOption === 'may') {
        $id = $_SESSION['id'];

        $sql = "SELECT schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE schedule.helperid = '$id' AND MONTH(schedule.date) = '5'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p>You have an appointmnet with <?php echo " " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
                    <?php echo "Date: " . $row["date"] . "<br>"; ?>
                    <?php echo "Address: " . $row["address"] . ", Odiongan, Romblon" . "<br>"; ?>
                    <label for=""> <?php echo "<br>" . "Message: " . $row["message"] . "<br>"; ?> </label>

                </div>
            <?php

            }
        } else {
            echo '<div style="width: auto; padding-top: 10px; padding-left: 20px; background: white;">No transaction history.</div>';
        }
    } elseif ($selectedOption === 'june') {
        $id = $_SESSION['id'];

        $sql = "SELECT schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE schedule.helperid = '$id' AND MONTH(schedule.date) = '6'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p>You have an appointmnet with <?php echo " " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
                    <?php echo "Date: " . $row["date"] . "<br>"; ?>
                    <?php echo "Address: " . $row["address"] . ", Odiongan, Romblon" . "<br>"; ?>
                    <label for=""> <?php echo "<br>" . "Message: " . $row["message"] . "<br>"; ?> </label>

                </div>
            <?php

            }
        } else {
            echo '<div style="width: auto; padding-top: 10px; padding-left: 20px; background: white;">No transaction history.</div>';
        }
    } elseif ($selectedOption === 'july') {
        $id = $_SESSION['id'];

        $sql = "SELECT schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE schedule.helperid = '$id' AND MONTH(schedule.date) = '7'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p>You have an appointmnet with <?php echo " " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
                    <?php echo "Date: " . $row["date"] . "<br>"; ?>
                    <?php echo "Address: " . $row["address"] . ", Odiongan, Romblon" . "<br>"; ?>
                    <label for=""> <?php echo "<br>" . "Message: " . $row["message"] . "<br>"; ?> </label>

                </div>
            <?php

            }
        } else {
            echo '<div style="width: auto; padding-top: 10px; padding-left: 20px; background: white;">No transaction history.</div>';
        }
    } elseif ($selectedOption === 'august') {
        $id = $_SESSION['id'];

        $sql = "SELECT schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE schedule.helperid = '$id' AND MONTH(schedule.date) = '8'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p>You have an appointmnet with <?php echo " " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
                    <?php echo "Date: " . $row["date"] . "<br>"; ?>
                    <?php echo "Address: " . $row["address"] . ", Odiongan, Romblon" . "<br>"; ?>
                    <label for=""> <?php echo "<br>" . "Message: " . $row["message"] . "<br>"; ?> </label>

                </div>
            <?php

            }
        } else {
            echo '<div style="width: auto; padding-top: 10px; padding-left: 20px; background: white;">No transaction history.</div>';
        }
    } elseif ($selectedOption === 'september') {
        $id = $_SESSION['id'];

        $sql = "SELECT schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE schedule.helperid = '$id' AND MONTH(schedule.date) = '9'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p>You have an appointmnet with <?php echo " " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
                    <?php echo "Date: " . $row["date"] . "<br>"; ?>
                    <?php echo "Address: " . $row["address"] . ", Odiongan, Romblon" . "<br>"; ?>
                    <label for=""> <?php echo "<br>" . "Message: " . $row["message"] . "<br>"; ?> </label>

                </div>
            <?php

            }
        } else {
            echo '<div style="width: auto; padding-top: 10px; padding-left: 20px; background: white;">No transaction history.</div>';
        }
    } elseif ($selectedOption === 'october') {
        $id = $_SESSION['id'];

        $sql = "SELECT schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE schedule.helperid = '$id' AND MONTH(schedule.date) = '10'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p>You have an appointmnet with <?php echo " " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
                    <?php echo "Date: " . $row["date"] . "<br>"; ?>
                    <?php echo "Address: " . $row["address"] . ", Odiongan, Romblon" . "<br>"; ?>
                    <label for=""> <?php echo "<br>" . "Message: " . $row["message"] . "<br>"; ?> </label>

                </div>
            <?php

            }
        } else {
            echo '<div style="width: auto; padding-top: 10px; padding-left: 20px; background: white;">No transaction history.</div>';
        }
    } elseif ($selectedOption === 'november') {
        $id = $_SESSION['id'];

        $sql = "SELECT schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE schedule.helperid = '$id' AND MONTH(schedule.date) = '11'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p>You have an appointmnet with <?php echo " " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
                    <?php echo "Date: " . $row["date"] . "<br>"; ?>
                    <?php echo "Address: " . $row["address"] . ", Odiongan, Romblon" . "<br>"; ?>
                    <label for=""> <?php echo "<br>" . "Message: " . $row["message"] . "<br>"; ?> </label>

                </div>
            <?php

            }
        } else {
            echo '<div style="width: auto; padding-top: 10px; padding-left: 20px; background: white;">No transaction history.</div>';
        }
    } elseif ($selectedOption === 'december') {
        $id = $_SESSION['id'];

        $sql = "SELECT schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE schedule.helperid = '$id' AND MONTH(schedule.date) = '12'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p>You have an appointmnet with <?php echo " " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
                    <?php echo "Date: " . $row["date"] . "<br>"; ?>
                    <?php echo "Address: " . $row["address"] . ", Odiongan, Romblon" . "<br>"; ?>
                    <label for=""> <?php echo "<br>" . "Message: " . $row["message"] . "<br>"; ?> </label>

                </div>
<?php

            }
        } else {
            echo '<div style="width: auto; padding-top: 10px; padding-left: 20px; background: white;">No transaction history.</div>';
        }
    }
}
?>