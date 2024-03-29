<?php
// Include your database connection code here
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $date = $_POST['date']; // Add the date parameter
    $heading = $_POST['heading'];
    $department = $_POST['dept'];
    $description = $_POST['description'];
    
    // Update the news item in the database using prepared statements
    $updateQuery = "UPDATE news SET start = ?, heading = ?, dept = ?, description = ? WHERE id = ?";
    
    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, "ssssi", $date, $heading, $department, $description, $id); // Include the date parameter
    
    if (mysqli_stmt_execute($stmt)) {
        // Success response
        echo json_encode(array('status' => 'success', 'message' => 'News item updated successfully.'));
    } else {
        // Error response
        echo json_encode(array('status' => 'error', 'message' => 'Error updating news item: ' . mysqli_stmt_error($stmt)));
    }

    mysqli_stmt_close($stmt);
} else {
    // Invalid request
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request.'));
}
?>
