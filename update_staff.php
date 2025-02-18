<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];

    $sql = "UPDATE staff SET name='$name', email='$email', phone='$phone', position='$position' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Staff updated! <a href='index.php'>View Staff</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
