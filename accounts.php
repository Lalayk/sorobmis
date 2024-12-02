<!DOCTYPE html>
<html lang="en">

<!-- HEADER ------------------------------------------------------------------------------------------------>

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

        #print {
            width: 100px;
            height: 25px;
            margin-top: 20px;
            margin-left: 435px;
            padding-top: 10px;
            padding-bottom: 5px;
            text-align: center;
            list-style: none;
            font-family: Arial, sans-serif;
            font-size: 17px;
            background: rgb(93, 8, 39);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            color: white;
            font-weight: 600;
        }

        #print:hover {
            background: rgb(170, 8, 39);
        }
    </style>
</head>

<!-- BODY -------------------------------------------------------------------------------------------------->

<body>
    <div>
        <form action="generate_pdf_accounts.php" method="post" id="myForm">
            <div class="searchmap" style="width: 265px; margin-top: 0px;">
                <div class="searchmap" style="width: 265px; margin-left: -210px;">
                    <label style="width: 300px; margin-top: 10px; color: white;">Filter by:</label>

                    <select class="select" name="selectOption1" id="selectOption1" onchange="loadLayout()" style="margin-left: 10px; background-position: 150px;">
                        <option value="all">All</option>
                        <option value="Indigency">Indigency</option>
                        <option value="Certificates">Certificates</option>
                        <option value="Healthcare Records">Healthcare Records</option>
                        <option value="Permits">Permits</option>
                        <option value="Register">Register</option>
                    </select>

                    <div class="icon-map" style="margin-left: 75px;">
                        <i class="fa-solid fa-sort"></i>
                    </div>
                </div>

                <div class="searchmap" style="width: 265px; margin-left: 30px;">
                    <label style="width: 300px; margin-top: 10px; color: white;">Sort by:</label>

                    <select class="select" name="selectOption" id="selectOption" onchange="loadLayout()" style="margin-left: 10px; background-position: 150px;">
                        <option value="table_type.php">Type</option>
                    </select>

                    <div class="icon-map" style="margin-left: 75px;">
                        <i class="fa-solid fa-sort"></i>
                    </div>
                </div>

                <div>
                    <li id="print" name="print"><a onclick="submitForm()">PDF</a></li>
                </div>
            </div>
        </form>

        <div id="printableTable">
            <div id="resultTable"></div>

            <div class="table" id="myTable" style="width: 1078px; min-height: 390px; height: auto; margin-top: 7px; margin-left: 135px; border-radius: 15px; padding: 15px; padding-right: 0px; background: white;">
                <div class="over" id="myDiv" style="width: auto; min-height: 390px; height: auto; background-color: white;">
                    <table>
                        <tr>
                            <th>Type</th>
                            <th>Papers Requested</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>

                        <?php
                        $result = $conn->query("SELECT * FROM accounts WHERE type = 'residents' OR type = 'residents' ORDER BY id");
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
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT ------------------------------------------------------------------------------------------------>

    <script>
        function loadLayout() {
            var comboBox = document.getElementById("selectOption");
            var selectedValue = comboBox.value;
            var comboBox1 = document.getElementById("selectOption1");
            var selectedValue1 = comboBox1.value;
            var myTable = document.getElementById("myTable");

            if (selectedValue === "id.php") {
                myTable.style.display = "none";
            } else {
                myTable.style.display = "none";
            }

            if (selectedValue !== "") {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        document.getElementById("resultTable").innerHTML = xhr.responseText;
                    }
                };

                xhr.open("GET", selectedValue + "?filter=" + selectedValue1, true);
                xhr.send();
            }
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

    <script>
        function printTable() {
            var printContents = document.getElementById('printableTable').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;

            setTimeout(function() {
                location.reload();
            }, 500);
        }
    </script>

    <script>
        function submitForm() {
            var selectBox = document.getElementById('selectOption');
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            var selectBox1 = document.getElementById('selectOption1');
            var selectedValue1 = selectBox1.options[selectBox1.selectedIndex].value;

            document.getElementById('myForm').submit();
        }
    </script>

</body>

</html>