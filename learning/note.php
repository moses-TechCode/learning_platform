<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- tailwindcss cdn link -->
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Learning Platform</title>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />
</head>
<body class="bg-gray-100 font-sans">

  <!-- Top Navigation -->
  <nav class="fixed top-0 left-0 w-full bg-gray-900 text-white shadow-md z-30 flex justify-between items-center  p-[10px]">
<div></div>
    <a href="../massaging/join.php" class="flex items-center gap-2 text-blue-600 hover:text-blue-800">
      <span class="material-symbols-rounded text-2xl">sms</span>
      <span class="hidden sm:inline">Discuss</span>
    </a>
  </nav>

  <!-- Main Content -->
  <main class="max-w-3xl mx-auto mt-[90px] mb-[90px] px-4">
    <!-- title -->
    <h1 class="text-center text-3xl font-bold text-gray-800 mb-6">Biology</h1>

    <!-- Notes Section -->
    <section class="space-y-4 bg-gray-800 rounded-2xl p-6 text-gray-100 shadow-md">
      <p class="leading-relaxed">
        Biology is the study of living organisms, including their structure, function, growth, and evolution. 
        It is often called the <span class="font-semibold text-yellow-300">"science of life"</span>.
      </p>
      <ul class="list-disc list-inside space-y-2 text-gray-200">
        <li>Cells are the basic unit of life.</li>
        <li>Genetics explains inheritance and variation.</li>
        <li>Evolution shows how species change over time.</li>
      </ul>
    </section>

    <!-- XP Reward -->
    <div class="mt-6 p-4 bg-yellow-100 rounded-xl shadow-md text-center animate-bounce">
      🎉 You earned <span class="font-bold text-yellow-700">+20 XP</span> for finishing this section!
    </div>

    <!-- Next Button -->
    <div class="mt-6">
      <button class="bg-blue-600 w-full h-[50px] rounded-2xl shadow-lg text-xl font-semibold text-white hover:bg-blue-700 transition">
        Next
      </button>
    </div>
  </main>

  <!-- Bottom Navigation -->
  <nav class="fixed bottom-0 left-0 w-full bg-white shadow-md z-50">
    <?php include_once("../Bottom_mune.php"); ?>
  </nav>

</body>
</html>