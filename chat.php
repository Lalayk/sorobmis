<?php
session_start();

if (isset($_SESSION['username'])) {
	include 'app/db.conn.php';

	include 'app/helpers/user.php';
	include 'app/helpers/chat.php';
	include 'app/helpers/opened.php';
	include 'app/helpers/timeAgo.php';

	if (!isset($_GET['user'])) {
		header("Location: home.php");
		exit;
	}

	$user = getUser($_SESSION['username'], $conn);

	$chatWith = getUser($_GET['user'], $conn);

	if (empty($chatWith)) {
		header("Location: home.php");
		exit;
	}

	$chats = getChats($user['id'], $chatWith['id'], $conn);

	opened($chatWith['id'], $conn, $chats);
?>
	<!DOCTYPE html>
	<html lang="en">

	<body>
		<div>
			<div style="display: flex;">
				<img style="width: 40px; height: 40px; margin-top: 20px; margin-left: 20px;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($chatWith['image']); ?>">

				<h3 style="margin-top: 20px; margin-left: 20px; font-size: 17px;">
					<?= $chatWith['firstname'] . " " . $chatWith['lastname'] ?> <br>
					<div title="online">
						<?php
						if (last_seen($chatWith['last_seen']) == "Active") {
						?>
							<div class="online"></div>
							<small style="font-size: 10px;">Online</small>
						<?php } elseif (last_seen($chatWith['last_seen']) == "Offline") { ?>
							<small style="font-size: 10px;">Offline</small>
							<?php } else { ?>
							<small style="font-size: 10px;">Active:
								<?= last_seen($chatWith['last_seen']) ?>
							</small>
						<?php } ?>
					</div>
				</h3>
			</div>

			<div id="chatBox" style="width: 597px; height: 260px; padding: 20px; box-shadow: 0 8px 3px -6px lightgray, 0 -8px 3px -6px lightgray; overflow-y: auto; max-height: 100vh;">
				<?php
				if (!empty($chats)) {
					foreach ($chats as $chat) {
						if ($chat['from_id'] == $user['id']) {
				?>
							<p style="max-width: 300px; width:300px; margin-top: 2px; margin-bottom: 2px; float: right; padding: 10px; border: 1px solid lightgray; border-radius: 5px; background-color: rgb(228, 243, 255); word-wrap: break-word; overflow: hidden;">
								<?= $chat['message'] ?>
								<small style="display: block; margin-top: 10px; font-size: 10px; color: aqua; text-align: right;">
									<?= $chat['created_at']; ?>
								</small>
							</p>

						<?php } else { ?>
							<p style="max-width: 300px; width:300px; margin-top: 2px; margin-bottom: 2px; float: left; padding: 10px; border: 1px solid lightgray; border-radius: 5px; background-color: rgb(228, 243, 255); word-wrap: break-word; overflow: hidden;">
								<?= $chat['message'] ?>
								<small style="display: block; margin-top: 10px; font-size: 10px; color: gray; text-align: right;">
									<?= $chat['created_at']; ?>
								</small>
							</p>
					<?php }
					}
				} else { ?>
					<div class="alert">
						<i class="fa fa-comments d-block fs-big"></i>
						No messages yet, Start the conversation
					</div>
				<?php } ?>
			</div>

			<div class="input-group mb-3" style="width: 638px; display: flex; background-color: green;">
				<textarea cols="3" id="message" class="form-control" style="width: 582px; height: 50px; font-size: 17px; resize: none;"></textarea>
				<button style="width: 50px; height: 56px; margin-top: 0px; margin-left: 0px; background-color: rgb(13, 110, 253); border: none;" class="btn btn-primary" id="sendBtn">
					<i style="color: white;" class="fa fa-paper-plane"></i>
				</button>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<script>
			var scrollDown = function() {
				let chatBox = document.getElementById('chatBox');
				chatBox.scrollTop = chatBox.scrollHeight;
			}

			scrollDown();

			$(document).ready(function() {

				$("#sendBtn").on('click', function() {
					message = $("#message").val();
					$(".alert").hide();
					
					if (message == "") return;

					$.post("app/ajax/insert.php", {
							message: message,
							from_id: <?= $user['id'] ?>,
							to_id: <?= $chatWith['id'] ?>
						},
						function(data, status) {
							$("#message").val("");
							$("#chatBox").append(data);
							scrollDown();
						});
				});

				let lastSeenUpdate = function(id) {
					$.ajax({
						url: "app/ajax/update_last_seen.php?id=" + id,
						method: "GET",
						success: function(data) {
							console.log("Last seen updated successfully");
						},
						error: function(xhr, status, error) {
							console.error("AJAX request failed:", status, error);
						}
					});
				};

				let id = <?php echo $user['id']; ?>;

				lastSeenUpdate(id);
				setInterval(function() {
					lastSeenUpdate(id);
				}, 10000);

				let fechData = function() {
					$.post("app/ajax/getMessage.php", {
							id_2: <?= $chatWith['id'] ?>
						},
						function(data, status) {
							$("#chatBox").append(data);
							if (data != "") scrollDown();
						});
				}

				fechData();
				setInterval(fechData, 500);

			});
		</script>
	</body>

	</html>
<?php
} else {
	header("Location: index.php");
	exit;
}
?>