<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location:../ form_submition/login.php");
    exit();
}

include_once("../connect/connect.php");


// Set how many notes to display per page
$limit = 1;

// Get current page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

// Get total number of notes
$c_sql = "SELECT COUNT(*) AS total FROM notes";
$result_total = mysqli_query($con, $c_sql);
$row_total = mysqli_fetch_assoc($result_total);
$total_records = $row_total['total'];
$total_pages = ceil($total_records / $limit);

// Calculate start for SQL query
$start = ($page - 1) * $limit;

// Fetch one note for current page
$sql = "SELECT notes.*, subjects.name AS subject_name 
        FROM notes 
        JOIN subjects ON notes.subject_id = subjects.id 
        ORDER BY notes.id ASC 
        LIMIT ?, ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "ii", $start, $limit);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    $note = mysqli_fetch_assoc($result);
} else {
    die("No notes found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title><?php echo htmlspecialchars($note['topic']); ?> | Learning Platform</title>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />
</head>
<body class="bg-gray-100 font-sans">

  <!-- Top Navigation -->
  <nav class="fixed top-0 left-0 w-full bg-gray-900 text-white shadow-md z-30 flex justify-between items-center p-[10px]">
    <div> 
      <a href="topics.php?subject_id=<?php echo $note['subject_id']; ?>" class="">
        <span class="material-symbols-rounded">arrow_back</span>
      </a>
    </div>
<a href="../massaging/join.php?note_id=<?php echo $note['id']; ?>" 
   class="flex items-center gap-2 text-blue-600 hover:text-blue-800">
    <span class="material-symbols-rounded text-2xl">sms</span>
    <span class="hidden sm:inline">Discuss</span>
</a>
  </nav>

  <!-- Main Content -->
  <main class="max-w-3xl mx-auto mt-[90px] mb-[90px] px-4">
    
    <!-- Title -->
    <h1 class="text-center text-3xl font-bold text-gray-800 mb-6">
      <?php echo htmlspecialchars($note['topic']); ?>
    </h1>

    <!-- Notes Section -->
    <section class="space-y-4 bg-gray-800 rounded-2xl p-6 text-gray-100 shadow-md">
      <!-- Sound Button -->
      <div class="flex justify-center mb-4">
        <button 
          onclick="readNote()" 
          class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-full shadow hover:bg-blue-700 transition"
        >
          <span class="material-symbols-rounded">sound_detection_loud_sound</span>
          <span>Read Aloud</span>
        </button>
      </div>

      <p class="leading-relaxed text-lg">
        <?php echo nl2br(htmlspecialchars($note['content'])); ?>
      </p>
    </section>

    <!-- XP Reward -->
    <?php if (!empty($note['xp_reward'])): ?>
    <div class="mt-6 p-4 bg-yellow-100 rounded-xl shadow-md text-center animate-bounce">
      🎉 You earned 
      <span class="font-bold text-yellow-700">
        <?php echo htmlspecialchars($note['xp_reward']); ?>
      </span> XP for finishing this section!
    </div>
    <?php endif; ?>

    <!-- Pagination Buttons -->
    <div class="mt-6 flex justify-center gap-4">
      <?php if ($page > 1): ?>
        <a href="?page=<?php echo $page - 1; ?>" 
           class="bg-gray-300 text-gray-900 px-4 py-2 rounded-lg hover:bg-gray-400 transition">
          ⬅️ Previous
        </a>
<a href="caim_reward.php?note_id=<?php echo $note['id']; ?>" 
   class="bg-gray-300 text-gray-900 px-4 py-2 rounded-lg hover:bg-gray-400 transition">
   Claim Reward
</a>
      <?php endif; ?>

      <?php if ($page < $total_pages): ?>
        <a href="?page=<?php echo $page + 1; ?>" 
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
          Next ➡️
        </a>
      <?php endif; ?>
    </div>


  </main>

  <!-- Bottom Navigation -->
  <nav class="fixed bottom-0 left-0 w-full bg-white shadow-md z-50">
    <?php include_once("Bottom_mune.php"); ?>
  </nav>

<script>
let isSpeaking = false;

function readNote() {
  const text = document.querySelector("section p").innerText;
  window.speechSynthesis.cancel();

  if (!isSpeaking) {
    const utterance = new SpeechSynthesisUtterance(text);
    utterance.lang = 'en-US';
    utterance.rate = 1;
    utterance.pitch = 1;
    window.speechSynthesis.speak(utterance);
    isSpeaking = true;
    utterance.onend = () => isSpeaking = false;
  } else {
    window.speechSynthesis.cancel();
    isSpeaking = false;
  }
}
</script>

</body>
</html>