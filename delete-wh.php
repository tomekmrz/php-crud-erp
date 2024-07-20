<?php
include "db_conn.php";

// Get the ID from the URL parameter
$id = $_GET["id"];

// Prepare the SQL query to delete the record with the given ID
$sql = "DELETE FROM `warehouse` WHERE id = $id";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Redirect to the warehouse page with a success message
    header("Location: warehouse.php?msg=Data deleted successfully");
    exit();
} else {
    // Display an error message if the query failed
    echo "Failed: " . mysqli_error($conn);
}
?>
