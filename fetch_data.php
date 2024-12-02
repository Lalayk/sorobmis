<?php
require('connect.php');

if (isset($_POST['selectedValue1']) && isset($_POST['selectedValue2'])) {
    $selectedValue1 = $_POST['selectedValue1'];
    $selectedValue2 = $_POST['selectedValue2'];

    $sql = "SELECT * FROM accounts WHERE type = 'helper' AND address = '$selectedValue1' AND profession = '$selectedValue2'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

?>

            <head>
                <style>
                    .card {
                        width: 390px;
                        margin-top: 15px;
                        padding-top: 30px;
                        padding-left: 30px;
                        padding-right: 30px;
                        padding-bottom: 10px;
                        border-radius: 15px;
                        background-color: white;
                        display: flexbox;
                    }

                    .card.green-border {
                        padding-left: 26px;
                        padding-bottom: 6px;
                        border: 4px solid rgb(93, 8, 39);
                    }
                </style>
            </head>

            <?php echo '<div id="card" class="card" data-id="' . $row['id'] . '">'; ?>

            <img style="width: 100px; height: 100px; margin-bottom: 10px;" id="selectedImage" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" />

            <label for="" style="font-family: Arial, sans-serif; font-size: 23px; font-weight: bold;">
                <?php echo "<br>" . $row["firstname"] . " " . $row["lastname"] ?>
            </label>

            <?php echo "<br>" . $row["profession"] . "<p>" ?>
            </div>

<?php

        }
    } else {
        echo "<div style='margin-top: 10px;'></div>";
        echo "<label style='color: white'>No results found.</label>";
    }

    $conn->close();
}
?>