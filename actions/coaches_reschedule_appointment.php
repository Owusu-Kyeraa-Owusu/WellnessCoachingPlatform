<?php
// Include database connection file
include("../settings/connection.php");

// Check if appointment ID is provided
if (isset($_GET['id'])) {
    $appointment_id = $_GET['id'];

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $full_name = $_POST["full_name"];
        $email = $_POST["email"];
        $student = $_POST["student_name"];
        $appointment_date = $_POST["appointment_date"];
        $appointment_time = $_POST["appointment_time"];

        // Prepare and execute SQL query to update appointment data
        $sql = "UPDATE coach_appointments SET full_name = ?, email = ?, student_name = ?, appointment_date = ?, appointment_time = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        
        // Check if the prepare() call was successful
        if ($stmt) {
            // Bind parameters and execute the statement
            $stmt->bind_param("sssssi", $full_name, $email, $student, $appointment_date, $appointment_time, $appointment_id);
            
            if ($stmt->execute()) {
                // Appointment updated successfully
                header("Location: ../coaches/manage appointment.php");
                exit();
            } else {
                // Error updating appointment
                echo "Error updating appointment: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            // Error preparing statement
            echo "Error preparing statement: " . $conn->error;
        }
    }

    // Retrieve appointment details from the database
    $sql = "SELECT * FROM coach_appointments WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $appointment_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment</title>
    <link rel="stylesheet" href="../css/schedule_appointment.css">
    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    <header>
        <a href="../coaches/dashboard.php" class="back-link"><i class="fas fa-arrow-left"></i></a> <!-- Back arrow icon -->
    </header>

    <div class="form-wrapper">
        <form action="" method="post">
            <!-- Your form inputs -->
            <div class="input-group">
                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" id="full_name" value="<?php echo $row['full_name']; ?>" placeholder="Full Name">
            </div>
            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" placeholder="Email Address">
            </div>
            <div class="input-group">
                <label for="student_name">Student Name</label>
                <input type="text" name="student_name" id="student_name" value="<?php echo $row['student_name']; ?>" placeholder="Student Name">
            </div>
            <div class="input-group">
                <label for="appointment_date">Appointment Date</label>
                <input type="date" name="appointment_date" id="appointment_date" value="<?php echo $row['appointment_date']; ?>">
            </div>
            <div class="input-group">
                <label for="appointment_time">Appointment Time</label>
                <input type="time" name="appointment_time" id="appointment_time" value="<?php echo $row['appointment_time']; ?>">
            </div>
            
            <button type="submit" class="btn">Reschedule Appointment</button>
        </form>
    </div>
</body>
</html>
<?php
    } else {
        // Appointment not found
        echo "Appointment not found.";
    }

    // Close prepared statement
    $stmt->close();
}
?>
