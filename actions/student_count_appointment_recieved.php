<?php
// Include your database connection file
include("../settings/connection.php");

// Function to count the number of appointments received by a student
function countAppointments($studentName) {
    global $conn;

    // Initialize appointment count
    $appointmentCount = 0;

    // Retrieve scheduled appointments from the coach_appointments table
    $sql = "SELECT COUNT(*) AS appointment_count FROM coach_appointments WHERE student_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $studentName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $appointmentCount = $row['appointment_count'];
    }

    return $appointmentCount;
}
?>
