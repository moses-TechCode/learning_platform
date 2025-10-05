<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
  </head>
  <body>
    <nav>
      <?php 
      include_once("../mune.php");
      ?>
    </nav>
    <div class="w-full h-[70vh] rounded-3xl mt-[70px] mb-[69px] bg-gray-300 fixed p-[24px] overflow-y-auto">
  <h1 class="text-3xl font-bold text-center mb-6">Courses</h1>

  <!-- Sciences Dropdown -->
  <details class="mb-4 border rounded-2xl shadow-md bg-white">
    <summary class="cursor-pointer px-4 py-3 text-lg font-semibold bg-gray-100 rounded-t-2xl">
      Sciences
    </summary>
    <div class="p-2">
      <a href="Subject.php" class="flex items-center justify-between w-full h-[50px] px-4 m-2 bg-gray-100 shadow rounded-xl font-medium hover:bg-gray-200 transition">
        <span>Biology</span>
        <i class="lucide-dna w-5 h-5 text-green-600"></i>
      </a>
      <a href="#" class="flex items-center justify-between w-full h-[50px] px-4 m-2 bg-gray-100 shadow rounded-xl font-medium hover:bg-gray-200 transition">
        <span>Physics</span>
        <i class="lucide-atom w-5 h-5 text-blue-600"></i>
      </a>
      <a href="#" class="flex items-center justify-between w-full h-[50px] px-4 m-2 bg-gray-100 shadow rounded-xl font-medium hover:bg-gray-200 transition">
        <span>Chemistry</span>
        <i class="lucide-flask-conical w-5 h-5 text-purple-600"></i>
      </a>
    </div>
  </details>

  <!-- Other Subjects -->
  <div class="space-y-3">
    <a href="#" class="flex items-center justify-between w-full h-[50px] px-4 bg-gray-100 shadow rounded-2xl text-xl font-bold hover:bg-gray-200 transition">
      <span>English</span>
      <i class="lucide-book-open w-6 h-6 text-indigo-600"></i>
    </a>
    <a href="#" class="flex items-center justify-between w-full h-[50px] px-4 bg-gray-100 shadow rounded-2xl text-xl font-bold hover:bg-gray-200 transition">
      <span>History</span>
      <i class="lucide-landmark w-6 h-6 text-yellow-600"></i>
    </a>
    <a href="#" class="flex items-center justify-between w-full h-[50px] px-4 bg-gray-100 shadow rounded-2xl text-xl font-bold hover:bg-gray-200 transition">
      <span>R.E</span>
      <i class="lucide-cross w-6 h-6 text-red-600"></i>
    </a>
    <a href="#" class="flex items-center justify-between w-full h-[50px] px-4 bg-gray-100 shadow rounded-2xl text-xl font-bold hover:bg-gray-200 transition">
      <span>Civic Education</span>
      <i class="lucide-users w-6 h-6 text-teal-600"></i>
    </a>
    <a href="#" class="flex items-center justify-between w-full h-[50px] px-4 bg-gray-100 shadow rounded-2xl text-xl font-bold hover:bg-gray-200 transition">
      <span>Home Management</span>
      <i class="lucide-home w-6 h-6 text-pink-600"></i>
    </a>
  </div>
</div>

<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
  lucide.createIcons();
</script>

    <nav>
      <?php 
      include_once("../Bottom_mune.php");
      ?>
    </nav>
  </body>
</html>