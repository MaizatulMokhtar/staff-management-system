<?php
// Database connection
include('db.php');

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if data is coming in and sanitize input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);

    // Prepare and execute the SQL insert query
    $sql = "INSERT INTO staff (name, email, phone, position) VALUES ('$name', '$email', '$phone', '$position')";

    if ($conn->query($sql) === TRUE) {
        // Return a JSON response for success
        echo json_encode([
            'status' => 'success',
            'message' => 'New staff added successfully!'
        ]);
    } else {
        // Return a JSON response for error
        echo json_encode([
            'status' => 'error',
            'message' => 'Error: ' . $conn->error
        ]);
    }
}
?>
