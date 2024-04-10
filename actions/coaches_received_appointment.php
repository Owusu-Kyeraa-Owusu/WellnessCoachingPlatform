<script>
    function completeAppointment(appointmentId) {
        // Hide the "Complete" icon
        document.querySelector("#completeIcon_" + appointmentId).style.display = 'none';
        
        // Show the "Completed" button
        document.querySelector("#completedButton_" + appointmentId).style.display = 'inline-block';
        
        // Hide the "Cancel" icon
        document.querySelector("#cancelIcon_" + appointmentId).style.display = 'none';
        
        // Disable the "Canceled" button
        document.querySelector("#canceledButton_" + appointmentId).style.display = 'none';

        // Store the completed state in localStorage
        localStorage.setItem("appointment_" + appointmentId, "completed");
    }

    function cancelAppointment(appointmentId) {
        // Hide the "Cancel" icon
        document.querySelector("#cancelIcon_" + appointmentId).style.display = 'none';
        
        // Show the "Canceled" button
        document.querySelector("#canceledButton_" + appointmentId).style.display = 'inline-block';
        
        // Hide the "Complete" icon
        document.querySelector("#completeIcon_" + appointmentId).style.display = 'none';
        
        // Disable the "Completed" button
        document.querySelector("#completedButton_" + appointmentId).style.display = 'none';

        // Store the canceled state in localStorage
        localStorage.setItem("appointment_" + appointmentId, "canceled");
    }

    // Check localStorage for previous states on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Loop through appointments
        <?php foreach ($currentAppointments as $appointment) { ?>
            var state = localStorage.getItem("appointment_<?php echo $appointment['id']; ?>");
            if (state === "completed") {
                // If appointment was completed, hide the "Complete" icon and show the "Completed" button
                document.querySelector("#completeIcon_<?php echo $appointment['id']; ?>").style.display = 'none';
                document.querySelector("#completedButton_<?php echo $appointment['id']; ?>").style.display = 'inline-block';
            } else if (state === "canceled") {
                // If appointment was canceled, hide the "Cancel" icon and show the "Canceled" button
                document.querySelector("#cancelIcon_<?php echo $appointment['id']; ?>").style.display = 'none';
                document.querySelector("#canceledButton_<?php echo $appointment['id']; ?>").style.display = 'inline-block';
            }
        <?php } ?>
    });
</script>




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
        
        // Icon for completing appointment
        echo "<a id='completeIcon_" . $appointment['id'] . "' href='javascript:void(0);' onclick='completeAppointment(" . $appointment['id'] . ")'><i class='fas fa-check'></i></a>";

        // Button for showing completed appointment
        echo "<button id='completedButton_" . $appointment['id'] . "' style='display: none;'>Completed</button>";

        // Icon for canceling appointment
        echo "<a id='cancelIcon_" . $appointment['id'] . "' href='javascript:void(0);' onclick='cancelAppointment(" . $appointment['id'] . ")'><i class='fas fa-times'></i></a>";

        // Button for showing canceled appointment
        echo "<button id='canceledButton_" . $appointment['id'] . "' style='display: none;'>Canceled</button>";

        echo "</td>";

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No appointments received</td></tr>";
}
?>
