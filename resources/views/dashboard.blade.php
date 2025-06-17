<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>LearnHub - Online Courses Platform</title>
  <!-- Tailwind CSS CDN -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    /* Custom focus outline for better accessibility */
    :focus-visible {
      outline: 2px solid #0f766e; /* teal-700 */
      outline-offset: 2px;
    }
  </style>
  <style media="screen">
    @keyframes scroll-x {
      0% {
        transform: translateX(0%);
      }
      100% {
        transform: translateX(-50%);
      }
    }
    .h-my-height{
      height: 450px;
    }

    .scroll-wrapper {
      overflow: hidden;
      position: relative;
    }
    .scroll-content {
      display: flex;
      width: max-content;
      animation: scroll-x 30s linear infinite;
    }

    @media (max-width: 640px) {
      .scroll-content {
        display: flex;
        width: max-content;
        max-width: 500px;
        animation: scroll-x 30s linear infinite;
      }
    }
    @media (max-width: 540px) {
      .scroll-content {
        display: flex;
        width: max-content;
        max-width: 400px;
        animation: scroll-x 30s linear infinite;
      }
      h2 {
    font-size: 1.75rem;
  }
  p {
    font-size: 1rem;
  }
    }
    @media (max-width: 440px) {
      .scroll-content {
        display: flex;
        width: max-content;
        max-width: 300px;
        animation: scroll-x 30s linear infinite;
      }
    }
    @media (max-width: 340px) {
      .scroll-content {
        display: flex;
        width: max-content;
        max-width: 200px;
        animation: scroll-x 30s linear infinite;
      }
    }
    @media (max-width: 240px) {
      .scroll-content {
        display: flex;
        width: max-content;
        max-width: 200px;
        animation: scroll-x 30s linear infinite;
      }
    }
    @media (max-width: 200px) {
      .scroll-content {
        display: flex;
        width: max-content;
        max-width: 180px;
        animation: scroll-x 30s linear infinite;
      }
    }
    @media (max-width: 180px) {
      .scroll-content {
        display: flex;
        width: max-content;
        max-width: 160px;
        animation: scroll-x 30s linear infinite;
      }
    }


    [x-cloak] { display: none !important; }
  </style>
</head>
<body class="min-h-screen   bg-slate-50 text-slate-900 font-sans flex flex-col dark:bg-teal-950 dark:text-teal-50">

  <header class="bg-teal-400 dark:bg-teal-900 dark:text-teal-50 text-white shadow-md sticky top-0 z-50 ">

    <nav class=" shadow-md" x-data="{ open: false }">
       <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
           <div class="flex justify-between h-20 items-center">

               <!-- Logo -->
               <div class="flex-shrink-0">
                   <a href="#">
                       <img class="h-10" src="/logo.png" alt="Logo">
                   </a>
               </div>



               <!-- Hamburger (Mobile) -->
               <div class="md:hidden">
                   <button @click="open = !open" class="text-gray-600 focus:outline-none">
                       <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M4 6h16M4 12h16M4 18h16"/>
                       </svg>
                       <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M6 18L18 6M6 6l12 12"/>
                       </svg>
                   </button>
               </div>

               <!-- Desktop Links -->
               <div class="hidden md:flex md:items-center md:space-x-6 rtl:space-x-reverse">
                 <!-- Language Dropdown -->
                 <div x-data="{ langOpen: false }" class="relative drop-nav">
                    <button @click="langOpen = !langOpen"
                            class="flex items-center space-x-2 rtl:space-x-reverse px-3 py-1 text-white hover:bg-teal-300 hover:text-teal-900 rounded-md focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">
                            {{ app()->getLocale() === 'ar' ? 'ع' : 'EN' }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="langOpen"
                         @click.away="langOpen = false"
                         class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                         @forelse(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                           class="block px-4 py-2 hover:bg-teal-100 text-gray-700">{{ $properties['native'] }}</a>

                         @empty
                         @endforelse
                    </div>
                 </div>
                 <!-- end Language Dropdown -->
                   <a href="#" class="hover:bg-teal-300 hover:text-teal-900 rounded-md px-3 py-1 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">{{ __('Home') }}</a>
                   <a href="#" class="hover:bg-teal-300 hover:text-teal-900 rounded-md px-3 py-1 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">{{ __('About') }}</a>
                   <a href="#" class="hover:bg-teal-300 hover:text-teal-900 rounded-md px-3 py-1 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">{{ __('Contact') }}</a>

                   <!-- Search -->
                   <form action="#" method="GET" class="flex items-center space-x-2 rtl:space-x-reverse">
                       <input type="text" name="search" placeholder="{{ __('Search...') }}"
                              class="border-teal-500 rounded p-2  focus:border-teal-500">
                       <button type="submit"
                               class="bg-teal-300 text-teal-600 px-3 py-2 rounded hover:border-transparent hover:bg-teal-600 hover:text-white active:bg-teal-700">{{ __('Search') }}</button>
                   </form>
               </div>
           </div>

           <!-- Mobile Menu (Toggles) -->
           <div x-show="open" class="md:hidden mt-4 space-y-2">
             <!-- Language Dropdown -->
             <div x-data="{ langOpen: false }" class="relative  w-full p-end-6/10">
                <button @click="langOpen = !langOpen"
                        class=" block flex items-center active:bg-teal-300 hover:bg-teal-300 hover:text-teal-900 rounded-md px-3 py-1 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">
                     {{ app()->getLocale() === 'ar' ? 'ع' : 'EN' }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="langOpen"
                     @click.away="langOpen = false"
                     class="absolute end-0 mt-2 w-full bg-white border border-gray-200 rounded-md shadow-lg z-50">
                    <a href=""
                       class="block px-4 py-2 hover:bg-teal-100 text-gray-700">English</a>
                    <a href=""
                       class="block px-4 py-2 hover:bg-teal-100 text-gray-700">العربية</a>
                </div>
             </div>
             <!-- end Language Dropdown -->
               <a href="#" class="block hover:bg-teal-300 hover:text-teal-900 rounded-md px-3 py-1 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">{{ __('Home') }}</a>
               <a href="#" class="block hover:bg-teal-300 hover:text-teal-900 rounded-md px-3 py-1 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">{{ __('About') }}</a>
               <a href="#" class="block hover:bg-teal-300 hover:text-teal-900 rounded-md px-3 py-1 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">{{ __('Contact') }}</a>
               <form action="#" method="GET" class="flex mt-2 items-center space-x-2 rtl:space-x-reverse">
                   <input type="text" name="search" placeholder="{{ __('Search...') }}"
                          class=" rounded p-2 w-full focus:outline-none focus:ring focus:border-teal-300">
                   <button type="submit"
                           class="bg-teal-300 text-teal-600 px-3 py-2 my-1 rounded hover:border-transparent hover:bg-teal-600 hover:text-white active:bg-teal-700">{{ __('Search') }}</button>
               </form>
           </div>
       </div>
    </nav>
  </header>
  <main class="max-w-7xl mx-auto px-6 py-12 flex-grow flex flex-col dark:text-teal-100">
    <!-- Hero Section -->
    <section id="hero" tabindex="-1" class="text-center mb-16 select-none">
      <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold dark:text-white text-teal-800 mb-4 leading-tight max-w-5xl mx-auto">مرحبًا بك في منصة المدرسة الإلكترونية</h2>
      <p class="text-base sm:text-lg md:text-xl dark:text-teal-100 text-teal-700 max-w-3xl mx-auto font-medium">تعلم بطريقة حديثة مع أفضل المدرسين والدروس المصورة At LearnHub, we connect passionate teachers and eager students through engaging online courses featuring video lessons, interactive exams, and personalized learning paths.</p>
    </section>

    <!-- Featured Courses -->

    <section id="courses" aria-labelledby="coursesTitle" class="mb-16 ">
      <h3 id="coursesTitle" class="text-3xl font-bold mb-8  dark:text-teal-100 text-teal-800 tracking-wide select-none">Featured Courses</h3>
      <div class="overflow-x-auto scroll-auto ">
          <!-- كرّر العناصر مرتين داخل نفس الديف لعمل تأثير دائري مستمر -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

              <!-- انسخ كل العناصر هنا -->

              <article tabindex="0" aria-label="Full Stack Web Development Course " class=" w-96 md:w-80  sm:w-64 h-my-height bg-white rounded-xl shadow-md overflow-hidden cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600">
                <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=60" alt="Laptop coding" class="w-full h-64 object-cover rounded-t-xl" />
                <div class="p-6 flex flex-col h-full">
                  <h4 class="text-xl font-extrabold text-teal-700  mb-2">{{__('Full Stack Web Development')}}</h4>
                  <p class="text-teal-800 flex-grow">Learn to build modern web applications with HTML, CSS, JavaScript, and backend technologies.</p>
                </div>
              </article>

             <article tabindex="0" aria-label="Digital Marketing Masterclass" class="w-96 md:w-80  sm:w-64 h-my-height bg-white rounded-xl shadow-md overflow-hidden cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=60" alt="Digital marketing workspace" class="w-full h-64 object-cover rounded-t-xl" />
                <div class="p-6 flex flex-col h-full">
                  <h4 class="text-xl font-extrabold text-teal-700 mb-2">Digital Marketing Masterclass</h4>
                  <p class="text-teal-800 flex-grow">Master SEO, social media marketing, and content strategy to grow your brand effectively.</p>
                </div>
              </article>

             <article tabindex="0" aria-label="Photography Basics Course" class="w-96 md:w-80  sm:w-64 h-my-height bg-white rounded-xl shadow-md overflow-hidden cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600 mx-1">
                <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=800&q=60" alt="Camera on tripod" class="w-full h-64 object-cover rounded-t-xl" />
                <div class="p-6 flex flex-col h-full">
                  <h4 class="text-xl font-extrabold text-teal-700 mb-2">Photography Basics</h4>
                  <p class="text-teal-800 flex-grow">Get hands-on with composition, lighting, and editing techniques to take stunning photos.</p>
                </div>
             </article>
              <!-- أضف باقي الكورسات بنفس الطريقة -->

            @endforeach

      </div>
      </div>
    </section>


    <!-- Featured Teachers -->
    <section id="teachers" aria-labelledby="teachersTitle" class="mb-16">
      <h3 id="teachersTitle" class="text-3xl font-bold mb-8 text-teal-800 dark:text-teal-100 tracking-wide select-none">Meet Our Teachers</h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
        <article tabindex="0" aria-label="Teacher John Doe, Web Developer" class="bg-white rounded-xl shadow-lg p-8 flex flex-col items-center text-center cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600">
          <img src="https://randomuser.me/api/portraits/men/41.jpg" alt="Photo of John Doe" class="rounded-full w-32 h-32 object-cover border-4 border-teal-600 mb-6" />
          <h4 class="text-xl font-extrabold text-teal-700  mb-2">John Doe</h4>
          <p class="text-teal-800">Experienced full stack developer with a passion for teaching modern web technologies and best practices.</p>
        </article>

        <article tabindex="0" aria-label="Teacher Mary Smith, Digital Marketing Expert" class="bg-white rounded-xl shadow-lg p-8 flex flex-col items-center text-center cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600">
          <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Photo of Mary Smith" class="rounded-full w-32 h-32 object-cover border-4 border-teal-600 mb-6" />
          <h4 class="text-xl font-extrabold text-teal-700 mb-2">Mary Smith</h4>
          <p class="text-teal-800">Marketing strategist specializing in digital campaigns, SEO optimization, and brand growth storytelling.</p>
        </article>

        <article tabindex="0" aria-label="Teacher Kevin Lee, Photographer" class="bg-white rounded-xl shadow-lg p-8 flex flex-col items-center text-center cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600">
          <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Photo of Kevin Lee" class="rounded-full w-32 h-32 object-cover border-4 border-teal-600 mb-6" />
          <h4 class="text-xl font-extrabold text-teal-700 mb-2">Kevin Lee</h4>
          <p class="text-teal-800">Professional photographer and educator teaching technical skills and creative vision for all levels.</p>
        </article>
      </div>
    </section>

    <!-- About Section -->
    <section id="about" aria-labelledby="aboutTitle" class="max-w-3xl mx-auto px-4 select-text">
      <h3 id="aboutTitle" class="text-3xl font-bold mb-6 text-teal-800 dark:text-teal-50 tracking-wide">What We Do</h3>
      <p class="mb-4 text-lg text-teal-900 dark:text-teal-100 font-medium">
        LearnHub empowers teachers to create rich, interactive online courses featuring video lessons and exams. Students can browse, enroll, and learn at their own pace, supported by expert instructors and a vibrant learning community.
      </p>
      <p class="text-teal-900  dark:text-teal-100 text-lg font-medium">
        Our mission is to make quality education accessible to everyone worldwide by connecting passionate educators and motivated learners through a user-friendly and engaging platform.
      </p>
    </section>
    <section id="why" aria-labelledby="whyTitle" class="max-w-3xl mx-auto px-4 select-text py-12">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6 text-teal-800 dark:text-teal-50 mb-4">لماذا تختار منصتنا؟</h2>
            <div class="grid md:grid-cols-3 gap-6 text-start">
                <div>
                    <h4 class="text-teal-900  dark:text-teal-100 text-lg font-medium">👨‍🏫 مدرسون مؤهلون</h4>
                    <p class="text-teal-600 text-sm">أفضل المدرسين من أصحاب الخبرة في شرح المناهج الدراسية بأسلوب بسيط.</p>
                </div>
                <div>
                    <h4 class="text-teal-900  dark:text-teal-100 text-lg font-medium">📹 فيديوهات تفاعلية</h4>
                    <p class="text-teal-600 text-sm">دروس مصورة بجودة عالية مع اختبارات تفاعلية تساعدك على الفهم والمتابعة.</p>
                </div>
                <div>
                    <h4 class="text-teal-900  dark:text-teal-100 text-lg font-medium">📈 تتبع التقدم</h4>
                    <p class="text-teal-600 text-sm">لوحة متابعة لتعرف مستواك ونسبة إكمالك للدورات.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white py-10 text-center">
          <h2 class="text-3xl font-bold mb-6 text-teal-800 dark:text-teal-50 mb-4">جرب الآن أول مادة مجانًا</h2>
          <a href="" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">ابدأ مجانًا</a>
      
    </section>
  </main>

  <footer role="contentinfo" class="bg-teal-800 text-white py-6 text-center select-none">
    <p>&copy; 2024 LearnHub. All rights reserved.</p>
    <p>Contact us at <a href="mailto:info@learnhub.com" class="underline hover:text-teal-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-400">info@learnhub.com</a></p>
  </footer>

</body>
</html>
