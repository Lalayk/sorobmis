<!DOCTYPE html>
<html>

<?php
include_once "./include/header.php";
?>

<head>
    <style>
        #location a:before {
            width: 80%;
        }
    </style>
</head>

<!-- BODY -------------------------------------------------------------------------------------------------->

<body>
    <div>
        <div class="searchmap">
            <select class="select" name="selectOption" id="selectOption">
                <option value="none">Soro soro</option>
                <?php foreach ($brgys as $brgy) : ?>
                    <option value="<?= $brgy ?>"> <?= $brgy ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <div class="icon-map">
                <i class="fas fa-map-marker-alt"></i>
            </div>
        </div>
    </div>

    <div style="display: flex; margin-top: 15px;">
        <div style="width: 1090px; height: 415px; margin-left: 135px; border: 1px solid gray; background: white;">
            <div id="container">
                <iframe style="width: 1085px; height: 410px;" src="https://maps.google.com/maps?q=Soro-soro, Camiguin?>&output=embed"></iframe>
            </div>
        </div>
    </div>

    <!-- SCRIPT ------------------------------------------------------------------------------------------------>

    <script>
        $(document).ready(function() {
            $("#selectOption").on("change", function() {
                var selectedText = $("#selectOption").find(":selected").text();

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

</body>

</html>
