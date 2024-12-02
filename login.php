<!DOCTYPE html>
<html lang="en">

<?php
include_once "./include/head.php";
?>

<!-- HEADER ------------------------------------------------------------------------------------------------>

<style>
    .login_form h1,
    .login_form label,
    .login_form a {
        color: rgb(93, 8, 39);
    }
</style>

<header class="header">
    <ul>
        <li><a href="index.php"><img src="img/logo.png" alt="logo"></a></li>
        <li id="find"> <a href="index.php">Barangay Management System</a></li>
        <li id="about"> <a href="about.php">About</a></li>
        <li id="register"><a href="register_user.php">register</a></li>
    </ul>
</header>

<!-- BODY -------------------------------------------------------------------------------------------------->

<body>

    <div class="login_form" id="loginForm">
        <div class="wrapper">
            <form action="" method="post">
                <h1>Login</h1>
                <div class="input">
                    <input type="type" placeholder="Username" name="username" id="username" autocomplete="off" required>
                    <i class="fas fa-user"></i>
                </div>

                <div class="input">
                    <input type="password" placeholder="Password" name="password" id="password" required>
                    <i class="fas fa-lock"></i>
                    <i class="fas fa-eye" id="togglepassword" style="float: right; margin-top: 3px; margin-right: 15px"></i>
                </div>

                <div class="remember-forgot">
                    <!-- <label><input type="checkbox">Remember me</label>
                    <a href="#"> Forgot password?</a> -->
                </div>

                <button type="submit" class="btn" name="submit">Login</button>

                <div class="register-link">
                    <label>Don't have an account?</label>
                    <a href="register_user.php">Register</a>
                </div>
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

</body>

</html>

<!-- LOGIN TO DATABASE ----------------------------------------------------------------------------------------->

<?php
session_start();
require('connect.php');

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    function getCount()
    {
        require('connect.php');
        $query = "SELECT COUNT(*) as attempt FROM attempts";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);

        return $row['attempt'];
    }

    $count = getCount();

    $stmt = $conn->prepare("SELECT id, type, profession, firstname, lastname, username, number, address FROM accounts WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    $stmt->bind_result($id, $type, $profession, $firstname, $lastname, $username, $number, $address);
    $stmt->fetch();

    if ($stmt->num_rows == 1) {
        $_SESSION['id'] = $id;
        $_SESSION['profession'] = $profession;
        $_SESSION['type'] = $type;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['username'] = $username;
        $_SESSION['number'] = $number;
        $_SESSION['address'] = $address;

        if ($_SESSION['type'] == "client") {

?>
            <script>
                Swal.fire({
                    title: 'WELCOME!',
                    text: 'Login Successful',
                    icon: 'success',
                    customClass: {
                        container: 'custom-fade',
                    },
                }).then(function() {
                    window.location = 'home_user.php';
                });
            </script>
        <?php

            $sql = "TRUNCATE TABLE attempts";
            $result = $conn->query($sql);
        } elseif ($_SESSION['type']  == "helper") {

        ?>
            <script>
                Swal.fire({
                    title: 'WELCOME!',
                    text: 'Login Successful',
                    icon: 'success',
                    customClass: {
                        container: 'custom-fade',
                    },
                }).then(function() {
                    window.location = 'home_helper.php';
                });
            </script>
        <?php

            $sql = "TRUNCATE TABLE attempts";
            $result = $conn->query($sql);
        } elseif ($_SESSION['type']  == "admin") {

        ?>
            <script>
                Swal.fire({
                    title: 'WELCOME!',
                    text: 'Login Successful',
                    icon: 'success',
                    customClass: {
                        container: 'custom-fade',
                    },
                }).then(function() {
                    window.location = 'home_admin.php';
                });
            </script>
        <?php

            $sql = "TRUNCATE TABLE attempts";
            $result = $conn->query($sql);
        }
    } else {

        $query = "INSERT INTO attempts VALUES('', '$username')";
        $stmt = $conn->prepare($query);

        if ($count > 1) {
            $stmt->execute();

        ?>
            <script>
                let timerInterval1;
                Swal.fire({
                    title: 'SORRY :(',
                    html: 'Login attempts exceeded! <br></br> Wait for 15 seconds.',
                    icon: 'error',
                    customClass: {
                        container: 'custom-fade',
                    },
                    allowOutsideClick: false,
                    timer: 15000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval1 = setInterval(() => {
                            timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 1000);
                    },
                    willClose: () => {
                        clearInterval(timerInterval1);
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log("I was closed by the timer");
                    }
                });
            </script>
            <?php

            $sqlSelectMaxId = "SELECT MAX(id) AS max_id FROM attempts";
            $resultSelectMaxId = $conn->query($sqlSelectMaxId);

            if ($resultSelectMaxId) {
                $row = $resultSelectMaxId->fetch_assoc();
                $maxIdToDelete = $row['max_id'];

                $sql = "DELETE FROM attempts WHERE id = $maxIdToDelete";
                $result = $conn->query($sql);
            }
        } elseif ($stmt->execute()) {
            ?>
            <script>
                Swal.fire({
                    title: 'SORRY :(',
                    text: 'Login Unsuccessful',
                    icon: 'error',
                    customClass: {
                        container: 'custom-fade',
                    },
                });
            </script>
<?php
        }
    }
}
?>