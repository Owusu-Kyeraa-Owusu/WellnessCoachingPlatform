<?php
// Including the connection to the database
include('../settings/connection.php');

// Function to count viewed resources
function countViewedResources() {
    global $conn;

    // Retrieve unique uploaded files from the database
    $query = "SELECT COUNT(DISTINCT filename) AS resource_count FROM resources";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Fetch the row containing the count
        $row = mysqli_fetch_assoc($result);
        // Get the count of viewed resources
        $resourceCount = $row['resource_count'];
        // Free the result set
        mysqli_free_result($result);
        return $resourceCount;
    } else {
        // If the query fails, return 0
        return 0;
    }
}

// Call the function to count viewed resources
$resourceCount = countViewedResources();


?>
