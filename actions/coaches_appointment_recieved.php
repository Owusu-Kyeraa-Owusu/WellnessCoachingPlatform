<?php
      // Include your database connection file
      include("../settings/connection.php");

      // Prepare and execute SQL query to count the number of appointments
      $sql = "SELECT COUNT(*) AS appointment_count FROM appointments";
      $result = $conn->query($sql);

      if ($result) {
          // Fetch the result as an associative array
          $row = $result->fetch_assoc();
          
          // Get the appointment count
          $appointmentCount = $row['appointment_count'];

          // Output the appointment count
          //echo "Total Appointments: " . $appointmentCount;
      } else {
          // Error fetching appointment count
          echo "Error: " . $conn->error;
      }

      // Close database connection
      $conn->close();
   
?>