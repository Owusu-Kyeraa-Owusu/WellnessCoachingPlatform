<?php
// Include your database connection file
include("../settings/connection.php");

// Function to count the total number of appointments
function countTotalAppointments() {
    global $conn;

    // Initialize appointment count
    $appointmentCount = 0;

    // Retrieve count of appointments from the appointments table
    $sql = "SELECT COUNT(*) AS appointment_count FROM coach_appointments";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $appointmentCount = $row['appointment_count'];
    }

    return $appointmentCount;
}

// Call the function to count total appointments
$totalAppointments = countTotalAppointments();


?>
