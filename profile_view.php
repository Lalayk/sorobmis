<!DOCTYPE html>
<html lang="en">

<!-- HEADER ------------------------------------------------------------------------------------------------>

<?php
include_once "./include/header.php";

$id = $_SESSION["id"];

$sql = "SELECT * FROM accounts WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Record not found.";
    exit();
}
?>

<head>
    <style>
        .book {
            width: 80px;
            margin-top: 30px;
            margin-bottom: 30px;
            list-style: none;
            padding: 15px;
            font-family: 'Arial';
            border: none;
            border-radius: 10px;
            cursor: pointer;
            color: white;
            user-select: none;
            font-weight: 600;
            background-color: rgb(254, 195, 7);
        }

        .book a {
            color: white;
            text-decoration: none;
        }

        .book:hover {
            background-color: rgb(170, 130, 0);
        }

        .book1 {
            width: 80px;
            margin-top: 30px;
            margin-bottom: 30px;
            list-style: none;
            padding: 15px;
            font-family: 'Arial';
            border: none;
            border-radius: 10px;
            cursor: pointer;
            color: white;
            user-select: none;
            font-weight: 600;
            background-color: rgb(93, 8, 39);
        }

        .book1 a {
            color: white;
            text-decoration: none;
        }

        .book1:hover {
            background-color: rgb(170, 8, 39);
        }

        .list li {
            list-style: none;
        }

        .rating {
            display: flex;
            flex-direction: row-reverse;
            margin-right: 50px;
        }

        .rating input {
            display: none;
        }

        .rating label {
            cursor: pointer;
            padding: 5px;
            font-size: 40px;
            color: #777;
        }

        .rating label:hover,
        .rating label:hover~label,
        .rating input:checked~label {
            color: #ffcc00;
        }

        .rating input:checked~label:hover,
        .rating label:hover~input:checked~label,
        .rating input:checked~label:hover~label {
            color: #ffcc00;
        }

        #overlayRating {
            font-size: 36px;
            color: #ffcc00;
        }

        .star-rating {
            font-size: 24px;
        }

        .star {
            color: #FFD700;
        }

        .empty {
            color: #CCCCCC;
        }

        .rating-bar {
            width: 200px;
            height: 10px;
            margin-top: 10px;
            border-radius: 10px;
            background-color: #ccc;
            position: relative;
            overflow: hidden;
        }

        .fill-bar {
            height: 100%;
            background-color: #ffd700;
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
</head>

<!-- BODY -------------------------------------------------------------------------------------------------->

<body>
    <div style="width: 101.2%; height: 481px; overflow: auto; float: left;">
        <div class="profile_user">
            <div class="form">
                <div class="wrapper">

                    <?php
                    if (isset($_GET['name'])) {
                        $id = $_GET['name'];
                    }

                    $result = $conn->query("SELECT * FROM accounts WHERE id = $id");
                    while ($row = $result->fetch_assoc()) {

                        $existingValues = explode(',', $row['expertise']);
                    ?>
                        <img id="selectedImage" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" />
                </div>

                <?php echo '<div class="wrapper1" id="wrapper1" data-id="' . $row['id'] . '">'; ?>


                <h1>
                    <?php
                        echo "" . $row['firstname'] . " " . $row['lastname'];
                    ?>
                </h1>

                <div class="info">
                    <img src="img/profession.png" alt="logo" style="margin-right: 17px;">
                    <p>
                        <?php
                        echo "" . $row['profession'];
                        ?>
                    </p>
                </div>

                <div style="display: flex; margin-top: -15px; margin-bottom: 25px;">
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

                <div class="info">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>
                        <?php echo "" . $row['address'] . ', Odiongan, Romblon'; ?>
                    </p>
                </div>

                <div class="info">
                    <i class="fas fa-phone" style="margin-right: 15px;"></i>
                    <p>+63</p>
                    <p>
                        <?php echo "" . $row['number']; ?>
                    </p>
                </div>

                <h3>Rate this Helper</h3>

                <div class="rating" id="user-rating" style="margin-right: 150px; flex-direction: row-reverse;">
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5" onclick="updateRating(5)">&#9733;</label>
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4" onclick="updateRating(4)">&#9733;</label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3" onclick="updateRating(3)">&#9733;</label>
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2" onclick="updateRating(2)">&#9733;</label>
                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1" onclick="updateRating(1)">&#9733;</label>
                </div>

                <li class="book" style="width: 110px; margin-top: 10px; margin-bottom: 50px; text-align: center;" onclick="showRatingDialog()"><a href="#">Write a review</a></li>

                <?php
                        $sql = "SELECT
                        ratings.rating,
                        ratings.firstname,
                        ratings.lastname,
                        ratings.review,
                        ratings.date,
                        accounts.image
                    FROM
                        ratings
                    INNER JOIN
                        accounts ON ratings.myid = accounts.id
                    WHERE
                        ratings.helperid = $id
                    GROUP BY
                        ratings.rating,
                        ratings.firstname,
                        ratings.lastname,
                        ratings.review,
                        ratings.date,
                        accounts.image;";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $rowCount = $result->num_rows;
                            echo '<h3>Ratings and Reviews (' . $rowCount . ')</h3>';

                            echo '<div style="display: flex;">';

                            $sql5 = "SELECT COUNT(*) as alldata, SUM(rating) as sum FROM ratings WHERE helperid = $id";
                            $result5 = $conn->query($sql5);

                            if ($result5->num_rows > 0) {
                                while ($row5 = $result5->fetch_assoc()) {
                                    $data = $row5["alldata"];

                                    if ($data == 0) {
                                        echo 0;
                                    } else {
                                        $sum = $row5["sum"] / $row5["alldata"];
                                        $roundedNumber = number_format($sum, 1);

                                        echo '<div>';
                                        echo '<h1 style="font-size: 50px;">' . $roundedNumber . '</h1>';
                                        echo '</div>';
                                    }
                                }
                            }

                            echo '<div style = "margin-left: 40px;">';

                            $result5 = $conn->query("SELECT COUNT(*) as count_5 FROM ratings WHERE helperid = $id AND rating = 5");
                            while ($row5 = $result5->fetch_assoc()) {
                                $count_5 = $row5["count_5"];
                                $fillPercentage5 = ($count_5 / $rowCount) * 100;

                                echo '<div style="display: flex;">';
                                echo '<div style="margin-top: 6px; margin-right: 10px; font-size: 14px;">5</div>';
                                echo '<div class="rating-bar">';
                                echo '<div style="width:  ' . $fillPercentage5 . '%;" class="fill-bar"></div>';
                                echo '</div>';
                                echo '</div>';
                            }

                            $result4 = $conn->query("SELECT COUNT(*) as count_4 FROM ratings WHERE helperid = $id AND rating = 4");
                            while ($row4 = $result4->fetch_assoc()) {
                                $count_4 = $row4["count_4"];
                                $fillPercentage4 = ($count_4 / $rowCount) * 100;

                                echo '<div style="display: flex;">';
                                echo '<div style="margin-top: 6px; margin-right: 10px; font-size: 14px;">4</div>';
                                echo '<div class="rating-bar">';
                                echo '<div style="width:  ' . $fillPercentage4 . '%;" class="fill-bar"></div>';
                                echo '</div>';
                                echo '</div>';
                            }

                            $result3 = $conn->query("SELECT COUNT(*) as count_3 FROM ratings WHERE helperid = $id AND rating = 3");
                            while ($row3 = $result3->fetch_assoc()) {
                                $count_3 = $row3["count_3"];
                                $fillPercentage3 = ($count_3 / $rowCount) * 100;

                                echo '<div style="display: flex;">';
                                echo '<div style="margin-top: 6px; margin-right: 10px; font-size: 14px;">3</div>';
                                echo '<div class="rating-bar">';
                                echo '<div style="width:  ' . $fillPercentage3 . '%;" class="fill-bar"></div>';
                                echo '</div>';
                                echo '</div>';
                            }

                            $result2 = $conn->query("SELECT COUNT(*) as count_2 FROM ratings WHERE helperid = $id AND rating = 2");
                            while ($row2 = $result2->fetch_assoc()) {
                                $count_2 = $row2["count_2"];
                                $fillPercentage2 = ($count_2 / $rowCount) * 100;

                                echo '<div style="display: flex;">';
                                echo '<div style="margin-top: 6px; margin-right: 10px; font-size: 14px;">2</div>';
                                echo '<div class="rating-bar">';
                                echo '<div style="width:  ' . $fillPercentage2 . '%;" class="fill-bar"></div>';
                                echo '</div>';
                                echo '</div>';
                            }

                            $result1 = $conn->query("SELECT COUNT(*) as count_1 FROM ratings WHERE helperid = $id AND rating = 1");
                            while ($row1 = $result1->fetch_assoc()) {
                                $count_1 = $row1["count_1"];
                                $fillPercentage1 = ($count_1 / $rowCount) * 100;

                                echo '<div style="display: flex;">';
                                echo '<div style="margin-top: 6px; margin-right: 10px; font-size: 14px;">1</div>';
                                echo '<div class="rating-bar">';
                                echo '<div style="width:  ' . $fillPercentage1 . '%;" class="fill-bar"></div>';
                                echo '</div>';
                                echo '</div>';
                            }

                            echo '</div>';
                            echo '</div>';

                            while ($row = $result->fetch_assoc()) {
                                $rating = $row["rating"];
                                $firstname = $row["firstname"];
                                $lastname = $row["lastname"];
                                $review = $row["review"];
                                $date = $row["date"];
                                $image = $row["image"];

                                echo '<div style="margin-top: 30px; margin-bottom: 30px;">';
                                echo '<div style="display: flex;">';
                                echo '<img src="data:image/jpeg;base64,' . base64_encode($image) . '" style="width: 40px; height: 40px; margin-bottom: 10px; border-radius: 50%;">';
                                echo '<div class="name" style="margin-top: 10px; margin-left: 20px;">' . $firstname . ' ' . $lastname . '</div>';
                                echo '</div>';
                                echo '<div class="review" style="display: flex;">';
                                echo '<div class="star-rating">';
                                for ($i = 1; $i <= 5; $i++) {
                                    $class = ($i <= $rating) ? 'filled' : 'empty';
                                    echo '<span class="star ' . $class . '">&#9733;</span>';
                                }

                                echo '</div>';
                                echo '<div class="date" style="margin-top: 9px; margin-left: 10px; font-size: 14px;">' . $date . '</div>';
                                echo '</div>';
                                echo '<div>' . $review . '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo '<h3>Ratings and Reviews (0)</h3>';
                            echo "No rating yet";
                        }
                ?>
            </div>
            <div id="display"></div>
        </div>
    </div>
<?php } ?>

<!-- BOOKING ------------------------------------------------------------------------------------------->

<div class="display" id="display"></div>

<div id="bookingModal" class="bookingoverlay">

    <div class="bookingdisplay"></div>

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
                </div>
            </div>
        </div>
    </div>
</div>

<!-- RATE AND REVIEW --------------------------------------------------------------------------------------->

<div class="display" id="display"></div>

<div id="ratingModal" class="ratingoverlay">

    <div class="ratingdisplay"></div>

    <div class="ratingmodal">
        <div style="width: 100%; overflow: auto;">
            <div class="wrapper" style="width: auto;">
                <div class="group2">
                    <h2 style="width: auto; text-align:center;">Rate and Review</h2>

                    <div class="form-group" style=" margin-top: 37px; display: flex;">
                        <div>
                            <?php
                            $id = $_SESSION['id'];

                            $result = $conn->query("SELECT * FROM accounts WHERE id = $id");
                            while ($row = $result->fetch_assoc()) {

                            ?>
                                <img id="selectedImage" style="width: 100px; height: 100px; border-radius: 50%;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" />
                        </div>

                        <div style="margin-left: 20px; margin-top: 25px;">
                            <h2 style="font-size: 17px;">
                                <?php echo "" . $row['firstname'] . " " . $row['lastname']; ?>
                            </h2>
                        </div>
                    </div>

                    <div style="display: flex;">
                        <div id="overlayRating" style="width: 150px;"></div>
                        <div id="comment" style="margin-top: 17px; margin-left: 10px;"></div>
                    </div>

                    <div class="form-group" style="display: flexbox; margin-top: 30px;">
                        <div>
                            <textarea class="review" name="review" id="review" rows="4" cols="40" placeholder="Describe your experence (optional)"></textarea>
                        </div>
                    </div>

                    <li id="submit2" name="submit2"><a>Post</a></li>
                    <li id="cancel" onclick="cancelRating()"><a>Cancel</a></li>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<!-- SCRIPT ------------------------------------------------------------------------------------------------>

<script src="js/script.js"></script>

<script>
    function updateRating(rating) {
        const filledStars = '&#9733;'.repeat(rating);
        const unfilledStars = '&#9734;'.repeat(5 - rating);
        const stars = filledStars + unfilledStars;
        document.getElementById('overlayRating').innerHTML = stars;

        if (rating === 5) {
            document.getElementById('comment').innerHTML = 'Outstanding';
        } else if (rating === 4) {
            document.getElementById('comment').innerHTML = 'Very Good';
        } else if (rating === 3) {
            document.getElementById('comment').innerHTML = 'Good';
        } else if (rating === 2) {
            document.getElementById('comment').innerHTML = 'Fair';
        } else if (rating === 1) {
            document.getElementById('comment').innerHTML = 'Needs Improvement';
        }
    }
</script>

<script>
    document.getElementById("submit2").addEventListener("click", function() {
        var input2 = document.getElementById("overlayRating").value;
        var input3 = document.getElementById("review").value;

        var helperId = document.getElementById('wrapper1').getAttribute('data-id');
        var overlayRatingElement = document.getElementById('overlayRating');
        var innerHTMLValue = overlayRatingElement.innerHTML;
        var rating = innerHTMLValue.length;
        var review = $('#review').val();

        var cancelRating = document.getElementById("ratingModal");

        $.ajax({
            type: "POST",
            url: "rating_insert.php",
            data: {
                helperId: helperId,
                rating: rating,
                review: review
            },

            success: function(response) {
                $('#display').html(response);
            }
        });

        cancelRating.style.display = "none";
    });
</script>

<script>
    document.getElementById("submit1").addEventListener("click", function() {
        var input1 = document.getElementById("firstname").value;
        var input2 = document.getElementById("lastname").value;
        var input3 = document.getElementById("number").value;
        var input4 = document.getElementById("location").value;
        var input5 = document.getElementById("date").value;
        var input6 = document.getElementById("message").value;

        var helperId = document.getElementById('wrapper1').getAttribute('data-id');
        var helpernumber = $('#helpernumber').val();
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var number = $('#number').val();
        var location = $('#location').val();
        var date = $('#date').val();
        var payment = $('#payment').val();
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

<script>
    document.getElementById("submit2").addEventListener("click", function() {
        var input2 = document.getElementById("review").value;

        var helperId = document.getElementById('wrapper1').getAttribute('data-id');
        var message = $('#review').val();

        if (input1 === "" || input2 === "") {
            window.alert("Please fill in all input fields.");

        } else {

            $.ajax({
                type: "POST",
                url: "booking.php",
                data: {},

                success: function(response) {
                    $('#display').html(response);
                }
            });

            var input4 = document.getElementById("message");
            input4.value = "";
            cancelBooking.style.display = "none";
        }

    });
</script>

</body>

</html>