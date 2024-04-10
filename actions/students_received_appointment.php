<?php
include("../settings/connection.php");

// Function to fetch scheduled appointments for coaches
function fetchScheduledAppointments() {
    global $conn;

    $appointments = []; // Initialize an array to store appointments

    // Retrieve scheduled appointments from the coach_appointments table
    $sql = "SELECT * FROM coach_appointments";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $appointments[] = $row; // Store each appointment in the array
        }
    }

    return $appointments;
}

// Call the function to fetch scheduled appointments for coaches
$coachesAppointments = fetchScheduledAppointments();

// Output the appointments for students
if (!empty($coachesAppointments)) {
    foreach ($coachesAppointments as $appointment) {
        echo "<tr>";
        echo "<td>" . $appointment["id"] . "</td>";
        echo "<td>" . $appointment["student_name"] . "</td>";
        echo "<td>" . $appointment["appointment_date"] . "</td>";
        echo "<td>" . $appointment["appointment_time"] . "</td>";
        echo "<td>";
        
        // Add the "Complete" icon
        echo "<span class='complete-icon' onclick='toggleCompleteButton(this)'><i class='fas fa-check'></i></span>";
        
        // Add a button for completing the appointment (initially hidden)
        echo "<button class='complete-button' style='display: none;'>Completed</button>";
        
        

        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No appointments received</td></tr>";
}
?>

<script>
    function toggleCompleteButton(icon) {
        // Toggle visibility of the "Complete" button and the "Completed" button
        icon.nextElementSibling.style.display = 'inline-block';
        icon.nextElementSibling.nextElementSibling.style.display = 'inline-block';
        icon.style.display = 'none';
    }
</script>
