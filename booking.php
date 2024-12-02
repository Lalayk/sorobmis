<?php
session_start();
require('connect.php');
date_default_timezone_set('Asia/Manila');

// BOOKING

$helperId = $_POST["helperId"];
$myId = $_SESSION['id'];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$number = $_POST["number"];
$location = $_POST["location"];
$date = date("Y-m-d h:i:sa", strtotime($_POST["date"]));
$time = date("Y-m-d h:i:sa");
$message = $_POST["message"];

$query = "INSERT INTO booking VALUES('', '$helperId', '$myId', '$firstname', '$lastname', '$number', '$location', '$date', '$time', '$message')";
$stmt = $conn->prepare($query);

if ($stmt->execute()) {

?>
    <script>
        Swal.fire({
            text: 'Book Successful',
            icon: 'success',
            customClass: {
                container: 'custom-fade',
            },
        });
    </script>
<?php

    $insert1 = "INSERT INTO messages VALUES ('', '$helperId', '$firstname', '$lastname', '$time', '$message', 'UNREAD')";
    $stmt1 = $conn->prepare($insert1);
    $stmt1->execute();
    $stmt1->close();

    $sql2 = "SELECT * FROM conversations WHERE (user_1=? AND user_2=?) OR (user_2=? AND user_1=?)";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("ssss", $myId, $helperId, $myId, $helperId);
    $stmt2->execute();
    $result = $stmt2->get_result();

    if ($result->num_rows == 0) {
        $insert3 = "INSERT INTO conversations VALUES ('', ?, ?)";
        $stmt3 = $conn->prepare($insert3);
        $stmt3->bind_param("ss", $myId, $helperId);
        $stmt3->execute();
        $stmt3->close();
    }

    $result->close();
    $stmt2->close();

    /**$helpernumber = $_POST["helpernumber"];
    $message = $_POST["message"];
    $message1 = "Dear Ma'am/Sir,\n\nWe hope this message finds you well. We're excited to inform you that a new prebooking request has been submitted for your service. Here are the details:\n\nPrebooking Details:\n\nCustomer's Full Name: " . $firstname . " " . $lastname . "\n\nPreferred Date: " . $date . "\n\nLocation: " . $location . ", Odiongan, Romblon\n\nAdditional Requests/Comments: " . $message;
    $new_message = $message1;

    $base_url = "https://pp1qje.api.infobip.com";
    $api_key = "bfa1384d84d96cb4a7ad2e28b15e074e-7e41bf3b-f314-46cb-b206-6f9f445c7827";

    $configuration = new Configuration(host: $base_url, apiKey: $api_key);
    $api = new SmsApi(config: $configuration);
    $destination = new SmsDestination(to: $helpernumber);

    $new_message = new SmsTextualMessage(
        destinations: [$destination],
        text: $new_message,
        from: "daveh"
    );

    $request = new SmsAdvancedTextualRequest(messages: [$new_message]);
    $response = $api->sendSmsMessage($request);*/
}
?>