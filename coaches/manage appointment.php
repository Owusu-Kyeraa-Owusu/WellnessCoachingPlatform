<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/manage_appointment.css">
</head>
<body>

    <header>
        <h1>Manage Appointments</h1>
        <a href="../coaches/dashboard.php" class="back-link"><i class="fas fa-arrow-left"></i></a> <!-- Back arrow icon -->
    </header>

    <a href="../coaches/make_appointment.php" class="book-appointment">New Appointment</a>
    <main>
        <div class="calendar">
            
        </div>
        <div class="appointments">
            <h2>Scheduled Appointments</h2>
            <table>
                <thead>
                    <tr>
                        <th>Appointment ID</th>
                        <th>student Name</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       
                    <?php
                    include("../actions/fetch_coaches_scheduled_appointments.php");                 
                    
                    ?>
                        
                        </td>
                    </tr>
                    <!-- More rows for other appointments -->
                </tbody>
            </table>

            <h2>Recieved Appointments</h2>
            <table>
                <thead>
                    <tr>
                        <th>Appointment ID</th>
                        <th>student Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <tbody>
                    <?php
                    include("../actions/coaches_received_appointment.php");
                                        
                    
                    ?>
                </tbody>
                </tbody>
            </table>

            
            
        </div>
    </main>
    
</body>
</html>
