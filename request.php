<!DOCTYPE html>
<html lang="en">

<!-- HEADER ------------------------------------------------------------------------------------------------>

<?php
include_once "./include/header.php";
?>

<head>
    <style>
        #requests a:before {
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
        <div class="table" style="width: 1078px; height: 442px; margin-top:7px; margin-left: 135px; border-radius: 15px; padding: 10px; background: white;">
            <table>
                <tr>
                    <th>Firstame</th>
                    <th>Lastname</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>

                <?php
                $id = $_SESSION['id']; 
                $result = $conn->query("SELECT * FROM booking WHERE helperid = $id");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['firstname']}</td>";
                    echo "<td>{$row['lastname']}</td>";
                    echo "<td>{$row['address']}, Odiongan, Romblon</td>";
                    echo "<td>{$row['date']}</td>";
                    echo "<td><button id='accept' class='accept' type='submit' data-id={$row['id']}><a id='text'>Accept</a></button>
                        <button id='delete' class='decline' type='submit' data-id={$row['id']}><a id='text'>Decline</a></button></td>";
                    echo "<input type='hidden' name='table_id' value='{$row['id']}'>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <!-- SCRIPT ------------------------------------------------------------------------------------------------>

    <script>
        $(document).ready(function() {
            $('.accept').click(function() {
                var accept = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url: 'accept_delete.php',
                    data: {
                        accept: accept
                    },
                    success: function(response) {
                        window.location = 'request.php';
                    },
                    error: function(error) {
                        Swal.fire('Error!', 'An error occurred.', 'error');
                    }
                });

            });
        });


        $(document).ready(function() {
            $('.decline').click(function() {
                var decline = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to decline this request!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, decline it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: 'accept_delete.php',
                            data: {
                                decline: decline
                            },
                            success: function(response) {
                                Swal.fire('Declined!', response, 'success').then(function() {
                                    window.location = 'request.php';
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