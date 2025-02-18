<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Staff Management</title>
</head>
<body class="bg-gray-100 h-screen flex flex-col">

     <!-- Top Navigation Bar -->
     <nav class="bg-gray-800 p-4 text-white flex justify-center">
        <div class="container mx-auto">
            <h1 class="text-2xl">Staff Management</h1>
        </div>
    </nav>

    <!-- Main Layout with Sidebar and Content -->
    <div class="flex flex-1">

        <!-- Sidebar -->
        <div id="sidebar" class="bg-gray-800 text-white w-64 min-h-screen transition-all duration-300 ease-in-out">
            <div class="p-4">
                <button id="toggleSidebar" class="text-white bg-gray-800  p-1 hover:bg-gray-500">
                    <span class="text-xl">&#9776;</span> <!-- Hamburger icon -->
                </button>
            </div>

            <!-- Sidebar Links (Expanded state) -->
            <div id="sidebarContent" class="space-y-4 mt-8 px-4">
                <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Dashboard</a>
                <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Staff List</a>
                <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Settings</a>
            </div>
        </div>

        <div class="flex-1 p-8 overflow-y-auto">
            <!-- Your main content goes here -->
            <h2 class="text-2xl font-semibold">Welcome!</h2>
            <p class="mt-4">Administration for Shinsaege Corporation</p>

            <hr class="border-t-2 border-gray-300 mt-4">  <!-- Horizontal line -->

            <div class="p-5 flex justify-end">
                <a href="add_staff.php">
                    <button class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">New Staff</button>
                </a>
            </div>
            

          <!-- Staff List Table -->
          <div class="p-10">
                <div class="w-full rounded overflow-hidden shadow-lg bg-white p-3">
                    <h2 class="text-xl font-semibold text-gray-800 flex justify-center">Staff List</h2>
                    <p class="text-gray-600 flex justify-center">Staffs of Shinsaege Corporation</p>
                    <br>
                    <div class="overflow-x-auto"> <!-- Enables horizontal scroll if needed -->
                        <table class="min-w-full table-auto border-collapse">
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">ID</th>
                                <th class="px-4 py-2 text-left">Name</th>
                                <th class="px-4 py-2 text-left">Email</th>
                                <th class="px-4 py-2 text-left">Phone</th>
                                <th class="px-4 py-2 text-left">Position</th>
                                <th class="px-4 py-2 text-left">Action</th>
                            </tr>
                            <?php
                            $result = $conn->query("SELECT * FROM staff");
                            while ($row = $result->fetch_assoc()):
                            ?>
                            <tr>
                                <td class="px-4 py-2 text-left"><?= $row['id'] ?></td>
                                <td class="px-4 py-2 text-left"><?= $row['name'] ?></td>
                                <td class="px-4 py-2 text-left"><?= $row['email'] ?></td>
                                <td class="px-4 py-2 text-left"><?= $row['phone'] ?></td>
                                <td class="px-4 py-2 text-left"><?= $row['position'] ?></td>
                                <td class="px-4 py-2 text-left">
                                    <a href="edit_staff.php?id=<?= $row['id'] ?>">
                                        <button class="bg-yellow-500 text-white p-2 rounded-lg hover:bg-yellow-600">Edit</button>
                                    </a>
                                    <a href="delete_staff.php?id=<?= $row['id'] ?>">
                                        <button class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600">Delete</button>
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
                </div>
            </div>
   
</div>

    


     <!-- JavaScript to Toggle Sidebar -->
     <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarContent = document.getElementById('sidebarContent');
        const toggleButton = document.getElementById('toggleSidebar');

        // Function to toggle sidebar width and content visibility
        toggleButton.addEventListener('click', function() {
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('w-20');
            sidebarContent.classList.toggle('hidden');
        });
    </script>


</body>
</html>
