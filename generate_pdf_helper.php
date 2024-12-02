<?php
require('connect.php');
session_start();

require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf;

$id = $_SESSION['id'];

$sql = "SELECT schedule.firstname, schedule.lastname, schedule.address, schedule.date, schedule.message 
        FROM accounts 
        INNER JOIN schedule ON accounts.id = schedule.helperid 
        WHERE schedule.helperid = '$id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $html = '';

    while ($row = $result->fetch_assoc()) {
        $html .= '<p>You have an appointment with ' . $row["firstname"] . " " . $row["lastname"] . '.<br></p>
        Date: ' . $row["date"] . '<br>
        Address: ' . $row["address"] . ', Odiongan, Romblon
        <p>Message: ' . $row["message"] . '<br></p>
        <hr>';
    }

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("Transactions.pdf");
} else {
    echo "No appointments found.";
}
