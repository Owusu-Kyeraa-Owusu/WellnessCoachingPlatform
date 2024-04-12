<?php 

session_start(); // Start session if not already started

include("../actions/student_count_appointmet_made.php");
include("../actions/student_count_appointment_recieved.php");
include("../actions/students_count_resources.php");
include("../actions/count_event.php");

// Check if the user is logged in and their role type is 'coach' (admin)
if(isset($_SESSION['role_type']) && $_SESSION['role_type'] == 'coach') {
  $adminLink = '../coaches/dashboard.php'; // Link to the admin dashboard
} else {
  $adminLink = '../coaches/dashboard.php'; // Link to prevent access for students
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="../css/students_dashboard.css" >
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="<?php echo $adminLink; ?>">
          <i class="fas fa-user-shield"></i>
          <span class="nav-item">Admin</span>
        </a></li>
        <!-- Other navigation links -->
      </ul>
    </nav>

    <section class="main">
      <!-- Dashboard content -->
    </section>
  </div>

  <!-- JavaScript functions -->
</body>
</html>
