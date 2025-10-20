<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: ../form_submition/login.php");
    exit();
}

include_once('../connect/connect.php');

$user_email = $_SESSION['user_email'];
$note_id = isset($_GET['note_id']) ? (int)$_GET['note_id'] : 0;

if ($note_id <= 0) {
    die("Invalid note ID.");
}

// 1️⃣ Get XP reward for the note
$stmt = $con->prepare("SELECT xp_reward FROM notes WHERE id = ?");
$stmt->bind_param("i", $note_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Note not found.");
}

$note = $result->fetch_assoc();
$xp_reward = (int)$note['xp_reward'];

// 2️⃣ Get user's current total XP (use email instead of id)
$stmt = $con->prepare("SELECT total_xp FROM users WHERE number_or_email = ?");
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("User not found.");
}

$user = $result->fetch_assoc();
$total_xp = (int)$user['total_xp'];

// 3️⃣ Add XP reward
$new_total_xp = $total_xp + $xp_reward;

// 4️⃣ Update user XP
$stmt = $con->prepare("UPDATE users SET total_xp = ? WHERE number_or_email = ?");
$stmt->bind_param("is", $new_total_xp, $user_email);
$stmt->execute();

// 5️⃣ Redirect to success page or back
header("Location: ads.php?message=Reward+claimed!");
exit();
?>