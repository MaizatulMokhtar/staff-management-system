<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM staff WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff</title>
</head>
<body>
    <h2>Edit Staff</h2>
    <form action="update_staff.php" method="POST">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?= $row['name'] ?>" required><br>
        
        <label>Email:</label>
        <input type="email" name="email" value="<?= $row['email'] ?>" required><br>
        
        <label>Phone:</label>
        <input type="text" name="phone" value="<?= $row['phone'] ?>" required><br>
        
        <label>Position:</label>
        <input type="text" name="position" value="<?= $row['position'] ?>" required><br>
        
        <button type="submit">Update</button>
    </form>
    <a href="index.php">Back to Staff List</a>
</body>
</html>
