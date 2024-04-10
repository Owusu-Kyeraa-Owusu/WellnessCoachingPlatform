<?php

include("../settings/connection.php");

// Check if the form was submitted
if(isset($_POST['uploadsubmit'])) {
    // Check if file was uploaded without errors
    if(isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {
        $targetDirectory = "image";
        $filename = basename($_FILES["fileToUpload"]["name"]);
        $resource_desc = $_POST['resource_desc'];
        $target_file = $targetDirectory . $filename;

        // Check if the file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
        } else {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                // Insert file information into the database
                $query = "INSERT INTO resources (filename, filelocation, resource_desc) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("sss", $filename, $target_file, $resource_desc);

                if($stmt->execute()){
                    echo "<span style='z-index:10;line-height:40px;width:100%;height:40px;background-color:#2C3E50;color:white;text-align:center;position:fixed;top:0px;left:0px;'>The file has been uploaded</span>";
                } else {
                    echo "Error inserting data into database: " . $conn->error;
                }
            } else {
                echo "There was an error while uploading the file";
            }
        }
    } else {
        echo "File upload failed with error code " . $_FILES['fileToUpload']['error'];
    }
}
?>
