<?php
require('connect.php');
include_once "profile_user.php";

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
            
            $ID = $_SESSION["id"];
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $number = $_POST["number"];
            $address = $_POST["address"];

            $stmt = $conn->prepare("UPDATE accounts SET firstname = '$firstname', lastname = '$lastname', number = '$number', address = '$address', image = '$imgContent' WHERE id = '$ID'");

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
    } 
}
?>