<!DOCTYPE html>
<html lang="en">

<!-- HEADER ------------------------------------------------------------------------------------------------>

<?php
include_once "./include/header.php";

$sql = "SELECT * FROM accounts WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $existingValues = explode(',', $row['expertise']);
} else {
    echo "Record not found.";
    exit();
}
?>

<head>
    <link rel="stylesheet" href="css/multi-select-tag.css">
    <script src="js/multi-select-tag.js"></script>

    <style>
        .editmodal .wrapper1 {
            width: 290px;
            height: 230px;
            margin-top: 60px;
            margin-left: 20px;
            margin-right: 50px;
            border: 2px solid gray;
            background-size: 100% 100%;
            overflow: hidden;
            backdrop-filter: blur(20px);
            background-size: cover;
            background-position: center;
        }

        .editmodal .wrapper1 img {
            width: 230px;
            height: 230px;
        }

        .editmodal .wrapper1 .file {
            width: 230px;
            height: 50px;
            position: absolute;
            left: 0;
            bottom: 0;
            outline: none;
            color: transparent;
            box-sizing: border-box;
            padding: 15px 110px;
            cursor: pointer;
            transition: 0.5s;
            background: rgba(0, 0, 0, .5);
            opacity: 0;
        }

        .editmodal .wrapper1 #selectedImage1 {
            max-width: 250px;
            height: 250px;
            background-size: cover;
            background-position: center;
        }

        .editmodal .wrapper1 .file::-webkit-file-upload-button {
            visibility: hidden;
        }

        .editmodal .wrapper1 .file::before {
            content: "\f030";
            font-family: FontAwesome;
            color: white;
            display: inline-block;
            user-select: none;
        }

        .editmodal .wrapper1 .file::after {
            font-family: Arial, sans-serif;
            font-weight: bold;
            color: white;
            display: block;
            top: 70px;
            font-size: 15px;
            position: absolute;
        }

        .editmodal .wrapper1 .file:hover {
            opacity: 1;
        }

        .list li {
            list-style: none;
        }

        .star-rating {
            font-size: 24px;
        }

        .star {
            color: #FFD700;
        }

        .empty {
            color: #CCCCCC;
        }
    </style>
</head>

<!--BODY---------------------------------------------------------------------------------------------------->

<body>
    <div class="profile_user" id="po">
        <div class="form">
            <div class="wrapper">

                <?php
                $result = $conn->query("SELECT image FROM accounts WHERE id = $id");
                while ($row = $result->fetch_assoc()) {
                ?>
                    <img id="selectedImage" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" />
                <?php } ?>

            </div>

            <div class="wrapper1">
                <h1>
                    <?php
                    echo "" . $_SESSION['firstname'] . " " . $_SESSION['lastname'];
                    ?>
                </h1>

                <div class="info">
                    <i class="fas fa-user-alt" style="margin-right: 17px;"></i>
                    <p>
                        <?php
                        echo "" . $_SESSION['username'];
                        ?>
                    </p>
                </div>

                <div class="info">
                    <img src="img/profession.png" alt="logo" style="margin-right: 17px;">
                    <p>
                        <?php
                        echo "" . $_SESSION['profession'];
                        ?>
                    </p>
                </div>

                <div style="display: flex; margin-top: -15px; margin-bottom: 25px;">
                    <div>
                        <i class="fas fa-cogs" style="margin-right: 13px; color: rgb(93, 8, 39);"></i>
                    </div>

                    <div class="list">
                        <li><?php if (in_array('Hair', $existingValues)) echo 'Hair Cutting and Styling'; ?></li>
                        <li><?php if (in_array('Nail', $existingValues)) echo 'Manicures, Pedicures and Nail Art'; ?></li>
                        <li><?php if (in_array('Treatments', $existingValues)) echo 'Facial, Waxes and Treatments'; ?></li>

                        <li><?php if (in_array('Masonry', $existingValues)) echo 'Masonry'; ?></li>
                        <li><?php if (in_array('Finish', $existingValues)) echo 'Finish Carpentry'; ?></li>
                        <li><?php if (in_array('Residential', $existingValues)) echo 'Residential Carpentry'; ?></li>
                        <li><?php if (in_array('Green', $existingValues)) echo 'Green Carpentry'; ?></li>
                        <li><?php if (in_array('Rough', $existingValues)) echo 'Rough Carpentry'; ?></li>

                        <li><?php if (in_array('Housekeeper', $existingValues)) echo 'Housekeeper'; ?></li>
                        <li><?php if (in_array('Laundry', $existingValues)) echo 'Laundry Man and Women'; ?></li>

                        <li><?php if (in_array('Electrician', $existingValues)) echo 'Automative Electrician'; ?></li>
                        <li><?php if (in_array('Technician', $existingValues)) echo 'Electrical Technician'; ?></li>
                        <li><?php if (in_array('Line', $existingValues)) echo 'Line Person'; ?></li>
                        <li><?php if (in_array('Foreman', $existingValues)) echo 'Electrical Foreman'; ?></li>
                        <li><?php if (in_array('Highway', $existingValues)) echo 'Highway Systems Electrician'; ?></li>
                    </div>
                </div>

                <div class="info">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>
                        <?php echo "" . $_SESSION['address'] . ', Odiongan, Romblon'; ?>
                    </p>
                </div>

                <div class="info">
                    <i class="fas fa-phone" style="margin-right: 15px;"></i>
                    <p>+63</p>
                    <p>
                        <?php echo "" . $_SESSION['number']; ?>
                    </p>
                </div>

                <li class="edit" onclick="showEditDialog()">Edit Profile</li>

                <h3 style="margin-top: 50px;">Ratings and Reviews</h3>

                <?php
                $sql = "SELECT ratings.rating, ratings.firstname, ratings.lastname, ratings.review, ratings.date, accounts.image FROM ratings INNER JOIN accounts ON ratings.myid = accounts.id WHERE ratings.helperid = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $rating = $row["rating"];
                        $firstname = $row["firstname"];
                        $lastname = $row["lastname"];
                        $review = $row["review"];
                        $date = $row["date"];
                        $image = $row["image"];

                        echo '<div style="margin-top: 30px; margin-bottom: 30px;">';
                        echo '<div style="display: flex;">';
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($image) . '" style="width: 40px; height: 40px; margin-bottom: 10px; border-radius: 50%;">';
                        echo '<div class="name" style="margin-top: 10px; margin-left: 20px;">' . $firstname . ' ' . $lastname . '</div>';
                        echo '</div>';
                        echo '<div class="review" style="display: flex;">';
                        echo '<div class="star-rating">';
                        for ($i = 1; $i <= 5; $i++) {
                            $class = ($i <= $rating) ? 'filled' : 'empty';
                            echo '<span class="star ' . $class . '">&#9733;</span>';
                        }

                        echo '</div>';
                        echo '<div class="date" style="margin-top: 9px; margin-left: 10px; font-size: 14px;">' . $date . '</div>';
                        echo '</div>';
                        echo '<div>' . $review . '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "No rating yet";
                }
                ?>
            </div>
            <div id="display"></div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <!-- EDIT USER PROFILE ------------------------------------------------------------------------------------->

    <form action="profile_helper1.php" method="post" enctype="multipart/form-data">
        <div id="editModal" class="editoverlay">

            <div class="nodisplay" onclick="cancelEdit()">
            </div>

            <div class="editmodal">
                <div class="wrapper1">

                    <?php
                    $id = $_SESSION["id"];
                    $result = $conn->query("SELECT image FROM accounts WHERE id = $id");
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <img style="width: 230px; height: 230px;" id="selectedImage1" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" />
                    <?php } ?>

                    <input type="file" class="file" id="imageInput1" title=" " name="image">
                </div>

                <div class="group2">
                    <h1>Edit Personal Details</h1>
                    <div class="form-group">
                        <div>
                            <label>Firstname</label>
                            <input class="firstname" type="text" name="firstname" id="firstname" value="<?php echo "" . $_SESSION['firstname']; ?>" required>
                        </div>

                        <div>
                            <label>Lastname</label>
                            <input class="lastname" type="text" name="lastname" id="lastname" value="<?php echo "" . $_SESSION['lastname']; ?>" required>
                        </div>
                    </div>

                    <div style="margin-top: -10px;">
                        <label>Expertise</label>

                        <?php if ($_SESSION['profession'] === 'Beautician') { ?>

                            <select name="expertise[]" id="expertise" multiple>
                                <option value="Hair" <?php if (in_array('Hair', $existingValues)) echo 'selected'; ?>>Hair Cutting, Coloring and Styling</option>
                                <option value="Nail" <?php if (in_array('Nail', $existingValues)) echo 'selected'; ?>>Manicures, Pedicures and Nail Art</option>
                                <option value="Treatments" <?php if (in_array('Treatments', $existingValues)) echo 'selected'; ?>>Facial, Waxes and Treatments</option>
                            </select>

                        <?php } elseif ($_SESSION['profession'] === 'Carpenter') { ?>

                            <select name="expertise[]" id="expertise" multiple>
                                <option value="Masonry" <?php if (in_array('Masonry', $existingValues)) echo 'selected'; ?>>Masonry</option>
                                <option value="Finish" <?php if (in_array('Finish', $existingValues)) echo 'selected'; ?>>Finish Carpentry</option>
                                <option value="Residential" <?php if (in_array('Residential', $existingValues)) echo 'selected'; ?>>Residential Carpentry</option>
                                <option value="Green" <?php if (in_array('Green', $existingValues)) echo 'selected'; ?>>Green Carpentry</option>
                                <option value="Rough" <?php if (in_array('Rough', $existingValues)) echo 'selected'; ?>>Rough Carpentry</option>
                            </select>

                        <?php } elseif ($_SESSION['profession'] === 'Cleaners') { ?>

                            <select name="expertise[]" id="expertise" multiple>
                                <option value="Housekeeper" <?php if (in_array('Housekeeper', $existingValues)) echo 'selected'; ?>>Housekeeper</option>
                                <option value="Laundry" <?php if (in_array('Laundry', $existingValues)) echo 'selected'; ?>>Laundry Man and Women</option>
                            </select>

                        <?php } elseif ($_SESSION['profession'] === 'Electrician') { ?>

                            <select name="expertise[]" id="expertise" multiple>
                                <option value="Electrician" <?php if (in_array('Electrician', $existingValues)) echo 'selected'; ?>>Automative Electrician</option>
                                <option value="Technician" <?php if (in_array('Technician', $existingValues)) echo 'selected'; ?>>Electrical Technician</option>
                                <option value="Line" <?php if (in_array('Line', $existingValues)) echo 'selected'; ?>>Line Person</option>
                                <option value="Foreman" <?php if (in_array('Foreman', $existingValues)) echo 'selected'; ?>>Electrical Foreman</option>
                                <option value="Highway" <?php if (in_array('Highway', $existingValues)) echo 'selected'; ?>>Highway Systems Electrician</option>
                            </select>

                        <?php } ?>
                    </div>

                    <div class="form-group" style="margin-top: 10px;">
                        <div>
                            <label>Home location</label>
                            <select class="location" type="text" name="address" id="address" required>
                                <option value="">- Location -</option>
                                <?php foreach ($brgys as $brgy) : ?>
                                    <option value="<?= $brgy ?>"> <?= $brgy ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: -10px;">
                        <div>
                            <label>Phone number</label>
                            <i>+63</i>
                            <input class="number" type="text" name="number" id="number" value="<?php echo "" . $_SESSION['number']; ?>" required>
                        </div>
                    </div>

                    <button type="submit" id="save" name="submit" onclick="" style="margin-top: 10px;">Save</button>
                    <li id="cancel" onclick="cancelEdit()"><a>Cancel</a></li>
                </div>
            </div>
        </div>
    </form>

    <!-- SCRIPT ------------------------------------------------------------------------------------------------>

    <script src="js/script.js"></script>

    <script>
        const imageInput = document.getElementById("imageInput1");
        const selectedImage = document.getElementById("selectedImage1");

        imageInput.addEventListener('change', function() {
            const file = imageInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    selectedImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                selectedImage.src = '#';
            }
        });
    </script>

</body>

</html>
<!-- SCRIPT ------------------------------------------------------------------------------------------------>

<script>
    new MultiSelectTag('expertise') // id
</script>

<?php
if (isset($_POST["submit"])) {

    $ID = $_SESSION["id"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $expertise1 = implode(',', $_POST['expertise']);
    $number = $_POST["number"];
    $address = $_POST["address"];

    $stmt = $conn->prepare("UPDATE accounts SET expertise = '$expertise1', firstname = '$firstname', lastname = '$lastname', number = '$number', address = '$address' WHERE id = '$ID'");

    if ($stmt->execute()) {
        $id = $_SESSION["id"];

        $stmt = $conn->prepare("SELECT expertise, firstname, lastname, number, address FROM accounts WHERE id = '$id'");
        $stmt->execute();
        $stmt->store_result();

        $stmt->bind_result($expertise, $firstname, $lastname, $number, $address);
        $stmt->fetch();

        $_SESSION['expertise'] = $expertise;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['number'] = $number;
        $_SESSION['address'] = $address;

?>
        <script>
            Swal.fire({
                title: 'SUCCESS!',
                text: 'Update Successful',
                icon: 'success',
                customClass: {
                    container: 'custom-fade',
                },
            }).then(function() {
                window.location = 'profile_helper.php';
            });
        </script>
    <?php

    } else {

    ?>
        <script>
            Swal.fire({
                title: 'SORRY :(',
                text: 'Update Unsuccessful',
                icon: 'error',
                customClass: {
                    container: 'custom-fade',
                },
            });
        </script>
<?php

    }
}
?>