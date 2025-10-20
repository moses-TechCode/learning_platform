<?php
include_once("../connect/connect.php");

$error_message = ""; // Initialize error message

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // ✅ Hash the password before saving
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if user already exists
    $stmt = $con->prepare("SELECT * FROM users WHERE number_or_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error_message = "Email already registered. <a href='login.php' class='text-blue-600 underline'>Login here</a>";
    } else {
        // Handle image upload
        $targetDir = "uploads/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true); // Create folder if not exists
        }

        $imageName = basename($_FILES["profile_image"]["name"]);
        $targetFilePath = $targetDir . time() . "_" . $imageName;
        $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        // Allow only image types
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFilePath)) {
                // ✅ Insert user with hashed password
                $stmt = $con->prepare("INSERT INTO users (user_name, password, number_or_email, profile_image) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $username, $hashedPassword, $email, $targetFilePath);

                if ($stmt->execute()) {
                    header("Location: login.php");
                    exit();
                } else {
                    $error_message = "Database error: " . $stmt->error;
                }
            } else {
                $error_message = "Failed to upload image.";
            }
        } else {
            $error_message = "Only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }

    $stmt->close();
}
?>


<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register</title>
  </head>
  <body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="m-6 bg-white rounded-2xl shadow-lg p-6">
      <form action="" method="post" enctype="multipart/form-data" class="w-72">
        <div class="text-3xl text-center font-bold mb-4">Register</div>

        <label class="font-bold">Username</label>
        <input type="text" name="username"
               class="rounded-3xl border border-cyan-400 shadow-lg block p-3 m-3 w-full"
               required>

        <label class="font-bold block">Email</label>

        <!-- 🔴 This label shows your PHP message -->
        <?php if (!empty($error_message)) : ?>
          <p class="text-red-700 text-sm font-semibold m-3">
            <?php echo $error_message; ?>
          </p>
        <?php endif; ?>

        <input type="email" name="email"
               value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
               class="rounded-3xl border border-cyan-400 shadow-lg block p-3 m-3 w-full"
               required>

        <label class="font-bold">Password</label>
        <input type="password" name="password"
               class="rounded-3xl border border-cyan-400 shadow-lg block p-3 m-3 w-full"
               required>

        <label class="font-bold">Add Profile</label>
        <input type="file" name="profile_image"
               class="rounded-3xl border border-cyan-400 shadow-lg block p-3 m-3 w-full"
               required>

        <input type="submit" value="Register" name="register"
               class="bg-blue-700 text-white w-full h-10 rounded-3xl block p-1 m-3 text-center hover:bg-violet-800">

        <div class="flex justify-between">
          <a href="register.php" class="m-3 font-bold text-blue-700">Signup</a>
          <a href="login.php" class="m-3 font-bold text-blue-700">login</a>
        </div>
      </form>
    </div>
  </body>
</html>