<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Events</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/events.css">
</head>
<body>
    <header>
        <h1>Add Events</h1>
        <a href="../coaches/dashboard.php" class="back-link"><i class="fas fa-arrow-left"></i></a>
    </header>

    <!-- The form -->
    <div class="form-popup" id="myForm">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-container">
            <h2>Events</h2>

            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" required>

            <label for="description"><b>Description</b></label>
            <input type="text" placeholder="Enter Description" name="description" required>

            <label for="date"><b>Date</b></label>
            <input type="date" name="date" required>

            <label for="start_time"><b>Start Time</b></label>
            <input type="time" name="start_time" required>

            <label for="end_time"><b>End Time</b></label>
            <input type="time" name="end_time" required>

            <label for="location"><b>Location</b></label>
            <input type="text" placeholder="Enter Location" name="location" required>

            <label for="status"><b>Status</b></label>
            <input type="text" placeholder="Enter Status" name="status" required>

            <button type="submit" class="btn">Add Event</button>
        </form>
    </div>

    <?php
    // Include your database connection file
    include("../settings/connection.php");

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $_POST["name"];
        $description = $_POST["description"];
        $date = $_POST["date"];
        $start_time = $_POST["start_time"];
        $end_time = $_POST["end_time"];
        $location = $_POST["location"];
        $status = $_POST["status"];

        // Prepare and execute SQL query to insert event data into the database
        $sql = "INSERT INTO events (name, description, date, start_time, end_time, location, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $name, $description, $date, $start_time, $end_time, $location, $status);
        
        if ($stmt->execute()) {
            // Event added successfully
            echo "<script>alert('Event added successfully!'); window.location.href = '../coaches/dashboard.php';</script>";
        } else {
            // Error adding event
            echo "Error adding event: " . $conn->error;
        }

        // Close prepared statement
        $stmt->close();
    }
    ?>
</body>
</html>
