<?php 
session_start();
include_once("../connect/connect.php");

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "Please fill in both fields.";
        exit;
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $con->prepare("SELECT * FROM users WHERE number_or_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Verify the hashed password
        if (password_verify($password, $row['password'])) {
            // ✅ Store user info in session
            $_SESSION['user_email'] = $email;
            $_SESSION['role'] = $row['role'];
            $_SESSION['profile_image'] = $row['profile_image'];

            // Redirect based on role
            if (strtolower($row['role']) == "user") {
                header("Location: ../index.php");
                exit;
            } elseif (strtolower($row['role']) == "admin") {
                header("Location: ../Admin/admin.php");
                exit;
            } else {
                echo "Invalid user role.";
            }
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with that email.";
    }
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
  <body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="m-6 bg-white rounded-2xl shadow-lg p-6" enctype="multipart/form-data">
      <form action="" method="post" class="w-72">
        <div class="text-3xl text-center font-bold mb-4">Login</div>

        <label class="font-bold">Email</label>
        <input type="text" name="email" class="rounded-3xl border border-cyan-400 shadow-lg block p-3 m-3 w-full" required>

        <label class="font-bold">Password</label>
        <input type="password" name="password" class="rounded-3xl border border-cyan-400 shadow-lg block p-3 m-3 w-full" required>

        <input type="submit" value="Login" name="login" class="bg-blue-700 text-white w-full h-10 rounded-3xl block p-1 m-3 text-center hover:bg-violet-800">

        <div class="flex justify-between">
          <a href="register.php" class="m-3 font-bold text-blue-700">Signup</a>
          <a href="#" class="m-3 font-bold text-blue-700">Forgot password?</a>
        </div>
      </form>
    </div>
  </body>
</html>