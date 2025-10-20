<?php 
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location:../ form_submition/login.php");
    exit();
}
include_once("../connect/connect.php");  

// Get subject_id from the URL
if (isset($_GET['subject_id'])) {
    $subject_id = $_GET['subject_id'];

    // Fetch topics/notes under that subject
    $sql = "SELECT * FROM notes WHERE subject_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $subject_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Get the subject name (optional, for the heading)
    $subject_sql = "SELECT name FROM subjects WHERE id = ?";
    $subject_stmt = mysqli_prepare($con, $subject_sql);
    mysqli_stmt_bind_param($subject_stmt, "i", $subject_id);
    mysqli_stmt_execute($subject_stmt);
    $subject_result = mysqli_stmt_get_result($subject_stmt);
    $subject = mysqli_fetch_assoc($subject_result);
} else {
    die("No subject selected.");
}
?>  

<!DOCTYPE html>  
<html>  
  <head>  
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title><?php echo htmlspecialchars($subject['name']); ?></title>  
  </head>  
  <body>  
<nav>  
  <?php include_once("mune.php"); ?>  
</nav>  

<div class="w-full h-[70vh] rounded-3xl mt-[70px] mb-[69px] bg-gray-300 fixed p-[24px] overflow-y-auto">  
  <h1 class="text-3xl font-bold text-center mb-6">
    <?php echo htmlspecialchars($subject['name']); ?>
  </h1>      

  <?php if (mysqli_num_rows($result) > 0): ?>  
    <?php while ($row = mysqli_fetch_assoc($result)): ?>  
      <a href="note_view.php?note_id=<?php echo $row['id']; ?>"   
         class="flex items-center justify-between w-full h-[50px] px-4 m-2 bg-gray-100 shadow rounded-xl font-medium hover:bg-gray-200 transition">  
        <span><?php echo htmlspecialchars($row['topic']); ?></span>  
        <i class="lucide-book-open w-5 h-5 text-indigo-600"></i>  
      </a>  
    <?php endwhile; ?>  
  <?php else: ?>  
    <p>No topics found under this subject.</p>  
  <?php endif; ?>  
</div>  

<nav>  
  <?php include_once("Bottom_mune.php"); ?>  
</nav>  

<!-- Lucide Icons -->  
<script src="https://unpkg.com/lucide@latest"></script>  
<script>lucide.createIcons();</script>  

  </body>  
</html>