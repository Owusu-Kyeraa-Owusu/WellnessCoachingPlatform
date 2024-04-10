<?php
include ('../settings/core.php');
include ('../settings/connection.php');

$email = $password = "";
$email_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Check input errors before processing the database query
    if (empty($email_err) && empty($password_err)) {
        // Prepare a SELECT statement
        $sql = "SELECT id, name, email, password, role_id FROM users WHERE email = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);
            $param_email = $email;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if email exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($id, $name, $email, $hashed_password, $role_id);
                    if ($stmt->fetch()) {
                        // Verify password
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["name"] = $name;
                            $_SESSION["email"] = $email;
                            $_SESSION["role_id"] = $role_id;

                            // Set success message
                            $_SESSION["success_message"] = "Logged in successfully!";

                            // Redirect based on user's role
                            if ($role_id == 1) {
                                // Redirect to the student dashboard
                                redirect("../students/dashboard.php");
                            } elseif ($role_id == 2) {
                                // Redirect to the coach dashboard
                                redirect("../coaches/dashboard.php");
                            } else {
                                // Display an error message if no page was found for the specified role
                                $_SESSION["error_message"] = "Error: No page found for the specified role.";
                                redirect("../error_page.php");
                            }

                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered is not valid.";
                        }
                    }
                } else {
                    // Display an error message if email doesn't exist
                    $email_err = "No account found with that email.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}
?>
