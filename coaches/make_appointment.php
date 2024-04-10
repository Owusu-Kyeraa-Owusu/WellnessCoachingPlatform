<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <link rel="stylesheet" href="../css/schedule_appointment.css">
    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    <header>
        <a href="../coaches/dashboard.php" class="back-link"><i class="fas fa-arrow-left"></i></a> <!-- Back arrow icon -->
    </header>

    <div class="form-wrapper">
        <form action="../actions/coaches_scheduled_appointment.php" method="post">
            <!-- Your form inputs -->
            <div class="input-group">
                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" id="full_name" placeholder="Full Name">
            </div>
            <div class="input-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="Email Address">
            </div>
            <div class="input-group">
                <label for="student_name">Student Name</label>
                <input type="text" name="student_name" id="student_name" placeholder="Students Name">
            </div>
            <div class="input-group">
                <label for="appointment_date">Appointment Date</label>
                <input type="date" name="appointment_date" id="appointment_date">
            </div>
            <div class="input-group">
                <label for="appointment_time">Appointment Time</label>
                <input type="time" name="appointment_time" id="appointment_time">
            </div>
            
            <button type="submit" class="btn">Send Appointment</button>
        </form>
    </div>
</body>
</html>
