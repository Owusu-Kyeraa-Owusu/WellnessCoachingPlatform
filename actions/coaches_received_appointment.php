
<?php
include("../settings/connection.php");

// Function to fetch current appointments
function fetchCurrentAppointments() {
    global $conn;

    $appointments = []; // Initialize an array to store appointments

    // Retrieve current appointments from the database
    $sql = "SELECT * FROM appointments";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $appointments[] = $row; // Store each appointment in the array
        }
    }

    return $appointments;
}

// Call the function to fetch current appointments
$currentAppointments = fetchCurrentAppointments();

// Output the appointments
if (!empty($currentAppointments)) {
    foreach ($currentAppointments as $appointment) {
        echo "<tr>";
        echo "<td>" . $appointment["id"] . "</td>";
        echo "<td>" . $appointment["full_name"] . "</td>";
        echo "<td>" . $appointment["appointment_date"] . "</td>";
        echo "<td>" . $appointment["appointment_time"] . "</td>";
        echo "<td>";
        
        
    }
} else {
    echo "<tr><td colspan='4'>No appointments received</td></tr>";
}
?>
