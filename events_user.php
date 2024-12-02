<!DOCTYPE html>
<html lang="en">

<?php
include_once "./include/header.php";
?>

<head>
    <style>
        #accounts a:before {
            width: 100%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border-bottom: 1px solid #dddddd;
            text-align: center;
            padding: 15px;
        }

        .view {
            width: 80px;
            height: 40px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #text {

            font-size: 14px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        .view {
            background-color: blue;
        }
    </style>
</head>

<!-- BODY -------------------------------------------------------------------------------------------------->

<body>
    <div>
        <div class="table" style="width: 1078px; height: 442px; margin-top:7px; margin-left: 135px; border-radius: 15px; padding: 15px; background: white;">
            <div style="width: auto; height: 442px; background-color: white; overflow: auto;">
                <table>
                    <tr>
                        <th>Firstame</th>
                        <th>Lastame</th>
                        <th>Number</th>
                        <th>Date and Time</th>
                    </tr>

                    <?php
                    $selectedDate = $_GET['selectedDate'];
                    $id = $_SESSION["id"];

                    $result = $conn->query("SELECT accounts.firstname, accounts.lastname, accounts.number, schedule.helperid, schedule.datetime FROM schedule INNER JOIN accounts on schedule.helperid = accounts.id WHERE schedule.myid= $id AND schedule.date = '$selectedDate'");

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['firstname']}</td>";
                            echo "<td>{$row['lastname']}</td>";
                            echo "<td>{$row['number']}</td>";
                            echo "<td>{$row['datetime']}</td>";
                            echo "<input type='hidden' name='table_id' value='{$row['helperid']}'>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo "<td>No events.</td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "</tr>";
                    }

                    ?>
                </table>
            </div>
        </div>
    </div>

    <!-- SCRIPT ------------------------------------------------------------------------------------------------>
   
    <script>
        $(document).ready(function() {
            $('.view').click(function() {
                var myid = document.getElementById('view').getAttribute('data-id');

                $.ajax({
                    type: 'POST',
                    url: 'profile_view_user.php',
                    data: {
                        myid: myid
                    },
                    success: function(response) {
                        window.location.href = 'profile_view_user.php?myid=' + myid;
                    },
                    error: function(error) {
                        Swal.fire('Error!', 'An error occurred.', 'error');
                    }
                });

            });
        });
    </script>

</body>

</html>