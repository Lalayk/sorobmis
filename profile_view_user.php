<!-- HEADER ------------------------------------------------------------------------------------------------>

<?php
include_once "./include/header.php";
?>

<!-- BODY -------------------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="en">

<!-- HEADER ------------------------------------------------------------------------------------------------>

<?php
include_once "./include/header.php";
?>

<head>
    <style>
        .book {
            width: 80px;
            margin-top: 30px;
            margin-bottom: 30px;
            list-style: none;
            padding: 15px;
            font-family: 'Arial';
            border: none;
            border-radius: 10px;
            cursor: pointer;
            color: white;
            user-select: none;
            font-weight: 600;
            background-color: rgb(254, 195, 7);
        }

        .book a {
            padding-left: 3px;
            color: white;
            text-decoration: none;
        }

        .book:hover {
            background-color: rgb(170, 130, 0);
        }
    </style>
</head>

<!-- BODY -------------------------------------------------------------------------------------------------->

<body>
    <div class="profile_user" id="po">
        <div class="form">
            <div class="wrapper">

                <?php
                $myid = $_GET['myid'];
                $result = $conn->query("SELECT * FROM accounts WHERE id = $myid");
                while ($row = $result->fetch_assoc()) {
                ?>
                    <img id="selectedImage" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" />
            </div>

            <div class="wrapper1">
                <h1>
                    <?php
                    echo "" . $row['firstname'] . " " . $row['lastname'];
                    ?>
                </h1>

                <div class="info">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>
                        <?php echo "" . $row['address'] . ', Odiongan, Romblon'; ?>
                    </p>
                </div>

                <div class="info">
                    <i class="fas fa-phone" style="margin-right: 15px;"></i>
                    <p>+63</p>
                    <p>
                        <?php echo "" . $row['number']; ?>
                    </p>
                </div>
            <?php } ?>
            </div>

        </div>
    </div>


    <!-- SCRIPT ------------------------------------------------------------------------------------------------>

</body>

</html>