<?php
// Start the session
session_start();

// Include your database connection file
include("../settings/connection.php");

// Initialize variables to avoid PHP notices

// Check if user ID is set
if(isset($_SESSION["id"])) {
    $user_id = $_SESSION["id"];
    
    // Retrieve user's data from the users table in the database
    $sql = "SELECT * FROM users WHERE id = $user_id";
    
    $result = $conn->query($sql);
    if($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $student_id = $row["student_id"];
        $class = $row["class"];
        $gender = $row["gender"];
        $academic_year = $row["academic_year"];
    } else {
        // Handle if user data is not found in the users table
        // You can redirect the user or display an error message
        // For example:
        // header("Location: error.php");
        // exit();
    }
} else {
    // Handle if user ID is not set (user is not logged in)
    // You can redirect the user to the login page
    // For example:
    // header("Location:../Login/login.php");
    // exit();
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <link rel='stylesheet' href="../css/student_profile.css">
</head>
<body>
    <header>
        <a href="../students/dashboard.php" class="back-link"><i class="fas fa-arrow-left"></i></a> <!-- Back arrow icon -->
    </header>
    
    <div class="student-profile py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent text-center">
                            <!-- Profile picture -->
                            <img src='../image/pencil.png' class='profile-picture' style='width: 80px; height: 80px; object-fit: cover; border-radius: 50%; margin-bottom: 10px;'>
                            <!-- User's name -->
                            <h3><?php echo $name; ?></h3>
                        </div>
                        <div class="card-body pt-0">
                            <!-- Display user's ID and class -->
                            <p class="mb-1"><strong class="pr-1">Student ID:</strong> <?php echo $student_id; ?></p>
                            <p class="mb-1"><strong class="pr-1">Class:</strong> <?php echo $class; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        
                        <div class="card-body pt-0">
                            <!-- Display user's general information -->
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Name</th>
                                    <td width="2%">:</td>
                                    <td><?php echo $name; ?></td>
                                </tr>
                               <tr>
<th width="30%">Academic Year</th>
<td width="2%">:</td>
<td><?php echo $academic_year; ?></td>
</tr>
</table>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</body>
</html>
