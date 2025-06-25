<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}"   class="">
<head>
    <script>
    (function () {
      try {
        const theme = localStorage.getItem('theme');
        if (theme === 'dark') {
          document.documentElement.classList.add('dark');
        } else {
          document.documentElement.classList.remove('dark');
        }
      } catch (_) {}
    })();
  </script>
  <meta charset="UTF-8" />
  <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="{{asset('images/logo.png')}}" type="image/png" >
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700;900&display=swap" rel="stylesheet">

  <title>{{config('app.name')}} -  @yield('title')</title>
  <!-- Tailwind CSS CDN -->

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
  @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');
    body {
      font-family: 'Cairo', sans-serif;

    }
    /* Custom focus outline for better accessibility */
    :focus-visible {
      outline: 2px solid #0f766e; /* teal-700 */
      outline-offset: 2px;
    }
  </style>
  <style media="screen">

    .h-my-height{
      height: 450px;
    }



    @media (max-width: 540px) {

      h2 {
        font-size: 1.75rem;
      }
      p {
        font-size: 1rem;
      }
    }


    [x-cloak] { display: none !important; }
  </style>
</head>
<body class="min-h-screen bg-body  text-body font-cairo flex flex-col ">



  @include('welcome_heade')
  <div class="bg-body">
    @php
    $conver_image = "";
    if(app()->getLocale() === 'en'){
      $conver_image = "";
    }
    else if(app()->getLocale() === 'ar'){
      $conver_image = "-scale-x-100";
    }
    @endphp

    @include('layouts.alert')

    @yield('content')
    <div x-data="{ showTopButton: false }" x-init="
        window.addEventListener('scroll', () => {
          showTopButton = window.scrollY > 200;
        });">

      <button
        x-show="showTopButton"
        @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="fixed bottom-5 right-5 theme-btn text-white p-3 rounded-full shadow-lg transition"
        aria-label="Scroll to top"
      >
         <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
         </svg>

      </button>

    </div>
  </div>

  @include('layouts.footer')
<script>
  function toggleTheme() {
    const html = document.documentElement;
    const currentTheme = html.classList.contains('dark') ? 'dark' : 'light';
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

    html.classList.toggle('dark');
    localStorage.setItem('theme', newTheme);

    // خزّنه ككوكي كمان عشان Blade يستخدمه
    // document.cookie = `theme=${newTheme};path=/;max-age=31536000`;
  }
</script>
</body>
</html>
