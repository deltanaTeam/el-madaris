<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" class="dark bg-body">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
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
<body class="min-h-screen   text-body font-cairo flex flex-col ">



  @include('welcome_heade')
  <div class="bg-body">
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

</body>
</html>
