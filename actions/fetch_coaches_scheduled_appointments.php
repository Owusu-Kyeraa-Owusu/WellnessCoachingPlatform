<?php
include("../settings/connection.php");


// Function to fetch current appointments
function fetchScheduledAppointments() {
    global $conn;

    $appointments = []; // Initialize an array to store appointments

    // Retrieve current appointments from the database
    $sql = "SELECT * FROM coach_appointments";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $appointments[] = $row; // Store each appointment in the array
        }
    }

    return $appointments;
}

// Call the function to fetch current appointments
$currentAppointments = fetchScheduledAppointments();

// Output the appointments
if (!empty($currentAppointments)) {
    foreach ($currentAppointments as $appointment) {
        echo "<tr>";
        echo "<td>" . $appointment["id"] . "</td>";
        echo "<td>" . $appointment["student_name"] . "</td>";
        echo "<td>" . $appointment["appointment_date"] . "</td>";
        echo "<td>" . $appointment["appointment_time"] . "</td>";
        echo "<td>";
        
        echo "<a href='../actions/coaches_reschedule_appointment.php?id=" . $appointment['id'] . "'><i class='fas fa-edit'></i></a>";
        echo "<a href='../actions/coaches_delete_scheduled_appointment.php?id=" . $appointment['id'] . "'><i class='fas fa-trash-alt'></i></a>";
        //echo "<a href='?complete=" . $appointment['id'] . "'><i class='fas fa-check'></i></a>"; // Icon for completing appointment
        echo "</td>";

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No appointments found</td></tr>";
}
?>
