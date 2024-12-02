<!DOCTYPE html>
<html lang="en">

<!-- HEADER ------------------------------------------------------------------------------------------------>

<?php
include_once "./include/header.php";
?>

<!--BODY---------------------------------------------------------------------------------------------------->

<body>
    <div class="profile_user" id="po">
        <div class="form">
            <div class="wrapper">

                <?php
                $id = $_SESSION["id"];
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

                <div class="info">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>
                        <?php echo "" . $_SESSION['address'] . ', Soro soro'; ?>
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
            </div>
        </div>
    </div>

    <!-- EDIT USER PROFILE ------------------------------------------------------------------------------------->

    <form action="profile_user1.php" method="post" enctype="multipart/form-data">
        <div id="editModal" class="editoverlay">

            <div class="nodisplay" onclick="cancelEdit()">
            </div>

            <div class="editmodal">
                <div class="wrapper5">

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

                    <div class="form-group">
                        <div>
                            <label>Home location</label>
                            <select class="location" type="text" name="address" id="address" >
                                <option value="">- Location -</option>
                                
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <label>Phone number</label>
                            <i>+63</i>
                            <input class="number" type="text" name="number" id="number" autocomplete="off" value="<?php echo "" . $_SESSION['number']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <label>Username</label>
                            <p>
                                <?php
                                echo "" . $_SESSION['username'];
                                ?>
                            </p>
                            <li id="setting"><a href="settings_user.php">Edit in Settings</a></li>
                        </div>
                    </div>

                    <button type="submit" id="save" name="submit" onclick="">Save</button>
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

<?php
if (isset($_POST["submit"])) {

    $ID = $_SESSION["id"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $number = $_POST["number"];
    $address = $_POST["address"];

    $stmt = $conn->prepare("UPDATE accounts SET firstname = '$firstname', lastname = '$lastname', number = '$number', address = '$address' WHERE id = '$ID'");

    if ($stmt->execute()) {
        $id = $_SESSION["id"];

        $stmt = $conn->prepare("SELECT firstname, lastname, number, address FROM accounts WHERE id = '$id'");
        $stmt->execute();
        $stmt->store_result();

        $stmt->bind_result($firstname, $lastname, $number, $address);
        $stmt->fetch();

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
                window.location = 'profile_user.php';
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