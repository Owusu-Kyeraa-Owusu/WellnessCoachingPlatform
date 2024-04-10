<?php
// Include your database connection file
include("../settings/connection.php");

// Prepare and execute SQL query to fetch events from the database
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["start_time"] . "</td>";
        echo "<td>" . $row["end_time"] . "</td>";
        echo "<td>" . $row["location"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "No events found.";
}

// Close database connection
$conn->close();
?>
