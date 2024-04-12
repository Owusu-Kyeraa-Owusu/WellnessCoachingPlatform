<?php 
include("../actions/coaches_count_appointment_made.php");
include("../actions/coaches_appointment_recieved.php");
include("../actions/count_uploaded_resources.php");
include("../actions/count_event.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="../css/dashboard.css" >
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
                
      </a></li>
        <li><a href="../students/dashboard.php">
          <i class="fas fa-user-shield"></i>
          <span class="nav-item">Student</span>
        </a></li>
        </a></li>
        <li><a href="#">
          <i class="fas fa-menorah"></i>
          <span class="nav-item">Dashboard</span>
        </a></li>
        <li><a href="../coaches/manage appointment.php">
          <i class="fas fa-tasks"></i>
          <span class="nav-item">Manage Appointment</span>
        </a></li>
        <li><a href="../coaches/make_appointment.php">
          <i class="fas fa-calendar-alt"></i>
          <span class="nav-item">Schedule Appointment</span>
        </a></li>
        <li><a href="../coaches/resources.php">
          <i class="fas fa-database"></i>
          <span class="nav-item">Manage Resources</span>
        </a></li>
        <li><a href="../coaches/add_events.php">
          <i class="fas fa-database"></i>
          <span class="nav-item">Events</span>
        </a></li>
       
        <li><a href="../coaches/logout.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>


    <section class="main">
      <div class="main-top">
        <h1>Statistics and  Task </h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="users">
        <div class="card">
         
          <h4>Appointemnt Made</h4>
          
          <div class="per">
            <table>
              <tr>
              <td><span><?php echo $totalAppointments; ?></span></td>
                
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
              
            </table>
          </div>
          <button onclick="redirectToManageAppointment()" class="btn btn-primary">View Details</button>
        </div>
        <div class="card">
          
          <h4>Uploaded Resources</h4>
          
          
          <div class="per">
            <table>
              <tr>
              <td><span><?php echo $resourceCount; ?></span></td>
               
              
            </table>
          </div>
          <button onclick="redirectToManageAppointment()" class="btn btn-primary">View Details</button>
        </div>
        <div class="card">
        
          <h4>Upcoming Events</h4>
          
          <div class="per">
            <table>
              <tr>
              <td><span><?php echo $eventCount; ?></span></td>
                
              </tr>
              
            </table>
          </div>
          <button>View Details</button>
        </div>
      </div>

      <section class="coaches-actions">
    <div class="coaches-actions-list">
        <h1>Upcoming Events</h1>
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
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <td><?php include("../actions/fetch_events.php"); ?></td>
    </tbody>
</table>

    </div>
</section>


       
    </section>
  </div>
  <script>
    function redirectToManageAppointment() {
        window.location.href = "../coaches/manage appointment.php";
    }
</script>

</body>
</html>
</span>
