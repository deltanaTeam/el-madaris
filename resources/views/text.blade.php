<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>منصة الكورسات</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: {
            sans: ['Tajawal', 'sans-serif'],
          },
        },
      },
    };
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-white dark:bg-gray-900 text-gray-800 dark:text-white font-sans">

  <!-- Navbar -->
  <header class="bg-white dark:bg-gray-800 shadow">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold">منصة الكورسات</h1>
      <nav class="space-x-4 space-x-reverse hidden md:flex">
        <a href="#" class="hover:text-blue-500">الرئيسية</a>
        <a href="#" class="hover:text-blue-500">الكورسات</a>
        <a href="#" class="hover:text-blue-500">المدرسين</a>
        <a href="#" class="hover:text-blue-500">من نحن</a>
      </nav>
      <button id="toggleTheme" class="ml-4 p-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
        🌙
      </button>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="text-center py-20 bg-gray-100 dark:bg-gray-800">
    <h2 class="text-4xl font-bold mb-4">تعلّم من أفضل المدرسين</h2>
    <p class="text-lg text-gray-600 dark:text-gray-300 mb-8">كورسات احترافية في مختلف المجالات</p>
    <a href="#" class="px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700">ابدأ الآن</a>
  </section>

  <!-- Courses Section -->
  <section class="max-w-7xl mx-auto px-4 py-16">
    <h3 class="text-3xl font-bold mb-8 text-center">الكورسات المميزة</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-6">
        <h4 class="text-xl font-bold mb-2">كورس تصميم واجهات</h4>
        <p class="text-gray-600 dark:text-gray-300">تعلم تصميم واجهات باستخدام Figma وTailwind</p>
      </div>
      <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-6">
        <h4 class="text-xl font-bold mb-2">كورس Laravel متقدم</h4>
        <p class="text-gray-600 dark:text-gray-300">بناء REST API كاملة باستخدام Laravel 12</p>
      </div>
      <div class="bg-white dark:bg-gray-700 shadow rounded-lg p-6">
        <h4 class="text-xl font-bold mb-2">كورس Vue.js</h4>
        <p class="text-gray-600 dark:text-gray-300">تعلم Vue من الصفر حتى الاحتراف</p>
      </div>
    </div>
  </section>

  <!-- Teachers Section -->
  <section class="bg-gray-50 dark:bg-gray-800 py-16">
    <div class="max-w-7xl mx-auto px-4">
      <h3 class="text-3xl font-bold mb-8 text-center">أفضل المدرسين</h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <div class="bg-white dark:bg-gray-700 rounded-lg p-6 text-center shadow">
          <img src="https://via.placeholder.com/100" class="mx-auto mb-4 rounded-full" />
          <h4 class="text-xl font-bold mb-2">أ. أحمد جمال</h4>
          <p class="text-gray-600 dark:text-gray-300">خبير Laravel وPHP</p>
        </div>
        <div class="bg-white dark:bg-gray-700 rounded-lg p-6 text-center shadow">
          <img src="https://via.placeholder.com/100" class="mx-auto mb-4 rounded-full" />
          <h4 class="text-xl font-bold mb-2">م. سارة يوسف</h4>
          <p class="text-gray-600 dark:text-gray-300">خبيرة تصميم واجهات</p>
        </div>
        <div class="bg-white dark:bg-gray-700 rounded-lg p-6 text-center shadow">
          <img src="https://via.placeholder.com/100" class="mx-auto mb-4 rounded-full" />
          <h4 class="text-xl font-bold mb-2">م. محمد طارق</h4>
          <p class="text-gray-600 dark:text-gray-300">مدرب JavaScript و Vue.js</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white dark:bg-gray-800 py-6 mt-8">
    <div class="text-center text-gray-600 dark:text-gray-400">
      © 2025 منصة الكورسات. جميع الحقوق محفوظة.
    </div>
  </footer>

  <!-- Toggle Theme Script -->
  <script>
    const toggle = document.getElementById('toggleTheme');
    toggle.addEventListener('click', () => {
      document.documentElement.classList.toggle('dark');
    });
  </script>
</body>
</html>
