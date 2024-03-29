<?php
// Include your database connection code here
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        
        // Check if the action is for deleting a profile
        if (isset($_POST['action']) && $_POST['action'] === 'delete') {
            // Delete the profile from the database
            $deleteQuery = "DELETE FROM profiles WHERE eid = ?";
            
            // Create a prepared statement
            $stmt = mysqli_prepare($conn, $deleteQuery);
            
            if ($stmt) {
                // Bind parameters to the prepared statement
                mysqli_stmt_bind_param($stmt, "i", $id);
                
                // Execute the statement
                if (mysqli_stmt_execute($stmt)) {
                    // Success response
                    echo json_encode(array('status' => 'success', 'message' => 'Profile deleted successfully.'));
                } else {
                    // Error response
                    echo json_encode(array('status' => 'error', 'message' => 'Error deleting profile: ' . mysqli_stmt_error($stmt)));
                }
                
                // Close the prepared statement
                mysqli_stmt_close($stmt);
            } else {
                // Error creating prepared statement
                echo json_encode(array('status' => 'error', 'message' => 'Error creating prepared statement.'));
            }
        } elseif (isset($_POST['action']) && $_POST['action'] === 'add') {
            // Get data from the form
            $eid = $_POST['addEid']; // Assuming the form has an input field for entering the eid
            $name = $_POST['addName'];
            $designation = $_POST['addDesignation'];
            $dept = $_POST['addDepartment']; // Department from the form
            $degree = $_POST['addDegree'];
            $specialization = $_POST['addSpecialization'];
            $mobile = $_POST['addMobile'];
            $email = $_POST['addEmail'];
            
            // Insert the new staff member into the database
            $insertQuery = "INSERT INTO profiles (eid, name, designation, dept, degree, specialization, mobile, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            
            // Create a prepared statement
            $stmt = mysqli_prepare($conn, $insertQuery);
            
            if ($stmt) {
                // Bind parameters to the prepared statement
                mysqli_stmt_bind_param($stmt, "ssssssss", $eid, $name, $designation, $dept, $degree, $specialization, $mobile, $email);
                
                // Execute the statement
                if (mysqli_stmt_execute($stmt)) {
                    // Success response
                    echo json_encode(array('status' => 'success', 'message' => 'Staff member added successfully.'));
                } else {
                    // Error response
                    echo json_encode(array('status' => 'error', 'message' => 'Error adding staff member: ' . mysqli_stmt_error($stmt)));
                }
                
                // Close the prepared statement
                mysqli_stmt_close($stmt);
            } else {
                // Error creating prepared statement
                echo json_encode(array('status' => 'error', 'message' => 'Error creating prepared statement.'));
            }
        } else {
            // Update the profile in the database
            $name = $_POST['name'];
            $designation = $_POST['designation'];
            $dept = $_POST['dept'];
            $degree = $_POST['degree'];
            $specialization = $_POST['specialization'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            
            $updateQuery = "UPDATE profiles SET name = ?, designation = ?, dept = ?, degree = ?, specialization = ?, mobile = ?, email = ? WHERE eid = ?";
            
            // Create a prepared statement
            $stmt = mysqli_prepare($conn, $updateQuery);
            
            if ($stmt) {
                // Bind parameters to the prepared statement
                mysqli_stmt_bind_param($stmt, "sssssssi", $name, $designation, $dept, $degree, $specialization, $mobile, $email, $id);
                
                // Execute the statement
                if (mysqli_stmt_execute($stmt)) {
                    // Success response
                    echo json_encode(array('status' => 'success', 'message' => 'Profile updated successfully.'));
                } else {
                    // Error response
                    echo json_encode(array('status' => 'error', 'message' => 'Error updating profile: ' . mysqli_stmt_error($stmt)));
                }
                
                // Close the prepared statement
                mysqli_stmt_close($stmt);
            } else {
                // Error creating prepared statement
                echo json_encode(array('status' => 'error', 'message' => 'Error creating prepared statement.'));
            }
        }
    } else {
        // Invalid request
        echo json_encode(array('status' => 'error', 'message' => 'Invalid request.'));
    }
    
    // Close the database connection
    mysqli_close($conn);
}
?>
