<!-- HEADER ------------------------------------------------------------------------------------------------>

<?php
include_once "./include/header.php";

$sql = "SELECT CONCAT(firstname, ' ', lastname) AS title, datetime FROM schedule WHERE helperid = '$id'";
$result = $conn->query($sql);

$events = array();

while ($row = $result->fetch_assoc()) {
    $originalDate = $row['datetime'];
    $newDate = date('Y-m-d\TH:i:s', strtotime($originalDate));

    $events[] = [
        'title' => $row['title'],
        'start' => $newDate
    ];
}
?>

<head>
    <style>
        #schedule a:before {
            width: 100%;
        }
    </style>
</head>

<!-- BODY -------------------------------------------------------------------------------------------------->

<body>
    <div class="schedule_form">
        <div id="calendar" style="width: 1098px; height: 80px; margin-left: 135px; margin-bottom: 2px; border-radius: 15px; padding: 10px; background: white;"></div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    contentHeight: 'auto',
                    events: <?php echo json_encode($events); ?>,
                    dateClick: function(info) {
                        window.location.href = 'events.php?selectedDate=' + info.dateStr;
                    },
                    eventTimeFormat: {
                        hour: 'numeric',
                        minute: '2-digit',
                        meridiem: 'short'
                    }
                });

                calendar.render();
            });
        </script>
    </div>

    <!-- SCRIPT -------------------------------------------------------------------------------------------->


</body>

</html>