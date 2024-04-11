

<?php 
include("../actions/student_count_appointmet_made.php");
include("../actions/student_count_appointment_recieved.php");
include("../actions/students_count_resources.php");
include("../actions/count_event.php");




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
                
      </a></li>
        <li><a href="../coaches/dashboard.php">
          <i class="fas fa-user-shield"></i>
          <span class="nav-item">Admin</span>
        </a></li>
        </a></li>
        <li><a href="#">
          <i class="fas fa-menorah"></i>
          <span class="nav-item">Dashboard</span>
        </a></li>
        <li><a href="../students/Manage_appointment.php">
          <i class="fas fa-tasks"></i>
          <span class="nav-item">Manage Appointment</span>
        </a></li>
        <li><a href="../students/schedule_appointment.php">
          <i class="fas fa-calendar-alt"></i>
          <span class="nav-item">Schedule Appointment</span>
        </a></li>
        <li><a href="../students/students_resources.php">
          <i class="fas fa-database"></i>
          <span class="nav-item">My Resources</span>
        </a></li>
        <li><a href=../students/student_profile.php#">
          <i class="fas fa-cog"></i>
          <span class="nav-item">profile</span>
        </a></li>

        <li><a href="../students/logout.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>


    <section class="main">
      <div class="main-top">
        <h1>Statistics and  Updates </h1></h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="users">
        <div class="card">
         
          <h4>Appointemnt Made</h4>
          
          <div class="per">
          <table>
    <tr>
        <td><span><?php echo $appointmentCount; ?></span></td>
    </tr>
</table>

          </div>
          <button onclick="redirectToManageAppointment()" class="btn btn-primary">View Details</button>
        </div>
        <div class="card">
         
          <h4>Appointement Received</h4>
          
          <div class="per">
            <table>
              <tr>
                
              <td><span><?php echo $appointmentCount; ?></span></td>
              </tr>
              <tr>
                
              </tr>
            </table>
          </div>
          <button onclick="redirectToManageAppointment()" class="btn btn-primary">View Details</button>
        </div>
        <div class="card">
          
          <h4>General Upcomings</h4>
          
          <div class="per">
            <table>
              <tr>
              <td><span><?php echo $eventCount; ?></span></td>
                
              </tr>
             
            </table>
          </div>
          <button >View Details</button>

        </div>
        <div class="card">
        
          <h4>Resources</h4>
          
          <div class="per">
            <table>
              <tr>
              <td><span><?php echo $resourceCount ; ?></span></td>
                
              </tr>
              
            </table>
          </div>
          <button onclick="redirectToResources()" class="btn btn-primary">View Details</button>
        </div>
      </div>

      <section class="wellness-activities">
    <div class="wellness-activities-list">
        <h1>General Upcomings</h1>
        <table class="table">
            <thead>
                <tr>
                <th>ID</th>
                  <th>Name</th>
                  <th>Description</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
            <td><?php include("../actions/students_event.php"); ?></td>
            </tbody>
        </table>
    </div>
</section>

       
    </section>
  </div>

  <script>
    function redirectToManageAppointment() {
        window.location.href = "../students/Manage_appointment.php";
    }

    function redirectToResources() {
        window.location.href = "WellnessCoachingPlatform\students\students_resources.php";
    }
</script>

</body>
</html>
</span>