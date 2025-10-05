<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tailwindcss cdn link -->
    <script src="https://cdn.tailwindcss.com"></script>
    
  <link rel="stylesheet" href="css/index.css">
  <script src="js/index.js"></script>
  <title>learning </title>
</head>
<body>
	<nav>
	  <?php
	  include_once("mune.php");
	  ?>
	</nav>
<div class="w-full h-[70vh] fixed mt-[70px] mb-[69px] p-6 bg-gradient-to-br from-gray-200 to-gray-300 rounded-3xl shadow-xl overflow-y-auto">
  <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Choose Your Grade</h1>

  <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

    <!-- Grade 10 -->
    <a href="learning/learning.php" class="group">
      <div class="flex items-center justify-center h-[60px] rounded-2xl bg-white shadow-md border border-gray-100 transition transform group-hover:-translate-y-1 group-hover:shadow-xl">
        <span class="text-2xl font-semibold text-gray-700 group-hover:text-blue-600">Grade 10</span>
      </div>
    </a>

    <!-- Grade 11 -->
    <a href="#" class="group">
      <div class="flex items-center justify-center h-[60px] rounded-2xl bg-white shadow-md border border-gray-100 transition transform group-hover:-translate-y-1 group-hover:shadow-xl">
        <span class="text-2xl font-semibold text-gray-700 group-hover:text-green-600">Grade 11</span>
      </div>
    </a>

    <!-- Grade 12 -->
    <a href="#" class="group">
      <div class="flex items-center justify-center h-[60px] rounded-2xl bg-white shadow-md border border-gray-100 transition transform group-hover:-translate-y-1 group-hover:shadow-xl">
        <span class="text-2xl font-semibold text-gray-700 group-hover:text-purple-600">Grade 12</span>
      </div>
    </a>

    <!-- Form 1 -->
    <a href="#" class="group">
      <div class="flex items-center justify-center h-[60px] rounded-2xl bg-white shadow-md border border-gray-100 transition transform group-hover:-translate-y-1 group-hover:shadow-xl">
        <span class="text-2xl font-semibold text-gray-700 group-hover:text-pink-600">Form 1</span>
      </div>
    </a>

    <!-- Form 2 -->
    <a href="#" class="group">
      <div class="flex items-center justify-center h-[60px] rounded-2xl bg-white shadow-md border border-gray-100 transition transform group-hover:-translate-y-1 group-hover:shadow-xl">
        <span class="text-2xl font-semibold text-gray-700 group-hover:text-teal-600">Form 2</span>
      </div>
    </a>
  </div>
</div>
	<nav>
	  <?php
	  include_once("Bottom_mune.php");
	  ?>
	</nav>
</body>
</html>