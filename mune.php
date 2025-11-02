<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Material Symbols -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <title>Seller Dashboard</title>
</head>
<body class="m-0 p-0 bg-gray-50">

  <div class="flex">

    <!-- Sidebar -->
    <div id="sidebar" class="fixed z-50 inset-y-0 left-0 transform -translate-x-full md:translate-x-0 md:relative w-64 bg-gray-100 shadow-2xl transition-transform duration-300">
      <div class="flex flex-col p-4">
        <a href="#" class="flex items-center p-3 m-2 rounded hover:bg-gray-200 transition justify-around">
          <span class="material-symbols-rounded">outdoor_garden</span>
          <span>mideopener pro</span>
        </a>
        <a href="leaderboarde/leaderboarde.php" class="flex items-center p-3 m-2 rounded hover:bg-gray-200 transition justify-around">
         <span class="material-symbols-rounded">leaderboard</span>
          <span>learderboard</span>
        </a>
        <a href="#" class="flex items-center p-3 m-2 rounded hover:bg-gray-200 transition justify-around">
          <span class="material-symbols-rounded">person_add</span>
          <span>invinte</span>
        </a>
        
        <hr>
        <a href="#" class="flex items-center p-3 m-2 rounded hover:bg-gray-200 transition">
          <span class="material-symbols-rounded mr-2">settings</span>
          <span class="hidden sm:inline">Settings</span>
        </a>
      </div>
    </div>

    <!-- Overlay for mobile when sidebar is open -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-25 z-10 hidden md:hidden" onclick="toggleSidebar()"></div>

    <!-- Main Content -->
    <nav class="fixed top-0 left-0 w-full bg-gray-900 text-white shadow-md z-30">
      <div class="max-w-6xl mx-auto px-4 flex justify-between items-center h-16">
        <!-- Logo / Brand -->
<?php if (isset($_SESSION['user_email'])): ?>
  <div class="flex items-center space-x-3">
    <a href="profile/profile.php" class="flex items-center space-x-2">
      <?php if (!empty($_SESSION['profile_image'])): ?>
        <img src="form_submition/<?php echo htmlspecialchars($_SESSION['profile_image']); ?>" 
             alt="Profile" 
             class="w-10 h-10 rounded-full border-2 border-white object-cover">
      <?php else: ?>
        <span class="material-symbols-rounded w-10 h-10 bg-gray-300 text-gray-700 flex items-center justify-center rounded-full text-3xl">
          person
        </span>
      <?php endif; ?>
    </a>
  </div>
<?php else: ?>
  <a href="form_submition/login.php" class="text-xl font-bold tracking-wide">Login</a>
<?php endif; ?>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex space-x-8">
          <li><a href="#" class="hover:text-gray-300 transition">Home</a></li>
          <li><a href="#" class="hover:text-gray-300 transition">About</a></li>
          <li><a href="#" class="hover:text-gray-300 transition">Services</a></li>
          <li><a href="#" class="hover:text-gray-300 transition">Contact</a></li>
        </ul>

        <!-- Mobile Menu Button -->
        <button class="md:hidden p-2 rounded hover:bg-gray-800 focus:outline-none" onclick="toggleSidebar()">
          <span class="material-symbols-rounded">menu</span>
        </button>
      </div>
    </nav>

  </div>

  <script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    function toggleSidebar() {
      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
    }
  </script>
</body>
</html>