<?php
session_start();
require('connect.php');
$id = $_SESSION['id'];
date_default_timezone_set('Asia/Manila');

$result = $conn->query("SELECT * FROM accounts WHERE id = $id");
while ($row = $result->fetch_assoc()) {
    $myid = $row['id'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];

    $helperId = $_POST["helperId"];
    $rating = $_POST["rating"];
    $review = $_POST["review"];
    $date = date("Y-m-d");

    $sql = "INSERT INTO ratings (helperid, myid, firstname, lastname, rating, review, date) VALUES ('$helperId', '$myid', '$firstname', '$lastname', '$rating', '$review', '$date')";

    if ($conn->query($sql) === TRUE) {
?>
        <script>
            Swal.fire({
                title: 'Thanks for sharing!',
                text: 'Your feedback helps others make better decisions',
                icon: 'success',
                customClass: {
                    container: 'custom-fade',
                },
            }).then(function() {
                location.reload();
            });
        </script>
<?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
