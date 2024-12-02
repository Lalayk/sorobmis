<?php
ob_start();

include_once "./include/header.php";

$output = ob_get_clean();
?>

<?php
require('connect.php');

$brgys = ["Amatong", "Anahao", "Bangon", "Batiano", "Budiong", "Canduyong", "Dapawan", "Gabawan", "Libertad", "Ligaya", "Liwanag", "Liwayway", "Malilico", "Mayha", "Panique", "Pato-o", "Poctoy", "Progreso este", "Progreso weste", "Rizal", "Tabing dagat", "Tabobo-an", "Tuburan", "Tulay", "Tumingad"];

if (isset($_POST['cardId'])) {
    $cardId = $_POST['cardId'];

    $sql = "SELECT * FROM accounts WHERE id = $cardId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $existingValues = explode(',', $row['expertise']);
?>

        <head>
            <style>
                #selectedImage {
                    width: 100px;
                    height: 100px;
                    margin-bottom: 10px;
                }

                .detail {
                    width: 557px;
                    padding-top: 30px;
                    padding-left: 30px;
                    padding-right: 30px;
                    padding-bottom: 30px;
                    border-radius: 15px;
                    background-color: white;
                    display: flexbox;
                }

                #fullname {
                    font-family: Arial, sans-serif;
                    font-size: 23px;
                    font-weight: bold;
                    margin-top: 10px;
                    margin-bottom: 10px;
                    color: black;
                    text-decoration: none;
                }

                #fullname:hover {
                    text-decoration: underline;
                }

                .book {
                    margin-top: 10px;
                    padding: 10px 0px;
                    color: white;
                    border: none;
                    list-style: none;
                    font-size: 15px;
                    border-radius: 5px;
                    background-color: rgb(93, 8, 39);
                }

                .book a {
                    padding: 10px 230px;
                    color: white;
                    text-decoration: none;
                }

                .book:hover {
                    background-color: rgb(170, 8, 39);
                }

                .list li {
                    list-style: none;
                }
            </style>
        </head>

        <body>
            <div id="detail" class="detail" data-id="<?php echo $row["id"]; ?>">

                <img id="selectedImage" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" />

                <a href="profile_view.php?name=<?php echo "" . $row["id"] ?>" target="_blank" id="fullname">
                    <?php
                    echo "<br>" . $row["firstname"] . " " . $row["lastname"]
                    ?>
                </a>

                <?php echo "<br>" . $row["profession"] ?>

                <div style="display: flex; margin-top: 20px; margin-bottom: 20px;">
                    <div>
                        <i class="fas fa-cogs" style="margin-right: 13px; color: rgb(93, 8, 39);"></i>
                    </div>

                    <div class="list">
                        <li><?php if (in_array('Hair', $existingValues)) echo 'Hair Cutting and Styling'; ?></li>
                        <li><?php if (in_array('Nail', $existingValues)) echo 'Manicures, Pedicures and Nail Art'; ?></li>
                        <li><?php if (in_array('Treatments', $existingValues)) echo 'Facial, Waxes and Treatments'; ?></li>

                        <li><?php if (in_array('Masonry', $existingValues)) echo 'Masonry'; ?></li>
                        <li><?php if (in_array('Finish', $existingValues)) echo 'Finish Carpentry'; ?></li>
                        <li><?php if (in_array('Residential', $existingValues)) echo 'Residential Carpentry'; ?></li>
                        <li><?php if (in_array('Green', $existingValues)) echo 'Green Carpentry'; ?></li>
                        <li><?php if (in_array('Rough', $existingValues)) echo 'Rough Carpentry'; ?></li>

                        <li><?php if (in_array('Housekeeper', $existingValues)) echo 'Housekeeper'; ?></li>
                        <li><?php if (in_array('Laundry', $existingValues)) echo 'Laundry Man and Women'; ?></li>

                        <li><?php if (in_array('Electrician', $existingValues)) echo 'Automative Electrician'; ?></li>
                        <li><?php if (in_array('Technician', $existingValues)) echo 'Electrical Technician'; ?></li>
                        <li><?php if (in_array('Line', $existingValues)) echo 'Line Person'; ?></li>
                        <li><?php if (in_array('Foreman', $existingValues)) echo 'Electrical Foreman'; ?></li>
                        <li><?php if (in_array('Highway', $existingValues)) echo 'Highway Systems Electrician'; ?></li>
                    </div>
                </div>

                <div style="display: flex; margin-bottom: 10px;">

                    <i class="fas fa-map-marker-alt" style="color: rgb(93, 8, 39); margin-left: 2px; margin-right: 10px;"></i>
                    <?php echo " " . $row["address"] . ", Odiongan, Romblon" ?>

                </div>

                <div style="display: flex; margin-bottom: 10px;">
                    <i class="fas fa-phone" style="color: rgb(93, 8, 39); margin-right: 10px;"></i>
                    <?php echo "+63" . $row["number"]; ?>
                </div>

                <br>

                <li class="book" onclick="showBookingDialog()"><a href="#">Book Now</a></li>
            </div>

            <!-- BOOKING ------------------------------------------------------------------------------------------->

            <div class="display" id="display"></div>

            <div id="bookingModal" class="bookingoverlay">

                <div class="bookingdisplay">
                </div>

                <div class="bookingmodal">
                    <div style="width: 100%; overflow: auto;">
                        <div class="wrapper" style="width: auto;">
                            <div class="group2">
                                <h2 style="width: auto; text-align:center;">Book an Appoinment</h2>

                                <div class="form-group" style=" margin-top: 30px;">
                                    <div>
                                        <label>Firstname</label>
                                        <input class="firstname" type="text" name="firstname" id="firstname" autocomplete="off" value="<?php echo "" . $_SESSION['firstname']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <label>Lastname</label>
                                        <input class="lastname" type="text" name="lastname" id="lastname" autocomplete="off" value="<?php echo "" . $_SESSION['lastname']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <label>Phone number</label>
                                        <i>+63</i>
                                        <input style="display: none;" type="text" id="helpernumber" class="helpernumber" name="helpernumber" value=" <?php echo "+63" . $row["number"]; ?>">
                                        <input class="number" type="text" name="number" id="number" autocomplete="off" value="<?php echo "" . $_SESSION['number']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <label>Home location</label>
                                        <select class="location" type="text" name="location" id="location">
                                            <option value="">- Location -</option>
                                            <?php foreach ($brgys as $brgy) : ?>
                                                <option value="<?= $brgy ?>"> <?= $brgy ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <label for="selectedDate">Date</label>
                                        <input class="date" type="datetime-local" id="date">
                                    </div>
                                </div>

                                <div class="form-group" style="display: flexbox;">
                                    <div>
                                        <label>Message</label>
                                        <br>
                                        <textarea class="message" name="message" id="message" rows="4" cols="40" placeholder="Type your message here . . ."></textarea>
                                    </div>
                                </div>

                                <li id="submit1" name="submit1"><a>Submit</a></li>
                                <li id="cancel" onclick="cancelBooking()"><a>Cancel</a></li>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SCRIPT --------------------------------------------------------------------------------------------->

                <script src="js/script.js"></script>

                <script>
                    document.getElementById("submit1").addEventListener("click", function() {
                        var input1 = document.getElementById("firstname").value;
                        var input2 = document.getElementById("lastname").value;
                        var input3 = document.getElementById("number").value;
                        var input4 = document.getElementById("location").value;
                        var input5 = document.getElementById("date").value;
                        var input6 = document.getElementById("message").value;

                        var helperId = document.getElementById('detail').getAttribute('data-id');
                        var helpernumber = $('#helpernumber').val();
                        var firstname = $('#firstname').val();
                        var lastname = $('#lastname').val();
                        var number = $('#number').val();
                        var location = $('#location').val();
                        var date = $('#date').val();
                        var message = $('#message').val();

                        var cancelBooking = document.getElementById("bookingModal");

                        if (input1 === "" || input2 === "" || input3 === "" || input4 === "" || input5 === "" || input6 === "") {
                            window.alert("Please fill in all input fields.");

                        } else {

                            $.ajax({
                                type: "POST",
                                url: "booking.php",
                                data: {
                                    helperId: helperId,
                                    helpernumber: helpernumber,
                                    firstname: firstname,
                                    lastname: lastname,
                                    number: number,
                                    location: location,
                                    date: date,
                                    message: message
                                },

                                success: function(response) {
                                    $('#display').html(response);
                                }
                            });

                            var input14 = document.getElementById("location");
                            var input15 = document.getElementById("date");
                            var input16 = document.getElementById("message");

                            input14.selectedIndex = 0;
                            input15.value = "";
                            input16.value = "";

                            cancelBooking.style.display = "none";
                        }
                    });
                </script>

        <?php

    } else {
        echo "No details found for Card $cardId.";
    }
}
        ?>

        </body>