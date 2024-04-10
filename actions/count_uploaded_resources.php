<?php
// Include your database connection file
include("../settings/connection.php");

// Function to count the number of resources posted
function countResources() {
    global $conn;

    // Initialize resource count
    $resourceCount = 0;

    // Retrieve count of resources from the resources table
    $sql = "SELECT COUNT(*) AS resource_count FROM resources";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $resourceCount = $row['resource_count'];
    }

    return $resourceCount;
}

// Call the function to count resources
$resourceCount = countResources();


?>
