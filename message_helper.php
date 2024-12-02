<!DOCTYPE html>
<html lang="en">

<!-- HEADER ------------------------------------------------------------------------------------------------>

<?php
include_once "./include/header.php";

include 'app/db.conn.php';
include 'app/helpers/user.php';
include 'app/helpers/conversations.php';
include 'app/helpers/timeAgo.php';
include 'app/helpers/last_chat.php';

$user = getUser($_SESSION['username'], $conn);

if ($user) {
    $conversations = getConversation($user['id'], $conn);
} else {
    echo "User not found.";
}
?>

<body>
    <div style="width: 1098px; height: auto; margin-top: -53px; margin-left: 135px;">
        <div style="width: 1098px; height: 455px; margin-top: 60px; border-radius: 15px; background-color: white; display: flex;">
            <div style="width: 460px; height: 455px; background-color: rgb(228, 243, 255); border-radius: 15px; overflow: auto;">
                <div style="width: 400px;">
                    <!-- <div>
                            <input type="text" placeholder="Search..." id="searchText" class="form-control">
                            <button class="btn btn-primary" id="serachBtn">
                                <i class="fa fa-search"></i>
                            </button>
                        </div> -->

                    <ul id="chatList">
                        <?php if (!empty($conversations)) { ?>
                            <?php

                            foreach ($conversations as $conversation) { ?>
                                <li style="list-style: none;">
                                    <a style="text-decoration: none;" href="javascript:void(0);" onclick="loadContent('<?= $conversation['username'] ?>')">

                                        <div style="padding-top: 20px; padding-bottom: 5px; display: flex;">
                                            <img style="width: 40px; height: 40px;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($conversation['image']); ?>">
                                            <h2 style="margin-top: 0px; margin-left: 20px; color: black; font-size: 17px;">
                                                <?= $conversation['firstname'] . " " . $conversation['lastname'] ?><br>
                                                <small style="color: black; font-size: 12px;">
                                                    <?php
                                                    echo lastChat($user['id'], $conversation['id'], $conn);
                                                    ?>
                                                </small>
                                            </h2>
                                        </div>
                                        <?php if (last_seen($conversation['last_seen']) == "Active") { ?>
                                            <div title="online">
                                                <div class="online"></div>
                                            </div>
                                        <?php } ?>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } else { ?>
                            <div>
                                <i style="margin-top: 20px;" class="fa fa-comments d-block fs-big"></i>
                                No messages yet
                            </div>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div id="resultDiv" style="width: 625px; height: 455px;">
            </div>

        </div>
    </div>

    <!-- SCRIPT -------------------------------------------------------------------------------------------->

    <script src="js/script.js"></script>

    <script>
        function loadContent(username) {
            $.get('chat.php?user=' + username, function(data) {
                $('#resultDiv').html(data);
            });
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {

            $("#searchText").on("input", function() {
                var searchText = $(this).val();
                if (searchText == "") return;
                $.post('app/ajax/search.php', {
                        key: searchText
                    },
                    function(data, status) {
                        $("#chatList").html(data);
                    });
            });

            $("#serachBtn").on("click", function() {
                var searchText = $("#searchText").val();
                if (searchText == "") return;
                $.post('app/ajax/search.php', {
                        key: searchText
                    },
                    function(data, status) {
                        $("#chatList").html(data);
                    });
            });

            let lastSeenUpdate = function() {
                $.get("app/ajax/update_last_seen.php");
            }
            lastSeenUpdate();
            setInterval(lastSeenUpdate, 10000);

        });
    </script>
</body>


</html>