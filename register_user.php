<!DOCTYPE html>
<html lang="en">

<?php
include_once "./include/head.php";
?>

<!-- HEADER ------------------------------------------------------------------------------------------------>

<style>
    .reg_client_form h1 {
        color: aliceblue(93, 8, 39);
    }
</style>

<header class="header">
    <ul>
        <li><a href="index.php"><img src="img/logo.png" alt="logo"></a></li>
        <li id="find"> <a href="index.php">Barangay Management System</a></li>
        <li id="about"> <a href="about.php">About</a></li>
        <li id="service"><a href="register_helper.php">Admin Officials</a></li>
        <li id="login"><a href="login.php">Login</a></li>
    </ul>
</header>
<!-- BODY -------------------------------------------------------------------------------------------------->

<body>

    <div class="reg_client_form">
        <div class="wrapper">
            <form action="" method="post" onsubmit="return validateForm()">
                <h1>Register as Residents of Soro-soro</h1>
                <div class="inputs">
                    <input class="first" type="text" placeholder="Firstname" name="firstname" autocomplete="off" required>
                    <input type="text" placeholder="Lastname" name="lastname" autocomplete="off" required>
                </div>

                <div class="input">
                    <input type="text" placeholder="Username" name="username" autocomplete="off" required>
                </div>

                <div class="input">
                    <input type="password" placeholder="Password" name="password" id="password" required>
                    <i class="fas fa-eye" id="togglepassword"></i>
                </div>

                <div class="input">
                    <input type="password" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" style="margin-bottom: 5px;" required>
                    <i class="fas fa-eye" id="toggleconfirmpassword"></i>
                    <br>
                    <span id="message"></span>
                </div>

                <div class="profile-photo">
                    <label>Profile Photo</label>
                    <div class="choose-photo">
                        <input id="photo" name="image" type="file" class="form-control-file" placeholder="Select Photo 1" required>
                    </div>

                <a href="#"><button type="submit" class="btn" name="submit">Register</button></a>
            </form>
        </div>
    </div>

    <!-- SCRIPT ------------------------------------------------------------------------------------------------>

    <script src="js/script.js"></script>

    <script>
        const tpassword = document.getElementById("password");
        const togglepassword = document.getElementById("togglepassword");

        togglepassword.addEventListener("click", function() {
            if (tpassword.type === "password") {
                tpassword.type = "text";
                togglepassword.classList.remove("fa-eye");
                togglepassword.classList.add("fa-eye-slash");
            } else {
                tpassword.type = "password";
                togglepassword.classList.remove("fa-eye-slash");
                togglepassword.classList.add("fa-eye");
            }
        });
    </script>

    <script>
        const tconfirmpassword = document.getElementById("confirmpassword");
        const toggleconfirmpassword = document.getElementById("toggleconfirmpassword");

        toggleconfirmpassword.addEventListener("click", function() {
            if (tconfirmpassword.type === "password") {
                tconfirmpassword.type = "text";
                toggleconfirmpassword.classList.remove("fa-eye");
                toggleconfirmpassword.classList.add("fa-eye-slash");
            } else {
                tconfirmpassword.type = "password";
                toggleconfirmpassword.classList.remove("fa-eye-slash");
                toggleconfirmpassword.classList.add("fa-eye");
            }
        });
    </script>

    <!---------------------------------------------------------------------------------------------------------->

    <script>
        const password = document.getElementById("password");
        const confirmPassword = document.getElementById("confirmpassword");
        const message = document.getElementById("message");

        function validatePassword() {
            if (password.value === confirmPassword.value) {
                message.innerHTML = "&nbsp;&nbsp;&nbsp;Password match!";
                message.style.color = "yellow";

            } else {

                message.innerHTML = "&nbsp;&nbsp;&nbsp;Password do not match!";
                message.style.color = "yellow";
            }
        }

        confirmPassword.addEventListener("input", validatePassword);
    </script>

    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmpassword").value;
            var message = document.getElementById("message");

            if (password !== confirmPassword) {
                message.innerHTML = "&nbsp;&nbsp;&nbsp;Password do not match!";
                message.style.color = "yellow";
                return false;

            } else {

                message.innerHTML = "&nbsp;&nbsp;&nbsp;Password match!";
                message.style.color = "yellow";
                return true;
            }
        }
    </script>

</body>

</html>

<!-- INSERT TO DATABASE ------------------------------------------------------------------------------------>

<?php
require 'connect.php';

if (isset($_POST["submit"])) {
    $type = "client";
    $profession = "-";
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $image = file_get_contents('img/default.jpg');

    $sql = "SELECT * FROM accounts WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

?>
            <script>
                Swal.fire({
                    title: 'SORRY :(',
                    text: 'The username has already been taken!',
                    icon: 'error',
                    customClass: {
                        container: 'custom-fade',
                    },
                });
            </script>
            <?php

        } else {

            $query = "INSERT INTO accounts VALUES('', '$type', '$profession', '', '$firstname', '$lastname', '$username', '$password', '', '', ?, '')";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $image);

            if ($stmt->execute()) {

            ?>
                <script>
                    Swal.fire({
                        title: 'SUCCESS!',
                        text: 'Registration Successful',
                        icon: 'success',
                        customClass: {
                            container: 'custom-fade',
                        },
                    });
                </script>
<?php

            }
        }

        $stmt->close();
    } else {

        echo "Error: " . $conn->error;
    }
}
?>