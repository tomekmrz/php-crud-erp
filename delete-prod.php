<?php
include "db_conn.php";

// Get the ID from the URL parameter
$id = $_GET["id"];

// Prepare the SQL query to delete the record with the given ID
$sql = "DELETE FROM `production` WHERE id = $id";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Redirect to the production page with a success message
    header("Location: prod.php?msg=Data deleted successfully");
    exit();
} else {
    // Display an error message if the query failed
    echo "Failed: " . mysqli_error($conn);
}
?>
