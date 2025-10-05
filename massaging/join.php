<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Discussion Page</title>
</head>
<body class="bg-gray-100 font-sans">

  <!-- Top Navigation -->
  <nav class="bg-white shadow-md px-6 py-4 fixed top-0 left-0 w-full z-50">
    <?php include_once("../mune.php"); ?>
  </nav>

  <!-- Main Content -->
  <main class="max-w-3xl mx-auto mt-[90px] px-4 mb-[90px]">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Discussion: Biology</h1>

    <!-- Discussion Form -->
    <form action="discussion.php" method="POST" class="bg-white p-6 rounded-xl shadow-md mb-6">
      <textarea 
        name="message" 
        placeholder="Share your thoughts about this topic..." 
        class="w-full h-32 p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4"
        required></textarea>
      <button 
        type="submit" 
        class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700 transition">
        Post
      </button>
    </form>

    <!-- Discussion Threads -->
    <div class="space-y-4">
      <?php
        // connect to database
        $conn = new mysqli("0.0.0.0", "root", "root", "learning_platform");

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // save message when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $message = $conn->real_escape_string($_POST["message"]);
          $conn->query("INSERT INTO discussions (message) VALUES ('$message')");
        }

        // fetch all messages
        $result = $conn->query("SELECT * FROM discussions ORDER BY id DESC");
        while ($row = $result->fetch_assoc()) {
          echo '<div class="bg-gray-200 p-4 rounded-xl shadow">';
          echo '<p class="text-gray-800">'. htmlspecialchars($row["message"]) .'</p>';
          echo '</div>';
        }

        $conn->close();
      ?>
    </div>
  </main>

  <!-- Bottom Navigation -->
  <nav class="fixed bottom-0 left-0 w-full bg-white shadow-md z-50">
    <?php include_once("../Bottom_mune.php"); ?>
  </nav>

</body>
</html>