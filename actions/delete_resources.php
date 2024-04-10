<?php
// Including the connection to the database
include('../settings/connection.php');

// Check if the form is submitted and the delete button is clicked
if(isset($_POST['deletefile']) && isset($_POST['filename'])) {
    $filename = $_POST['filename'];

    // Delete the file from the database
    $query = "DELETE FROM resources WHERE filename = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $filename);

    if($stmt->execute()) {
        // Delete the file from the server
        $filelocation = "C:/xampnew/htdocs/Coaching Platform/image/" . $filename;
        if(file_exists($filelocation)) {
            unlink($filelocation);
        }
        //echo "File deleted successfully.";
    } else {
        echo "Error deleting file: " . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Redirect back to the page where the resources are displayed
//header("Location: ../coaches/resources.php");
?>
