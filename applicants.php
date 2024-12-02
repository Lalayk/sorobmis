<!DOCTYPE html>
<html lang="en">

<!-- HEADER ------------------------------------------------------------------------------------------------>

<?php
include_once "./include/header.php";
?>

<head>
    <style>
        #applicants a:before {
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
        <div class="table" style="width: 1078px; height: 442px; margin-top:7px; margin-left: 135px; border-radius: 15px; padding: 15px; background: white;">
            <table>
                <tr>
                    <th>Firstame</th>
                    <th>Lastame</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>

                <?php
                $result = $conn->query("SELECT * FROM applicants");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['profession']}</td>";
                    echo "<td>{$row['firstname']}</td>";
                    echo "<td>{$row['lastname']}</td>";
                    echo "<td>{$row['username']}</td>";
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
                var id3 = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url: 'accept_delete.php',
                    data: {
                        id3: id3
                    },
                    success: function(response) {
                        window.location = 'applicants.php';
                    },
                    error: function(error) {
                        Swal.fire('Error!', 'An error occurred.', 'error');
                    }
                });

            });
        });


        $(document).ready(function() {
            $('.decline').click(function() {
                var id2 = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to decline this applicant!',
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
                                id2: id2
                            },
                            success: function(response) {
                                Swal.fire('Declined!', response, 'success').then(function() {
                                    window.location = 'applicants.php';
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