<?php
// Include your database connection file
include("../settings/connection.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $student_name = $_POST["student_name"]; // Corrected variable name
    $appointment_date = $_POST["appointment_date"];
    $appointment_time = $_POST["appointment_time"];


    // Basic form validation
    if (empty($full_name) || empty($email) || empty($student_name) || empty($appointment_date) || empty($appointment_time)) {
        die("Please fill in all fields.");
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Prepare and execute SQL query to insert appointment data into the database
    $sql = "INSERT INTO coach_appointments (full_name, email, student_name, appointment_date, appointment_time) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Check if the prepare() method succeeded
    if ($stmt === false) {
        die("Error preparing SQL statement: " . $conn->error);
    }

    // Bind parameters and execute statement
    $stmt->bind_param("sssss", $full_name, $email, $student_name, $appointment_date, $appointment_time);
    $result = $stmt->execute();

    if ($result === false) {
        // Error booking appointment
        die("Error booking appointment: " . $stmt->error);
    } else {
        // Appointment booked successfully
        echo "<script>alert('Appointment booked successfully!'); window.location.href = '../coaches/manage appointment.php';</script>";
    }
}
    else {
        echo "<tr><td colspan='4'>No appointments found</td></tr>";
    // Close prepared statement
    $stmt->close();
}
?>
