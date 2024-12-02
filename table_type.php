<!DOCTYPE html>
<html lang="en">

<?php
require('connect.php');
?>

<!-- HEADER ------------------------------------------------------------------------------------------------>

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

        .accept,
        .decline {
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

        .accept {
            background-color: blue;
        }

        .decline {
            background-color: red;
        }
    </style>
</head>

<!-- BODY -------------------------------------------------------------------------------------------------->

<body>
    <div>
        <div class="table" id="myTable" style="width: 1078px; min-height: 390px; height: auto; margin-top: 7px; margin-left: 135px; border-radius: 15px; padding: 15px; padding-right: 0px; background: white;">
            <div class="over" id="myDiv" style="width: auto; min-height: 390px; height: auto; background-color: white;">
                <table>
                    <tr>
                        <th>Type</th>
                        <th>Skills</th>
                        <th>Firstame</th>
                        <th>Lastame</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>

                    <?php

                    if (isset($_GET['filter'])) {
                        $filter = $_GET['filter'];

                        if ($filter == 'all') {

                            $result = $conn->query("SELECT * FROM accounts WHERE type = 'helper' OR type = 'client' ORDER BY type");
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>{$row['type']}</td>";
                                echo "<td>{$row['profession']}</td>";
                                echo "<td>{$row['firstname']}</td>";
                                echo "<td>{$row['lastname']}</td>";
                                echo "<td>{$row['username']}</td>";
                                echo "<td><button id='delete' class='decline' type='submit' data-id={$row['id']}><a id='text'>Delete</a></button></td>";
                                echo "</tr>";
                            }
                        } elseif ($filter == 'carpentry') {

                            $result = $conn->query("SELECT * FROM accounts WHERE profession = 'Carpenter' ORDER BY type");
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>{$row['type']}</td>";
                                echo "<td>{$row['profession']}</td>";
                                echo "<td>{$row['firstname']}</td>";
                                echo "<td>{$row['lastname']}</td>";
                                echo "<td>{$row['username']}</td>";
                                echo "<td><button id='delete' class='decline' type='submit' data-id={$row['id']}><a id='text'>Delete</a></button></td>";
                                echo "</tr>";
                            }
                        } elseif ($filter == 'electrician') {
                            $result = $conn->query("SELECT * FROM accounts WHERE profession = 'Electrician' ORDER BY type");
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>{$row['type']}</td>";
                                echo "<td>{$row['profession']}</td>";
                                echo "<td>{$row['firstname']}</td>";
                                echo "<td>{$row['lastname']}</td>";
                                echo "<td>{$row['username']}</td>";
                                echo "<td><button id='delete' class='decline' type='submit' data-id={$row['id']}><a id='text'>Delete</a></button></td>";
                                echo "</tr>";
                            }
                        } elseif ($filter == 'beautician') {
                            $result = $conn->query("SELECT * FROM accounts WHERE profession = 'Beautician' ORDER BY type");
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>{$row['type']}</td>";
                                echo "<td>{$row['profession']}</td>";
                                echo "<td>{$row['firstname']}</td>";
                                echo "<td>{$row['lastname']}</td>";
                                echo "<td>{$row['username']}</td>";
                                echo "<td><button id='delete' class='decline' type='submit' data-id={$row['id']}><a id='text'>Delete</a></button></td>";
                                echo "</tr>";
                            }
                        } elseif ($filter == 'cleaners') {
                            $result = $conn->query("SELECT * FROM accounts WHERE profession = 'Cleaners' ORDER BY profession ");
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>{$row['type']}</td>";
                                echo "<td>{$row['profession']}</td>";
                                echo "<td>{$row['firstname']}</td>";
                                echo "<td>{$row['lastname']}</td>";
                                echo "<td>{$row['username']}</td>";
                                echo "<td><button id='delete' class='decline' type='submit' data-id={$row['id']}><a id='text'>Delete</a></button></td>";
                                echo "</tr>";
                            }
                        } elseif ($filter == 'client') {
                            $result = $conn->query("SELECT * FROM accounts WHERE profession = '-' ORDER BY type");
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>{$row['type']}</td>";
                                echo "<td>{$row['profession']}</td>";
                                echo "<td>{$row['firstname']}</td>";
                                echo "<td>{$row['lastname']}</td>";
                                echo "<td>{$row['username']}</td>";
                                echo "<td><button id='delete' class='decline' type='submit' data-id={$row['id']}><a id='text'>Delete</a></button></td>";
                                echo "</tr>";
                            }
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <!-- SCRIPT ------------------------------------------------------------------------------------------------>

    <script>
        function displaySelectedValue() {
            var selectedValue = document.getElementById("selectOption").value;

            var resultTable = "<table border='1'>";
            resultTable += "<tr><th>Selected Value</th></tr>";
            resultTable += "<tr><td>" + selectedValue + "</td></tr>";
            resultTable += "</table>";

            document.getElementById("resultTable").innerHTML = resultTable;
        }
    </script>

    <script>
        $(document).ready(function() {
            $('.decline').click(function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this data!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: 'accept_delete.php',
                            data: {
                                id: id
                            },
                            success: function(response) {
                                Swal.fire('Deleted!', response, 'success').then(function() {
                                    window.location = 'accounts.php';
                                })
                            },
                            error: function(error) {
                                Swal.fire('Error!', 'An error occurred.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>