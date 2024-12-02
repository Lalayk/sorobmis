<?php
require('connect.php');
include_once "profile_helper.php";

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
            $expertise1 = $expertise1 = implode(',', $_POST['expertise']);
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $number = $_POST["number"];
            $address = $_POST["address"];

            $stmt = $conn->prepare("UPDATE accounts SET expertise = '$expertise1', firstname = '$firstname', lastname = '$lastname', number = '$number', address = '$address', image = '$imgContent' WHERE id = '$ID'");

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
    } 
}
?>