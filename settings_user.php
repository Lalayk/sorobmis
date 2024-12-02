<!DOCTYPE html>
<html lang="en">

<!-- HEADER ------------------------------------------------------------------------------------------------>

<?php
include_once "./include/header.php";
?>

<!-- BODY -------------------------------------------------------------------------------------------------->

<body>

    <div class="settings_user">
        <div>
            <h1>Settings</h1>
        </div>

        <div class="box">
            <div class="group">
                <label for="">Username</label>
                <i class="fas fa-pencil" onclick="showSettingsDialog()"></i>
                <p>
                    <?php
                    echo "" . $_SESSION['username'];
                    ?>
                </p>
            </div>
        </div>

        <div class="box">
            <div class="group">
                <label for="">Password</label>
                <i class="fas fa-pencil" onclick="showSettingsDialog2()"></i>
            </div>
        </div>
    </div>

    <!-- EDIT USER SETTINGS ------------------------------------------------------------------------------------>

    <form method="post" onsubmit="return validateForm()">
        <div id="settingsModal" class="settingsoverlay">

            <div class="nosettingsdisplay" onclick="cancelSettings()">
            </div>

            <div class="settingsmodal">
                <h1>Change Username</h1>
                <div class="form-group">
                    <div>
                        <label>New Username</label>
                        <input type="text" name="newusername" id="newusername" required>
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <label>Confirm Username</label>
                        <span id="message"></span><br>
                        <input type="text" name="confirmusername" id="confirmusername" required>
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" id="password" required>
                        <i class="fas fa-eye" id="togglepassword"></i>
                    </div>
                </div>

                <button id="save" name="submit_form1" onclick="validateUsername()">Save</button>
                <li  id="cancel" onclick="cancelSettings()"><a>Cancel</a></li>
            </div>
        </div>
    </form>

    <!-------------------------------------------------------------------------------------------------------------->

    <form action="" method="post" onsubmit="return validateForm2()">
        <div id="settingsModal2" class="settingsoverlay2">

            <div class="nosettingsdisplay2" onclick="cancelSettings2()">
            </div>

            <div class="settingsmodal2">
                <h1>Change Password</h1>
                <div class="form-group">
                    <div>
                        <label>Current Password</label>
                        <input type="password" name="currentpassword" id="currentpassword" required>
                        <i class="fas fa-eye" id="togglecurrentpassword"></i>
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <label>New Password</label>
                        <input type="password" name="newpassword" id="newpassword" required>
                        <i class="fas fa-eye" id="togglenewpassword"></i>
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <label>Confirm Password</label>
                        <span id="message2"></span><br>
                        <input type="password" name="confirmpassword" id="confirmpassword" required>
                        <i class="fas fa-eye" id="toggleconfirmpassword"></i>
                    </div>
                </div>

                <button id="save" name="submit_form2" onclick="">Save</button>
                <li  id="cancel" onclick="cancelSettings2()"><a>Cancel</a></li>
            </div>
        </div>
    </form>

    <!-- SCRIPT ------------------------------------------------------------------------------------------------>

    <script src="js/script.js"></script>

    <script>
        const password = document.getElementById("password");
        const togglepassword = document.getElementById("togglepassword");

        togglepassword.addEventListener("click", function() {
            if (password.type === "password") {
                password.type = "text";
                togglepassword.classList.remove("fa-eye");
                togglepassword.classList.add("fa-eye-slash");
            } else {
                password.type = "password";
                togglepassword.classList.remove("fa-eye-slash");
                togglepassword.classList.add("fa-eye");
            }
        });
    </script>

    <script>
        const currentpassword = document.getElementById("currentpassword");
        const togglecurrentpassword = document.getElementById("togglecurrentpassword");

        togglecurrentpassword.addEventListener("click", function() {
            if (currentpassword.type === "password") {
                currentpassword.type = "text";
                togglecurrentpassword.classList.remove("fa-eye");
                togglecurrentpassword.classList.add("fa-eye-slash");
            } else {
                currentpassword.type = "password";
                togglecurrentpassword.classList.remove("fa-eye-slash");
                togglecurrentpassword.classList.add("fa-eye");
            }
        });
    </script>

    <script>
        const newpassword = document.getElementById("newpassword");
        const togglenewpassword = document.getElementById("togglenewpassword");

        togglenewpassword.addEventListener("click", function() {
            if (newpassword.type === "password") {
                newpassword.type = "text";
                togglenewpassword.classList.remove("fa-eye");
                togglenewpassword.classList.add("fa-eye-slash");
            } else {
                newpassword.type = "password";
                togglenewpassword.classList.remove("fa-eye-slash");
                togglenewpassword.classList.add("fa-eye");
            }
        });
    </script>

    <script>
        const confirmpassword = document.getElementById("confirmpassword");
        const toggleconfirmpassword = document.getElementById("toggleconfirmpassword");

        toggleconfirmpassword.addEventListener("click", function() {
            if (confirmpassword.type === "password") {
                confirmpassword.type = "text";
                toggleconfirmpassword.classList.remove("fa-eye");
                toggleconfirmpassword.classList.add("fa-eye-slash");
            } else {
                confirmpassword.type = "password";
                toggleconfirmpassword.classList.remove("fa-eye-slash");
                toggleconfirmpassword.classList.add("fa-eye");
            }
        });
    </script>

    <!---------------------------------------------------------------------------------------------------------->

    <script>
        const newUsername = document.getElementById("newusername");
        const confirmUsername = document.getElementById("confirmusername");
        const message = document.getElementById("message");

        function validateUsername() {
            if (newUsername.value === confirmUsername.value) {
                message.innerHTML = "&nbsp;&nbsp;&nbsp;Username match!";
                message.style.color = "green";

            } else {

                message.innerHTML = "&nbsp;&nbsp;&nbsp;Username do not match!";
                message.style.color = "red";
            }
        }

        confirmUsername.addEventListener("input", validateUsername);
    </script>

    <script>
        function validateForm() {
            var newusername = document.getElementById("newusername").value;
            var confirmusername = document.getElementById("confirmusername").value;
            var message = document.getElementById("message");

            if (newusername !== confirmusername) {
                message.innerHTML = "&nbsp;&nbsp;&nbsp;Username do not match!";
                message.style.color = "red";
                return false;

            } else {

                message.innerHTML = "&nbsp;&nbsp;&nbsp;Username match!";
                message.style.color = "green";
                return true;
            }
        }
    </script>

    <!---------------------------------------------------------------------------------------------------------->

    <script>
        const newPassword = document.getElementById("newpassword");
        const confirmPassword = document.getElementById("confirmpassword");
        const message2 = document.getElementById("message2");

        function validatePassword() {
            if (newPassword.value === confirmPassword.value) {
                message2.innerHTML = "&nbsp;&nbsp;&nbsp;Password match!";
                message2.style.color = "green";

            } else {

                message2.innerHTML = "&nbsp;&nbsp;&nbsp;Password do not match!";
                message2.style.color = "red";
            }
        }

        confirmPassword.addEventListener("input", validatePassword);
    </script>

    <script>
        function validateForm2() {
            var newpassword = document.getElementById("newpassword").value;
            var confirmpassword = document.getElementById("confirmpassword").value;
            var message2 = document.getElementById("message2");

            if (newpassword !== confirmpassword) {
                message2.innerHTML = "&nbsp;&nbsp;&nbsp;Password do not match!";
                message2.style.color = "red";
                return false;

            } else {

                message2.innerHTML = "&nbsp;&nbsp;&nbsp;Password match!";
                message2.style.color = "green";
                return true;
            }
        }
    </script>
</body>

</html>

<!-- UPDATE DATABASE ------------------------------------------------------------------------------------------->

<?php
if (isset($_POST['submit_form1'])) {
    $id = $_SESSION["id"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT firstname, lastname, username FROM accounts WHERE id = ? AND password = ?");
    $stmt->bind_param("ss", $id, $password);
    $stmt->execute();
    $stmt->store_result();

    $stmt->bind_result($firstname, $lastname, $username);
    $stmt->fetch();

    if ($stmt->num_rows == 1) {
        $ID = $_SESSION["id"];
        $username = $_POST["newusername"];

        $stmt = $conn->prepare("UPDATE accounts SET username = ? WHERE id = ?");
        $stmt->bind_param("si", $username, $ID);

        if ($stmt->execute()) {

            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['username'] = $username;

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
                    window.location = 'settings_user.php';
                });
            </script>
        <?php

        }
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
} elseif (isset($_POST['submit_form2'])) {
    $id = $_SESSION["id"];
    $currentpassword = $_POST["currentpassword"];

    $stmt = $conn->prepare("SELECT * FROM accounts WHERE id = ? AND password = ?");
    $stmt->bind_param("ss", $id, $currentpassword);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $ID = $_SESSION["id"];
        $newpassword = $_POST["newpassword"];

        $stmt = $conn->prepare("UPDATE accounts SET password = ? WHERE id = ?");
        $stmt->bind_param("si", $newpassword, $ID);

        if ($stmt->execute()) {
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
                    window.location = 'settings_user.php';
                });
            </script>
        <?php

        }
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
