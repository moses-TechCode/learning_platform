<?php
session_start();
include_once("../connect/connect.php");

if (!isset($_SESSION['user_email'])) {
    die("Not logged in");
}

$user_email = $_SESSION['user_email'];

// Get user ID
$user_query = mysqli_query($con, "SELECT id FROM users WHERE email='$user_email'");
$user_data = mysqli_fetch_assoc($user_query);
$user_id = $user_data['id'];

$note_id = (int)$_POST['note_id'];

// Get XP reward for this note
$note_query = mysqli_query($con, "SELECT xp_reward FROM notes WHERE id=$note_id");
$note_data = mysqli_fetch_assoc($note_query);
$xp = (int)$note_data['xp_reward'];

// Check if XP already earned for this note
$check = mysqli_query($con, "SELECT * FROM earned_xp WHERE user_id=$user_id AND note_id=$note_id");
if (mysqli_num_rows($check) > 0) {
    echo "You already earned XP for this note.";
    exit;
}

// Add XP to user's total
mysqli_query($con, "UPDATE users SET total_xp = total_xp + $xp WHERE id = $user_id");

// Log the XP earned
mysqli_query($con, "INSERT INTO earned_xp (user_id, note_id, xp_amount, earned_at)
VALUES ($user_id, $note_id, $xp, NOW())");

// Get new total
$result = mysqli_query($con, "SELECT total_xp FROM users WHERE id = $user_id");
$row = mysqli_fetch_assoc($result);

echo "🎉 You earned $xp XP! Total XP: " . $row['total_xp'];
?>