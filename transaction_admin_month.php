<?php
require('connect.php');

if (isset($_POST['option'])) {
    $selectedOption = $_POST['option'];
    if ($selectedOption === 'all') {
        $sql = "SELECT accounts.firstname as first, accounts.lastname as last, schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p><?php echo " " . $row["first"] . " " .  $row["last"] . " have request with " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
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
        $sql = "SELECT accounts.firstname as first, accounts.lastname as last, schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE MONTH(schedule.date) = '1'";
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
    } elseif ($selectedOption === 'february') {
        $sql = "SELECT accounts.firstname as first, accounts.lastname as last, schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE MONTH(schedule.date) = '2'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p><?php echo " " . $row["first"] . " " .  $row["last"] . " have an appointmnet with " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
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
        $sql = "SELECT accounts.firstname as first, accounts.lastname as last, schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE MONTH(schedule.date) = '3'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p><?php echo " " . $row["first"] . " " .  $row["last"] . " have an appointmnet with " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
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
        $sql = "SELECT accounts.firstname as first, accounts.lastname as last, schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE MONTH(schedule.date) = '4'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p><?php echo " " . $row["first"] . " " .  $row["last"] . " have an appointmnet with " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
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
        $sql = "SELECT accounts.firstname as first, accounts.lastname as last, schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE MONTH(schedule.date) = '5'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p><?php echo " " . $row["first"] . " " .  $row["last"] . " have an appointmnet with " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
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
        $sql = "SELECT accounts.firstname as first, accounts.lastname as last, schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE MONTH(schedule.date) = '6'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p><?php echo " " . $row["first"] . " " .  $row["last"] . " have an appointmnet with " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
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
        $sql = "SELECT accounts.firstname as first, accounts.lastname as last, schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE MONTH(schedule.date) = '7'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p><?php echo " " . $row["first"] . " " .  $row["last"] . " have an appointmnet with " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
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
        $sql = "SELECT accounts.firstname as first, accounts.lastname as last, schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE MONTH(schedule.date) = '8'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p><?php echo " " . $row["first"] . " " .  $row["last"] . " have an appointmnet with " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
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
        $sql = "SELECT accounts.firstname as first, accounts.lastname as last, schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE MONTH(schedule.date) = '9'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p><?php echo " " . $row["first"] . " " .  $row["last"] . " have an appointmnet with " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
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
        $sql = "SELECT accounts.firstname as first, accounts.lastname as last, schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE MONTH(schedule.date) = '10'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p><?php echo " " . $row["first"] . " " .  $row["last"] . " have an appointmnet with " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
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
        $sql = "SELECT accounts.firstname as first, accounts.lastname as last, schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE MONTH(schedule.date) = '11'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p><?php echo " " . $row["first"] . " " .  $row["last"] . " have an appointmnet with " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
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
        $sql = "SELECT accounts.firstname as first, accounts.lastname as last, schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message FROM accounts 
                INNER JOIN schedule ON accounts.id = schedule.helperid WHERE MONTH(schedule.date) = '12'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            ?>
                <div id="name" class="name" style="width: auto; margin-bottom: 2px; padding: 20px; padding-top: 1px; background: white;">
                    <p><?php echo " " . $row["first"] . " " .  $row["last"] . " have an appointmnet with " . $row["firstname"] . " " . $row["lastname"] . "." . "<br>"; ?></p>
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