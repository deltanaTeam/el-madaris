@extends('layouts.app')

@section('title', __('lang.home'))

@section('content')
<main class="max-w-7xl mx-auto px-6 py-12 flex-grow flex flex-col bg-body ">
  <!-- Hero Section -->
  <section id="hero" tabindex="-1" class="text-center mb-16 select-none">
    <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold dark:text-white text-lime-900 mb-4 leading-tight max-w-5xl mx-auto">مرحبًا بك في منصة المدرسة الإلكترونية</h2>
    <p class="text-base sm:text-lg md:text-xl dark:text-teal-100 text-teal-700 max-w-3xl mx-auto font-medium">تعلم بطريقة حديثة مع أفضل المدرسين والدروس المصورة At LearnHub, we connect passionate teachers and eager students through engaging online courses featuring video lessons, interactive exams, and personalized learning paths.</p>
  </section>

  <!-- Featured Courses -->

  <section id="courses" aria-labelledby="coursesTitle" class="mb-16 ">
    <h3 id="coursesTitle" class="text-3xl font-bold mb-8  dark:text-teal-100 text-teal-800 tracking-wide select-none">Featured Courses</h3>
    <div class="overflow-x-auto scroll-auto ">
        <!-- كرّر العناصر مرتين داخل نفس الديف لعمل تأثير دائري مستمر -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- انسخ كل العناصر هنا -->

            <article tabindex="0" aria-label="Full Stack Web Development Course " class=" bg-white rounded-xl shadow-md overflow-hidden cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600">
              <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=60" alt="Laptop coding" class="w-full h-64 object-cover rounded-t-xl" />
              <div class="p-6 flex flex-col h-full">
                <h4 class="text-xl font-extrabold text-teal-700  mb-2">{{__('Full Stack Web Development')}}</h4>
                <p class="text-teal-800 flex-grow">Learn to build modern web applications with HTML, CSS, JavaScript, and backend technologies.</p>
              </div>
            </article>

           <article tabindex="0" aria-label="Digital Marketing Masterclass" class="bg-white rounded-xl shadow-md overflow-hidden cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600">
              <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=60" alt="Digital marketing workspace" class="w-full h-64 object-cover rounded-t-xl" />
              <div class="p-6 flex flex-col h-full">
                <h4 class="text-xl font-extrabold text-teal-700 mb-2">Digital Marketing Masterclass</h4>
                <p class="text-teal-800 flex-grow">Master SEO, social media marketing, and content strategy to grow your brand effectively.</p>
              </div>
            </article>

           <article tabindex="0" aria-label="Photography Basics Course" class=" bg-white rounded-xl shadow-md overflow-hidden cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600 mx-1">
              <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=800&q=60" alt="Camera on tripod" class="w-full h-64 object-cover rounded-t-xl" />
              <div class="p-6 flex flex-col h-full">
                <h4 class="text-xl font-extrabold text-teal-700 mb-2">Photography Basics</h4>
                <p class="text-teal-800 flex-grow">Get hands-on with composition, lighting, and editing techniques to take stunning photos.</p>
              </div>
           </article>
            <!-- أضف باقي الكورسات بنفس الطريقة -->


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
@endsection
