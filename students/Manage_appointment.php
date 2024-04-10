<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments</title>
    <link rel="stylesheet" href="../css/manage_appointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header>
        <a href="../students/dashboard.php" class="back-link"><i class="fas fa-arrow-left"></i></a> <!-- Back arrow icon -->
        <h1>Manage Your Appointments</h1>
    </header>
    <a href="../students/schedule_appointment.php" class="book-appointment">New Appointment</a>
    <main>
        <div class="calendar">
        </div>
        <div class="appointments">
            <h2>Appointment Made</h2>
            <table>
                <thead>
                    <tr>
                        <th>Appointment ID</th>
                        <th>Coach Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("../actions/fetch_current_appointments.php");                 
                    
                    ?>
                </tbody>

            </table>
            <table>
            <h2>Recieved Appointments</h2>
                <thead>
                    <tr>
                        <th>Appointment ID</th>
                        <th>Coach Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                
                <?php
                    include("../actions/students_received_appointment.php");                 
                    
                    ?>
            
                </tbody>
                
            </table>

            
        </div>
    </main>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    // Attach click event listener to "Complete" icons
    document.querySelectorAll(".complete-appointment").forEach(function(icon) {
        icon.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent default link behavior
            
            // Get appointment ID from data attribute
            var appointmentId = this.getAttribute("data-id");
            
            // Send AJAX request to complete the appointment
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../actions/complete_appointment.php?id=" + appointmentId, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Reload the page to reflect changes
                    window.location.reload();
                } else {
                    console.error("Error completing appointment:", xhr.statusText);
                }
            };
            xhr.onerror = function() {
                console.error("Error completing appointment: Network error.");
            };
            xhr.send();
        });
    });
});
</script>

</body>
</html>
