<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location:../ form_submition/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>community</title>
  </head>
  <body class="bg-blue-900">
    <nav>
      <?php 
      include_once("mune.php")
      ?>
    </nav>
<div class=" w-full h-[70vh] rounded-3xl mt-[70px] mb-[69px]  fixed p-[24px]">

   <h1 class="font-bold text-6xl font-mono text-white text-start">
   coming soon
   </h1>

	</div>
    <nav>
      <?php 
      include_once("Bottom_mune.php")
      ?>
    </nav>
  </body>
</html>