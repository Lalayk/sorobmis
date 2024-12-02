<?php
require 'connect.php';
include_once "register_helper.php";

$status = $statusMsg = '';
if (isset($_POST["submit"])) {
    $status = 'error';
    if (!empty($_FILES["image"]["name"])) {

        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            $type = "helper";
            $profession = $_POST["profession"];
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $number = $_POST["number"];
            $address = $_POST["address"];

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

                    $query = "INSERT INTO applicants VALUES('', '$type', '$profession', '$firstname', '$lastname', '$username', '$password', '$number', '$address', '$imgContent')";
                    $stmt = $conn->prepare($query);

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
    }
}
?>