<?php
require('connect.php');
session_start();

require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf;

$category = $_POST['selectOption'];
$profession = $_POST['selectOption1'];

if ($profession == 'all' && $category == 'table_profession.php') {
    $sql = "SELECT * FROM accounts WHERE type = 'helper' OR type = 'client' ORDER BY profession";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'client' && $category == 'table_profession.php') {
    $sql = "SELECT * FROM accounts WHERE profession = '-' ORDER BY profession";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'carpentry' && $category == 'table_profession.php') {
    $sql = "SELECT * FROM accounts WHERE profession = 'Carpenter' ORDER BY profession";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'electrician' && $category == 'table_profession.php') {
    $sql = "SELECT * FROM accounts WHERE profession = 'Electrician' ORDER BY profession";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'beautician' && $category == 'table_profession.php') {
    $sql = "SELECT * FROM accounts WHERE profession = 'Beautician' ORDER BY profession";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'cleaners' && $category == 'table_profession.php') {
    $sql = "SELECT * FROM accounts WHERE profession = 'Cleaners' ORDER BY profession";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'all' && $category == 'table_type.php') {
    $sql = "SELECT * FROM accounts WHERE type = 'helper' OR type = 'client' ORDER BY type";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'client' && $category == 'table_type.php') {
    $sql = "SELECT * FROM accounts WHERE profession = '-' ORDER BY type";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'carpentry' && $category == 'table_type.php') {
    $sql = "SELECT * FROM accounts WHERE profession = 'Carpenter' ORDER BY type";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'electrician' && $category == 'table_type.php') {
    $sql = "SELECT * FROM accounts WHERE profession = 'Electrician' ORDER BY type";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'beautician' && $category == 'table_type.php') {
    $sql = "SELECT * FROM accounts WHERE profession = 'Beautician' ORDER BY type";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'cleaners' && $category == 'table_type.php') {
    $sql = "SELECT * FROM accounts WHERE profession = 'Cleaners' ORDER BY type";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'all' && $category == 'table_firstname.php') {
    $sql = "SELECT * FROM accounts WHERE type = 'helper' OR type = 'client' ORDER BY firstname";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'client' && $category == 'table_firstname.php') {
    $sql = "SELECT * FROM accounts WHERE profession = '-' ORDER BY firstname";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'carpentry' && $category == 'table_firstname.php') {
    $sql = "SELECT * FROM accounts WHERE profession = 'Carpenter' ORDER BY firstname";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'electrician' && $category == 'table_firstname.php') {
    $sql = "SELECT * FROM accounts WHERE profession = 'Electrician' ORDER BY firstname";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'beautician' && $category == 'table_firstname.php') {
    $sql = "SELECT * FROM accounts WHERE profession = 'Beautician' ORDER BY firstname";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'cleaners' && $category == 'table_firstname.php') {
    $sql = "SELECT * FROM accounts WHERE profession = 'Cleaners' ORDER BY firstname";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'all' && $category == 'table_username.php') {
    $sql = "SELECT * FROM accounts WHERE type = 'helper' OR type = 'client' ORDER BY username";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'client' && $category == 'table_username.php') {
    $sql = "SELECT * FROM accounts WHERE profession = '-' ORDER BY username";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'carpentry' && $category == 'table_username.php') {
    $sql = "SELECT * FROM accounts WHERE profession = 'Carpenter' ORDER BY username";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'electrician' && $category == 'table_username.php') {
    $sql = "SELECT * FROM accounts WHERE profession = 'Electrician' ORDER BY username";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'beautician' && $category == 'table_username.php') {
    $sql = "SELECT * FROM accounts WHERE profession = 'Beautician' ORDER BY username";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
} elseif ($profession == 'cleaners' && $category == 'table_username.php') {
    $sql = "SELECT * FROM accounts WHERE profession = 'Cleaners' ORDER BY username";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $html = '<table border="1">
                <tr>
                    <th>Type</th>
                    <th>Skills</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            $html .= '<tr>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['profession'] . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['username'] . '</td>
                </tr>';
        }

        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Accounts.pdf");
    }
}
