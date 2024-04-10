<?php
// Include your database connection file
include("../settings/connection.php");

// Function to count the number of events in the database
function countEvents() {
    global $conn;

    // Initialize event count
    $eventCount = 0;

    // Retrieve count of events from the events table
    $sql = "SELECT COUNT(*) AS event_count FROM events";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $eventCount = $row['event_count'];
    }

    return $eventCount;
}

// Call the function to count events
$eventCount = countEvents();

// Echo the event count
//echo "Total Events: " . $eventCount;
?>
