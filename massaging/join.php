<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: ../form_submition/login.php");
    exit();
}
include_once("../connect/connect.php");

// Get note ID from URL
if (!isset($_GET['note_id'])) die("No note selected.");
$note_id = (int)$_GET['note_id'];

// Get the note and its topic
$note_result = $con->query("SELECT notes.topic, notes.subject_id, subjects.name AS subject_name 
                            FROM notes 
                            JOIN subjects ON notes.subject_id = subjects.id
                            WHERE notes.id = $note_id");
$note = $note_result->fetch_assoc();
if (!$note) die("Note not found.");

// Save message when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $con->real_escape_string($_POST['message']);
    $user_email = $con->real_escape_string($_SESSION['user_email']);
    $topic_id = $note['subject_id'];
    $con->query("INSERT INTO discussions (topic_id, user_email, message) VALUES ($topic_id, '$user_email', '$message')");
    // redirect to avoid resubmission
    header("Location: join.php?note_id=$note_id");
    exit();
}

// Fetch all messages for this note's topic
$topic_id = $note['subject_id'];
$messages_result = $con->query("SELECT * FROM discussions WHERE topic_id = $topic_id ORDER BY created_at ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<script src="https://cdn.tailwindcss.com"></script>
<title>Discussion: <?php echo htmlspecialchars($note['topic']); ?></title>
</head>
<body class="bg-gray-100 font-sans">

<main class="max-w-3xl mx-auto mt-24 px-4 pb-32">

<h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">
    Discussion: <?php echo htmlspecialchars($note['topic']); ?>
</h1>

<!-- Messages -->
<div id="messages" class="space-y-4 bg-white p-6 rounded-2xl shadow-lg max-h-[60vh] overflow-y-auto">
    <?php
    if ($messages_result->num_rows > 0) {
        while ($row = $messages_result->fetch_assoc()) {
            echo '<div class="bg-gray-100 p-4 rounded-xl shadow-sm">
                    <p class="text-gray-800"><strong>'.htmlspecialchars($row['user_email']).':</strong> '.htmlspecialchars($row['message']).'</p>
                  </div>';
        }
    } else {
        echo '<p class="text-gray-500 text-center">No discussions yet. Be the first to post!</p>';
    }
    ?>
</div>

<!-- Discussion Form -->
<form action="?note_id=<?php echo $note_id; ?>" method="POST" class="bg-white p-4 rounded-xl shadow-md mt-6 flex items-center justify-between gap-1 w-auto sticky bottom-4">
    <input type="text" name="message" placeholder="Type your message..." class="flex-grow bg-gray-100 border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
    <button type="submit" class="bg-blue-600 text-white px-3 py-2 rounded-xl hover:bg-blue-700 transition"><span class="material-symbols-rounded">arrow_circle_up</span></button>
</form>

</main>
</body>
</html>