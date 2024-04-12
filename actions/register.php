<?php
// Include necessary files and establish database connection
include('../settings/connection.php');
include('../actions/fetch_roles.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $user_type = $_POST['user_type']; // Changed $role to $user_type
    $studentID = $_POST['studentID'];
    $class = $_POST['class'];
    $academicYear = $_POST['academicYear'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security
    $termsAndConditions = isset($_POST['termsAndConditions']) ? 1 : 0; // Check if terms and conditions are accepted

    // Check if email already exists
    $email_check_stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $email_check_stmt->bind_param("s", $email);
    $email_check_stmt->execute();
    $email_check_result = $email_check_stmt->get_result();

    

    // Insert data into the database
    $insert_stmt = $conn->prepare("INSERT INTO users (name, gender, user_type, student_id, class, academic_year, phone_number, email, password, terms_and_conditions, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())"); // Removed 'role' column
    $insert_stmt->bind_param("sssiissssi", $name, $gender, $user_type, $studentID, $class, $academicYear, $phoneNumber, $email, $password, $termsAndConditions); // Changed 'ssiiissss' to 'ssiiissssi'
    
    if ($insert_stmt->execute()) {
        // Registration successful, redirect to login page
        header("Location: ../Login/login.php");
        exit();
    } else {
        // Registration failed, handle error
        echo "Error: " . $insert_stmt->error;
    }

    // Close statements and database connection
    $email_check_stmt->close();
    $insert_stmt->close();
    $conn->close();
}
?>
