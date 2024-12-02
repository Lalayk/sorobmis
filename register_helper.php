<!DOCTYPE html>
<html lang="en">

<?php
include_once "./include/head.php";
$brgys = ["Amatong", "Anahao", "Bangon", "Batiano", "Budiong", "Canduyong", "Dapawan", "Gabawan", "Libertad", "Ligaya", "Liwanag", "Liwayway", "Malilico", "Mayha", "Panique", "Pato-o", "Poctoy", "Progreso este", "Progreso weste", "Rizal", "Tabing dagat", "Tabobo-an", "Tuburan", "Tulay", "Tumingad"];
?>

<!-- HEADER ------------------------------------------------------------------------------------------------>

<style>
    .reg_helper_form h1,
    .reg_helper_form label,
    .reg_helper_form #photo {
        color:maliceblue(93, 8, 39);
    }
</style>

<header class="header">
    <ul>
        <li><a href="index.php"><img src="img/logo.png" alt="logo"></a></li>
        <li id="find"> <a href="index.php">Barangay Management System</a></li>
        <li id="about"> <a href="about.php">About</a></li>
        <li id="service"><a href="register_user.php">Residents</a></li>
        <li id="login"><a href="login.php">Login</a></li>
    </ul>
</header>

<!-- BODY -------------------------------------------------------------------------------------------------->

<body>

    <div class="reg_helper_form">
        <div class="wrapper">
            <form action="register_helper1.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                <h1>Register as Admin Officials</h1>
                <div class="inputs">
                    <input class="first" type="text" placeholder="Firstname" id="firstname" name="firstname" autocomplete="off" required>
                    <input class="last" type="text" placeholder="Lastname" id="lastname" name="lastname" autocomplete="off" required>
                </div>

                <div class="input">
                    <input type="text" placeholder="Username" id="username" name="username" autocomplete="off" required>
                </div>

                <div class="input">
                    <input type="text" placeholder="Mobile Number" id="number" name="number" autocomplete="off" required>
                </div>

                <div class="combobox">
                    <select class="select" name="address" id="address" required>
                        <option value="">Address</option>
                        <?php foreach ($brgys as $brgy) : ?>
                            <option value="<?= $brgy ?>"> <?= $brgy ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="combobox" style="margin-top: 15px;">
                    
                </div>

                <div class="input">
                    <input type="password" placeholder="Password" id="password" name="password" required>
                    <i class="fas fa-eye" id="togglepassword"></i>
                </div>

                <div class="input">
                    <input style="margin-bottom: 5px;" type="password" placeholder="Confirm Password" id="confirmpassword" name="confirmpassword" required>
                    <i class="fas fa-eye" id="toggleconfirmpassword"></i>
                    <br>
                    <span id="message"></span>
                </div>

                <div class="profile-photo">
                    <label>Profile Photo</label>
                    <div class="choose-photo">
                        <input id="photo" name="image" type="file" class="form-control-file" placeholder="Select Photo 1" required>
                    </div>
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