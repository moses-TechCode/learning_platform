<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location:../ form_submition/login.php");
    exit();
}
include_once("../connect/connect.php");

$sql = "SELECT * FROM subjects";
$result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
  </head>
  <body>
    <nav>
      <?php include_once("mune.php"); ?>
    </nav>

    <div class="w-full h-[70vh] rounded-3xl mt-[70px] mb-[69px] bg-gray-300 fixed p-[24px] overflow-y-auto">
      <h1 class="text-3xl font-bold text-center mb-6">Courses</h1>

      <!-- Dynamic Subjects from Database -->
      <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <a href="topics.php?subject_id=<?php echo $row['id']; ?>" 
             class="flex items-center justify-between w-full h-[50px] px-4 m-2 bg-gray-100 shadow rounded-xl font-medium hover:bg-gray-200 transition">
            <span><?php echo htmlspecialchars($row['name']); ?></span>
            <i class="lucide-book-open w-5 h-5 text-indigo-600"></i>
          </a>
        <?php endwhile; ?>
      <?php else: ?>
        <p>No subjects found.</p>
      <?php endif; ?>
    </div>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>lucide.createIcons();</script>

    <nav>
      <?php include_once("Bottom_mune.php"); ?>
    </nav>
  </body>
</html>