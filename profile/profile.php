<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: ../form_submition/login.php");
    exit();
}
?>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--- link to icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- tailwindcss cdn link -->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
  </head>
  <body class=" flex justify-center items-center min-h-screen">
    <nav>
      <?php 
     include_once("mune.php") 
      ?>
    </nav>
   <div class="">
    <div class="w-40 h-40 rounded-full overflow-hidden shadow-lg bg-gray-300 flex items-center justify-center">
          <?php if (!empty($_SESSION['profile_image'])): ?>
        <!-- User uploaded image -->
        <img src="<?php echo htmlspecialchars($_SESSION['profile_image']); ?>" 
             alt="Profile" 
             class="w-full h-full object-cover">
    <?php else: ?>
        <!-- Default icon -->
        <span class="material-symbols-rounded text-white text-[120px]">
            person
        </span>
    <?php endif; ?>
    </div>
    <div>
      
    <!--number of subject the user is studing-->
    <div></div>
    <!--the leve the user is at and the basic information at him--
    <div></div>
    </div>
</div>
<nav>
  <?php
  include_once("Bottom_mune.php")
  ?>
</nav>
  </body>
</html>