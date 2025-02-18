<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add this to your <head> section -->
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

        <!-- Main Content Area -->
        <div class="flex-1 p-8 overflow-y-auto">
            <!-- Your main content goes here -->
            <h2 class="text-2xl font-semibold">Welcome!</h2>
            <p class="mt-4">Administration for Shinsaege Corporation</p>

            <hr class="border-t-2 border-gray-300 mt-4">  <!-- Horizontal line -->

<!-- Add New Staff Button -->
<div class="p-5 flex justify-end">
<button id="addStaffModal" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600" onclick="openAddModal()">New Staff</button>
</div>


            <!-- Staff List Table -->
            <div class="p-10">
                <div class="w-full rounded overflow-hidden shadow-lg bg-white p-3">
                    <h2 class="text-xl font-semibold text-gray-800 flex justify-center">Staff List</h2>
                    <p class="text-gray-600 flex justify-center">Staffs of Shinsaege Corporation</p>
                    <br>
                    <div class="overflow-x-auto"> <!-- Enables horizontal scroll if needed -->
                        <table class="min-w-full table-auto border-collapse">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 text-left">ID</th>
                                    <th class="px-4 py-2 text-left">Name</th>
                                    <th class="px-4 py-2 text-left">Email</th>
                                    <th class="px-4 py-2 text-left">Phone</th>
                                    <th class="px-4 py-2 text-left">Position</th>
                                    <th class="px-4 py-2 text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = $conn->query("SELECT * FROM staff");
                                while ($row = $result->fetch_assoc()):
                                ?>
                                <tr class="border-t hover:bg-gray-50">
                                    <td class="px-4 py-2"><?= $row['id'] ?></td>
                                    <td class="px-4 py-2"><?= $row['name'] ?></td>
                                    <td class="px-4 py-2"><?= $row['email'] ?></td>
                                    <td class="px-4 py-2"><?= $row['phone'] ?></td>
                                    <td class="px-4 py-2"><?= $row['position'] ?></td>
                                    <td class="px-4 py-2">
                                       <!-- Edit Button (trigger modal) -->
                                        <button class="bg-yellow-500 text-white p-2 rounded-lg hover:bg-yellow-600" onclick="openModal(<?= $row['id'] ?>)">Edit</button>
    
                                        <a href="delete_staff.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">
                                            <button class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600">Delete</button>
                                        </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Cards Section -->
        <div class="p-10 flex gap-4">
            <div class="flex-1 p-5 bg-white shadow-lg rounded">
                <h3 class="text-lg font-semibold">Card 1</h3>
                <p>Card content goes here</p>
            </div>
            <div class="flex-1 p-5 bg-white shadow-lg rounded">
                <h3 class="text-lg font-semibold">Card 2</h3>
                <p>Card content goes here</p>
            </div>
        </div>

    </div>


<!-- Modal Structure for Add New Staff -->
<div id="addStaffModal" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
    <!-- Modal Background (clicking this will close the modal) -->
    <div class="absolute inset-0" onclick="closeAddModal()"></div>

    <!-- Modal Content -->
    <div class="bg-white p-6 rounded-lg w-11/12 md:w-1/3 relative">
        <!-- Close Button (top-right corner) -->
        <button onclick="closeAddModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
            &times; <!-- Close icon -->
        </button>

        <h3 class="text-xl font-semibold mb-4">Add New Staff</h3>
        <!-- Add Staff Form -->
        <form id="addStaffForm" method="POST">
            <!-- Staff Info -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" id="phone" name="phone" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>

            <div class="mb-4">
                <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                <input type="text" id="position" name="position" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Add Staff</button>
                <button type="button" onclick="closeAddModal()" class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal for displaying the success/error message -->
<div id="responseModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeResponseModal()">&times;</span>
        <h2 id="responseMessage"></h2>
    </div>
</div>






    <!-- Edit Modal Structure -->
    <?php
    $result = $conn->query("SELECT * FROM staff");
    while ($row = $result->fetch_assoc()):
    ?>
    <div id="editModal-<?= $row['id'] ?>" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
        <!-- Modal Background (clicking this will close the modal) -->
        <div class="absolute inset-0" onclick="closeModal(<?= $row['id'] ?>)"></div>

        <!-- Modal Content -->
        <div class="bg-white p-6 rounded-lg w-11/12 md:w-1/3 relative">
            <!-- Close Button (top-right corner) -->
            <button onclick="closeModal(<?= $row['id'] ?>)" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                &times; <!-- Close icon -->
            </button>

            <h3 class="text-xl font-semibold mb-4">Edit Staff</h3>
            <!-- Edit Form -->
            <form action="update_staff.php" method="POST">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">

                <!-- Staff Info -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" value="<?= $row['name'] ?>" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="<?= $row['email'] ?>" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" id="phone" name="phone" value="<?= $row['phone'] ?>" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>

                <div class="mb-4">
                    <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                    <input type="text" id="position" name="position" value="<?= $row['position'] ?>" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>

                <!-- Submit Button -->
                <div class="flex justify-between">
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600">Save Changes</button>
                    <button type="button" onclick="closeModal(<?= $row['id'] ?>)" class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <?php endwhile; ?>
    

    <script>
// Open Add New Staff Modal
function openAddModal() {
    document.getElementById('addStaffModal').classList.remove('hidden');
}

// Close Add New Staff Modal
function closeAddModal() {
    document.getElementById('addStaffModal').classList.add('hidden');
}
// Close the response message modal
function closeResponseModal() {
    document.getElementById('responseModal').style.display = 'none';
}

// Handle form submission
document.getElementById('addStaffForm').onsubmit = function(event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // Use fetch to send the form data to add_staff.php
    fetch('add_staff.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) // Expect a JSON response
    .then(data => {
        // Display the response message in the modal
        var modal = document.getElementById('responseModal');
        var message = document.getElementById('responseMessage');
        message.textContent = data.message;

        // Show the modal
        modal.style.display = 'block';

        // Optionally reset form or perform other actions
        if (data.status === 'success') {
            document.getElementById('addStaffForm').reset(); // Reset the form after successful submission
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
};
</script>




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
