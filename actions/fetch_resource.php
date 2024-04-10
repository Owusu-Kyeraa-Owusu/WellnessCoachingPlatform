<?php
// Including the connection to the database
include('../settings/connection.php');

// Function to display fetched resources
function displayResources($result) {
    // Check if the result is valid
    if($result) {
        // Check if there are any resources found
        if(mysqli_num_rows($result) > 0) {
            // Start displaying resources in a container
            echo '<div style="max-width:800px;display:flex;flex-direction:row;justify-content:center;align-items:flex-start;flex-wrap:wrap;">';

            // Loop through each fetched resource
            while($row = mysqli_fetch_assoc($result)) {
                // Get resource details
                $filename = $row['filename'];
                $filelocation = $row['filelocation'];
                $resource_desc = $row['resource_desc'];

                // Display resource with image, description, and delete button
                echo '<div class="card" style="margin: 10px; max-width: 250px; text-align: center;">
                        <a href="' . $filelocation . '" target="_blank">
                            <img src="' . $filelocation . '" width="200px" height="200px"/>
                        </a>
                        <p class="resource-desc" style="margin-top: 10px; overflow-wrap: break-word;">'.$resource_desc.'</p>
                        <form method="post" action="../coaches/resources.php" style="margin: 6px;">
                            <input type="hidden" name="filename" value="'.$filename.'">
                            <input type="submit" name="deletefile" value="Delete" class="btn btn-danger">
                        </form>
                    </div>';
            }

            // End of resource container
            echo '</div>';
        } else {
            // Display message if no resources found
            echo '<div class="alert alert-info" role="alert">No resources found.</div>';
        }
    } 
}

// Retrieve unique uploaded files from the database
$query = "SELECT DISTINCT filename, filelocation, resource_desc FROM resources";
$result = mysqli_query($conn, $query);

// Call the function to display resources
displayResources($result);
?>
