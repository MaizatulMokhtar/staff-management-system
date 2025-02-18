<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];

    $sql = "INSERT INTO staff (name, email, phone, position) VALUES ('$name', '$email', '$phone', '$position')";

    if ($conn->query($sql) === TRUE) {
        echo "Staff added successfully! <a href='index.php'>View Staff</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
