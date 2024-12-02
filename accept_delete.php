<?php
require('connect.php');
date_default_timezone_set('Asia/Manila');

use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

require __DIR__ . "/vendor/autoload.php";

// DELETE ACCOUNT

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM accounts WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
}

// DELETE APPLICANTS

if (isset($_POST['id2'])) {
    $id = $_POST['id2'];

    $stmt = $conn->prepare("DELETE FROM applicants WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Applicant declined successfully";
    } else {
        echo "Error declining applicant: " . $stmt->error;
    }

    $stmt->close();
}

// ACCEPT APPLICANTS

if (isset($_POST['id3'])) {
    $idTable = $_POST['id3'];

    $sql = "SELECT * FROM applicants WHERE id = $idTable";

    $result = $conn->query($sql);
    $last_seen = '';

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $insert = "INSERT INTO accounts (type, profession, firstname, lastname, username, password, number, address, image, last_seen) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($insert);
            $stmt->bind_param("sssssssssb", $row['type'], $row['profession'], $row['firstname'], $row['lastname'], $row['username'], $row['password'], $row['number'], $row['address'], $row['image'], $last_seen);
            $stmt->send_long_data(8, $row['image']);

            $stmt->execute();
            $stmt->close();

            $delete = "DELETE FROM applicants WHERE id = " . $row['id'];
            $conn->query($delete);
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// ACCEPT REQUESTS

if (isset($_POST['accept'])) {
    $id = $_POST['accept'];

    $sql = "SELECT * FROM booking WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $helperid = $row['helperid'];
            $myid = $row['myid'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $number = $row['number'];
            $address = $row['address'];
            $date = $row["date"];
            $datetime = date("Y-m-d h:i:sa", strtotime($row["date"]));
            $time = date("Y-m-d h:i:sa");
            $message = $row['message'];

            $insert = "INSERT INTO schedule (helperid, myid, firstname, lastname, number, address, date, datetime, time, message) VALUES ('$helperid', '$myid', '$firstname', '$lastname', '$number', '$address', '$date', '$datetime', '$time', '$message')";
            $stmt = $conn->prepare($insert);
            $stmt->execute();
            $stmt->close();

            $helpernumber = "+63" . $number;

            $insert1 = "INSERT INTO messages VALUES ('', '$helperId', '$firstname', '$lastname', '$time', '$message', 'UNREAD')";
            $stmt1 = $conn->prepare($insert1);
            $stmt1->execute();
            $stmt1->close();

            $message1 = "Dear Mr./Ms. " . $firstname . " " . $lastname . ", Thank you for your booking. We're pleased to confirm your reservation for one person on " . $date . ". Looking forward to serving you! If you have any questions, feel free to call us.";

            $base_url = "https://pp1qje.api.infobip.com";
            $api_key = "bfa1384d84d96cb4a7ad2e28b15e074e-7e41bf3b-f314-46cb-b206-6f9f445c7827";

            $configuration = new Configuration(host: $base_url, apiKey: $api_key);
            $api = new SmsApi(config: $configuration);
            $destination = new SmsDestination(to: $helpernumber);

            $new_message = new SmsTextualMessage(
                destinations: [$destination],
                text: $message1,
                from: "daveh"
            );

            $request = new SmsAdvancedTextualRequest(messages: [$new_message]);
            $response = $api->sendSmsMessage($request);

            $delete = "DELETE FROM booking WHERE id = " . $row['id'];
            $conn->query($delete);
        }

        $result->close();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// DELETE REQUESTS

if (isset($_POST['decline'])) {
    $id = $_POST['decline'];

    $stmt = $conn->prepare("DELETE FROM booking WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Request declined successfully";
    } else {
        echo "Error declining applicant: " . $stmt->error;
    }

    $stmt->close();
}
