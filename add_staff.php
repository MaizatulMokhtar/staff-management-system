<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff</title>
</head>
<body>
    <h2>Add New Staff</h2>
    <form action="save_staff.php" method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        
        <label>Email:</label>
        <input type="email" name="email" required><br>
        
        <label>Phone:</label>
        <input type="text" name="phone" required><br>
        
        <label>Position:</label>
        <input type="text" name="position" required><br>
        
        <button type="submit">Save Staff</button>
    </form>
    <a href="index.php">Back to Staff List</a>
</body>
</html>
