
<?php
include('../settings/connection.php');
include('../actions/fetch_roles.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Register Form</title> 
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Register</span>
                <form id="registerForm" action="../actions/register.php"  method="POST">
                    <div class="input-field">
                        <input type="text" name="name" id="name" placeholder="Enter your name" required pattern="[A-Za-z ]+" title="Name cannot contain numbers or symbols">
                        <i class="uil uil-user"></i>
                        <span class="error-message" style="display: none;">Name cannot contain numbers or symbols</span>
                    </div>

                    <div class="input-field">
                        <select name="gender" id="gender" required>
                            <option value="" disabled selected>Select your gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="input-field">
                        <input type="text" name="user_type" id="user_type" placeholder="User type" required>
                        <i class="uil uil-user-graduate"></i>
                        <span class="error-message" style="display: none;">Student ID must be letters</span>
                    </div>

                    <div class="input-field">
                        <input type="number" name="studentID" id="studentID" placeholder="Student ID" required>
                        <i class="uil uil-user-graduate"></i>
                        <span class="error-message" style="display: none;">Student ID must be only numbers</span>
                    </div>

                    <div class="input-field">
                        <input type="number" name="class" id="class" placeholder="Class" required>
                        <span class="error-message" style="display: none;">Class must be a number</span>
                    </div>

                    <div class="input-field">
                        <input type="number" name="academicYear" id="academicYear" placeholder="Academic Year" required>
                        <span class="error-message" style="display: none;">Academic year must be numbers</span>
                    </div>

                    <div class="input-field">
                        <input type="tel" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" required>
                        <i class="uil uil-phone icon"></i>
                        <span class="error-message" style="display: none;">Phone number should be numbers</span>
                    </div>

                    <div class="input-field">
                        <input type="email" name="email" id="email" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                        <span class="error-message" style="display: none;">Please enter a valid Ashesi email</span>
                    </div>

                    <div class="input-field">
                        <input type="password" name="password" id="password" class="password" placeholder="Create a password" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$" title="Password should be a mixture of numbers, symbols, lowercase and uppercase letters, and at least 8 characters long">
                        <i class="uil uil-lock icon"></i>
                        <span class="error-message" style="display: none;">Password should be a mixture of numbers, symbols, lowercase and uppercase letters, and at least 8 characters long</span>
                    </div>

                    <div class="input-field">
                        <input type="password" class="password" id="confirmPassword" placeholder="Confirm a password" required>
                        <i class="uil uil-eye-slash showHidePw"></i>
                        <span class="error-message" style="display: none;">Passwords do not match</span>
                    </div>
                    
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon" required>
                            <label for="termCon" class="text">I accept all terms and conditions</label>
                        </div>
                    </div>

                    <div class="input-field button" id="signupButton">
                        <input type="submit" value="Signup" id="signupSubmit">
                    </div>


                </form>

                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="../Login/login.php" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
