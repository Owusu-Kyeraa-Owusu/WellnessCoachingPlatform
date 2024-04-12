<?php
session_start();

// Database connection
include '../settings/connection.php';

// Initialize error message variable
$_SESSION['error_message'] = '';


    // Get form data and sanitize it
 $email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
    

    // Query to check if user exists and credentials match
    $sql = "SELECT * FROM users WHERE Email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result){
       
        // User found, verify password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            
            // Password is correct, redirect to respective dashboard
            $_SESSION['id'] = $row['id'];
            $_SESSION['user_type'] = $row['user_type'];

            if ($row['user_type'] == 'coach') {
                header("Location:../coaches/dashboard.php");
                exit();
            }
    
            header("Location:../students/dashboard.php");
            
            exit();
    


    } else {
            // Password incorrect, display error message
        $_SESSION['error_message']  = "Invalid email or password. Please try again.";
        header("Location:../Login/login.php");
        exit();
     }
    }else{

        echo "I am in else";
        $_SESSION['error_message']  = "Invalid email or password. Please try again.";
        header("Location:../Login/login.php");
        exit();

    }


// Close database connection
mysqli_close($conn);
?>
