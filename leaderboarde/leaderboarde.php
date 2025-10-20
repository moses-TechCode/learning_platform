<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location:../ form_submition/login.php");
    exit();
}
include_once("../connect/connect.php");
?>
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
<body class="m-0 p-0 bg-gray-400">
  <?php include_once("mune.php"); ?>

  <div class="w-full h-[70vh] mt-[70px] mb-[69px] p-6 bg-gradient-to-br from-gray-200 to-gray-300 rounded-3xl shadow-xl overflow-y-auto">
    <div class="w-full h-[60px] rounded-2xl shadow-2xl flex justify-between items-center p-5 bg-white">
      <div class="flex items-center space-x-3">
        <div class="font-bold text-gray-800">1</div>
        <div class="w-px h-6 bg-gray-500"></div>
        <div class="flex items-center space-x-2">
          <div class="rounded-full bg-gray-700 h-[50px] w-[50px] flex justify-center items-center text-white">
            <span class="material-symbols-rounded">person</span>
          </div>
          <p class="font-semibold">Moses</p>
        </div>
      </div>
      <div class="text-green-600 font-semibold">
        200 <span class="text-red-500 font-normal">xp</span>
      </div>
    </div>
  </div>

  <?php include_once("Bottom_mune.php"); ?>
</body>
</html>