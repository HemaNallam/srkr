<?php
session_start();
// Include your database connection code here
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    
    if ($action === 'update') {
        // Update news item
        $id = $_POST['id'];
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end  = $_POST['end'];
        $description = $_POST['description'];
        
        // Update the news item in the database using prepared statements
        $updateQuery = "UPDATE events SET title = ?, start = ?, end = ?, description = ? WHERE id = ?";
        
        $stmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($stmt, "ssssi", $title, $start, $end, $description, $id);
        
        if (mysqli_stmt_execute($stmt)) {
            // Success response
            echo json_encode(array('status' => 'success', 'message' => 'News item updated successfully.'));
        } else {
            // Error response
            echo json_encode(array('status' => 'error', 'message' => 'Error updating news item: ' . mysqli_stmt_error($stmt)));
        }
        
        mysqli_stmt_close($stmt);
    } elseif ($action === 'delete') {
        // Delete news item
        $id = $_POST['id'];
        
        // Delete the news item from the database using prepared statements
        $deleteQuery = "DELETE FROM events WHERE id = ?";
        
        $stmt = mysqli_prepare($conn, $deleteQuery);
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if (mysqli_stmt_execute($stmt)) {
            // Success response
            echo json_encode(array('status' => 'success', 'message' => 'News item deleted successfully.'));
        } else {
            // Error response
            echo json_encode(array('status' => 'error', 'message' => 'Error deleting news item: ' . mysqli_stmt_error($stmt)));
        }
        
        mysqli_stmt_close($stmt);
    } else {
        // Invalid action
        echo json_encode(array('status' => 'error', 'message' => 'Invalid action.'));
    }
} else {
    // Invalid request
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request.'));
}
?>
