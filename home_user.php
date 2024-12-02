<!DOCTYPE html>
<html lang="en">

<!-- HEADER ------------------------------------------------------------------------------------------------>

<?php
include_once "./include/header.php";
?>

<head>
    <style>
        #home a:before {
            width: 100%;
        }
    </style>
</head>

<!-- BODY -------------------------------------------------------------------------------------------------->

<body>
    <div class="box-select" style="margin-top: 15px; margin-bottom: 20px;">
        <div class="searchbox">
            <select class="select" name="request" id="papers" required>
                <option value="none">request </option>
              
            <div class="icon-map">
                <i class="fas fa-map-marker-alt"></i>
            </div>
        </div>

        <div class="combobox">
        <div class="box-select" style="margin-top: 13px; margin-bottom: 20px;">
            <select class="select" name="profession" id="profession" onclick="closeMenu()" required>
                <option value="none"> Request here </option>
                <option value="indigency">Indigency</option>
                <option value="permits">Permits</option>
                <option value="healthcare records">Healthcare Records</option>
                <option value="certificates">Certificates</option>
            </select>

            <div class="icon-prof">
                <img src="img/profession.png" alt="logo">
            </div>
        </div>

        <button id="submit" name="submit" onclick="data()">Search</button>

        <div style="display: flex; margin-top: 15px;">
            <div style="width: 195px; height: 400px; margin-left: 120px; border: 1px solid gray; background: white;">
                <div id="container">
                    <iframe style="width: 1090px; height: 395px;" src="https://maps.google.com/maps?q=Soro-soro, Camiguin?>&output=embed"></iframe>
                </div>
            </div>
        </div>

        <div style="display: flex; margin-top: 5px; margin-left: -35px; padding: 20px; padding-top: 0px;">
            <div id="display"></div>
            <div id="result" class="result" style="width: 450px; margin-left: 135px;"></div>
            <div id="details" class="details" style="width: 617px; height: 375px; margin-top: 15px; margin-left: 30px; border-radius: 15px; background-image: url(img/display.png); display: none;"></div>
        </div>

        <!-- SCRIPT ------------------------------------------------------------------------------------------------>

        <script>
            $(document).ready(function() {
                $('#submit').on('click', function() {
                    var selectedValue1 = $('#address').val();
                    var selectedValue2 = $('#profession').val();
                    $.ajax({
                        type: "POST",
                        url: "fetch_data.php",
                        data: {
                            selectedValue1: selectedValue1,
                            selectedValue2: selectedValue2
                        },
                        success: function(response) {
                            $('#result').html(response);
                            $('#details').html("");
                        }
                    });
                });

                $(document).on('click', '.card', function() {
                    $('.card.green-border').removeClass('green-border');
                    $(this).addClass('green-border');
                    var cardId = $(this).data('id');
                    $.ajax({
                        type: "POST",
                        url: "fetch_details.php",
                        data: {
                            cardId: cardId
                        },
                        success: function(response) {
                            $('#details').html(response);
                        }
                    });
                });
            });

            $(document).ready(function() {
                $("#address").on("change", function() {
                    var selectedText = $("#address").find(":selected").text();

                    $.ajax({
                        type: "POST",
                        url: "mapview.php",
                        data: {
                            selectedText: selectedText
                        },
                        success: function(response) {
                            $("#container").html(response);
                        }
                    });
                });
            });
        </script>

        <script>
            window.addEventListener('scroll', function() {
                var content = document.querySelector('.details');
                var scrollPosition = window.scrollY;

                var maxScrollPosition = 610;

                if (scrollPosition >= maxScrollPosition) {
                    content.style.position = 'fixed';
                    content.style.top = '1px';
                    content.style.left = '585px';
                } else {
                    content.style.position = 'static';
                }
            });
        </script>

        <script>
            function data() {
                var show = document.getElementById("details");
                show.style.display = "block";

                setTimeout(function() {
                    var targetPosition = $('#result').offset().top; 
                    $('html, body').animate({
                        scrollTop: targetPosition
                    }, 1500); 
                }, 500);
            }
        </script>

</body>

</html>