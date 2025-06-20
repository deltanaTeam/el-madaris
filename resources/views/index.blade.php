@extends('layouts.guest')

@section('title', __('lang.home'))

@section('content')
<style media="screen">
.slideshow-container {
  display: flex;
  flex-wrap: nowrap;
  overflow: hidden;
  position: relative;
  max-width: 100%;
}
.slide-track {
  display: flex;
  transition: transform 0.5s ease-in-out;
  will-change: transform;
}
.mySlides {
  flex: 0 0 33.3333%; /* 3 slides per view */
  box-sizing: border-box;
  transition: opacity 0.5s ease;

}
@media screen and (max-width: 1000px) {
  .mySlides {
    flex: 0 0 50%; /* 3 slides per view */
    box-sizing: border-box;

  }

}
@media screen and (max-width: 650px) {
  .mySlides {
    flex: 0 0 100%; /* 3 slides per view */
    box-sizing: border-box;

  }

}

.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  padding: 16px;
  font-weight: bold;
  font-size: 20px;
  color: #888;
  background-color: rgb(255, 255, 255);
  z-index: 10;
}

.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
  color: white;
}

.prev {
  left: 0;
}

.next {
  right: 0;
}

.dot-container {
  text-align: center;
  padding: 10px;
}

.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  display: inline-block;
  border-radius: 50%;
}

.active, .dot:hover {
  background-color: #717171;
}

</style>

<main class="max-w-7xl mx-auto px-6 py-12 flex-grow flex flex-col bg-body ">
  <!-- Hero Section -->


<section id="hero" tabindex="-1" class="text-center mb-16 select-none pb-2">
  <div class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-5 gap-4 bg-gray-50 rounded-[4vw]">



    <div class="md:col-span-2 sm:grid-cols-5 text-lime-500 p-8 md:p-12 flex flex-col justify-center items-center text-center">
      <div class=" top-4  transform  w-full ">
        <div class=" bg-opacity-50 p-4 rounded-lg max-w-2xl mx-auto text-center">
          <h2 class="text-theme-title text-4xl md:text-3xl lg:text-5xl font-bold  leading-tight p-3">
            {{ __('lang.welcome to your') }}
            @if(app()->getLocale() === 'ar')
              {{ config('app.name_ar') }}

            @else
              {{ config('app.name_en') }}
            @endif
          </h2>
        </div>
      </div>
      <p class="text-base sm:text-lg lg:text-xl md:text-xl font-medium mb-6 text-theme-3">
        {{ __('lang.learn in a modern way with the best teachers and video lessons') }}
      </p>

      <a href="#" class="theme-btn block w-52 bg-theme-3">
        {{ __('lang.start now') }}
      </a>
    </div>
    <div class="md:col-span-3 lg:col-span-2 sm:grid-cols-5 relative w-full  md:h-full">
      @if(app()->getLocale() === 'en')
       <img src="{{ asset('images/home2.png') }}" alt="Hero Image"
        class="w-full h-full object-cover rounded-[4vw] " />
      @else
       <img src="{{ asset('images/home2.png') }}" alt="Hero Image"
          class="w-full h-full object-cover rounded-[4vw] transform -scale-x-100" />
      @endif
      <!-- نص في أعلى الصورة -->

    </div>
  </div>
</section>

  <!-- Featured Courses -->
{{--
  <section id="courses" aria-labelledby="coursesTitle" class="mb-16 ">
    <h3 id="coursesTitle" class="text-3xl font-bold mb-8  text-h3 tracking-wide select-none">{{__('lang.featured courses')}}</h3>
    <div class="overflow-x-auto scroll-auto ">
        <!-- كرّر العناصر مرتين داخل نفس الديف لعمل تأثير دائري مستمر -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- انسخ كل العناصر هنا -->

            <article tabindex="0" aria-label="Full Stack Web Development Course " class=" bg-white rounded-[4vw] shadow-md overflow-hidden cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600">
              <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=60" alt="Laptop coding" class="w-full h-64 object-cover rounded-t-xl" />
              <div class="p-6 flex flex-col h-full">
                <h4 class="text-xl font-extrabold bg-white-text mb-2">{{__('Full Stack Web Development')}}</h4>
                <p class="bg-white-text flex-grow">Learn to build modern web applications with HTML, CSS, JavaScript, and backend technologies.</p>
              </div>
            </article>

           <article tabindex="0" aria-label="Digital Marketing Masterclass" class="bg-white rounded-[4vw] shadow-md overflow-hidden cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600">
              <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=60" alt="Digital marketing workspace" class="w-full h-64 object-cover rounded-t-xl" />
              <div class="p-6 flex flex-col h-full">
                <h4 class="text-xl font-extrabold bg-white-text mb-2">Digital Marketing Masterclass</h4>
                <p class="bg-white-text flex-grow">Master SEO, social media marketing, and content strategy to grow your brand effectively.</p>
              </div>
            </article>

           <article tabindex="0" aria-label="Photography Basics Course" class=" bg-white rounded-[4vw] shadow-md overflow-hidden cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600 mx-1">
              <img src="https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=800&q=60" alt="Camera on tripod" class="w-full h-64 object-cover rounded-t-xl" />
              <div class="p-6 flex flex-col h-full">
                <h4 class="text-xl font-extrabold bg-white-text mb-2">Photography Basics</h4>
                <p class="bg-white-text flex-grow">Get hands-on with composition, lighting, and editing techniques to take stunning photos.</p>
              </div>
           </article>
            <!-- أضف باقي الكورسات بنفس الطريقة -->


    </div>
    </div>
  </section>
--}}
<div class="w-full  my-3"></div>
<section id="courses" aria-labelledby="coursesTitle" class="mb-16  ">
  <h3 id="coursesTitle" class="text-3xl font-bold mb-8  text-h3 tracking-wide select-none">{{__('lang.featured courses')}}</h3>

<div class="slideshow-container flex flex-wrap justify-center items-center gap-4 md:gap-3  ">
  @php
    $subject_count = count($subjects);
  @endphp
  @forelse($subjects as $subject)
        @php
          $path = ($subject->image) ? asset('storage/'.$subject->image)  : asset('images/subject.jpg')  ;
        @endphp
    
    <div class="mySlides ">
      <article tabindex="0" aria-label="Photography Basics Course" class=" md:max-w-sm sm:max-w-xs bg-white rounded-[4vw] shadow-md overflow-hidden cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600 mx-1">
          <img src="{{$path}}" alt="Camera on tripod" class="w-full h-64 object-cover rounded-t-xl" />
          <div class="p-6 flex flex-col h-full">
            <h4 class="text-xl font-extrabold bg-white-text mb-2">{{$subject->name}}</h4>
            <p class="bg-white-text flex-grow">{{ Str::limit($subject->description, 100) }}</p>
            <div class=" flex flex-nowrap justify-between items-center overflow-x-auto gap-2  ">
                <div class=" flex flex-nowrap justify-between items-center">
                  <span class="text-gray-600 p-1 px-2 rounded-full m-2">@include('icons.users')</span>
                  <span class="text-gray-600  p-1 px-2 rounded-full m-2">{{$subject->students_count}}</span>
                  
                </div>
                  <div class=" flex flex-nowrap justify-between items-center">
                  <span class="text-gray-600 p-1 px-2 rounded-full m-2">@include('icons.stage')</span>
                  <span class="text-gray-600 p-1 px-2 rounded-full m-2">{{$subject->stages_count}}</span>
                  
                </div>
              </div>
            
            <button class="btn-enroll bg-theme-3 hover:bg-theme-2 text-white text-lg font-bold">{{__('lang.Enroll Now')}}</button>

          </div>
        </article>
    </div>
    
  @empty
        <p>{{__('lang.No Grades Added Yet')}}</p>
  @endforelse
  
  
  

  <!-- <div class="mySlides">Slide 5: Cloud</div>
  <div class="mySlides">Slide 6: Security</div> -->
  <a class="prev rounded-full" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next rounded-full" onclick="plusSlides(1)">&#10095;</a>

</div>
  {{-- <div class="dot-container">
    @for ($i=0 ;$i<$subject_count ;$i++ )
    <span class="dot" onclick='currentSlide("{{$i}}")'></span>

    @endfor
    
  </div> --}}
  </section>
  <div class="w-full  my-3"></div>
  <!-- Featured Teachers -->
  <section id="teachers" aria-labelledby="teachersTitle" class="mb-16 w-full">
    <h3 id="teachersTitle" class="text-3xl font-bold mb-8 text-h3  tracking-wide select-none">{{__('lang.Meet Our Teachers')}}</h3>
    <div class=" w-full flex flex-wrap justify-center items-center gap-6 lg:gap-12">
      <article tabindex="0" aria-label="Teacher John Doe, Web Developer" class="bg-white  w-full sm:w-80 min-w-64 rounded-[4vw] shadow-lg p-8 flex flex-col items-center text-center cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600">
        <img src="https://randomuser.me/api/portraits/men/41.jpg" alt="Photo of John Doe" class="rounded-full w-32 h-32 object-cover border-4 border-theme mb-6" />
        <h4 class="text-xl font-extrabold bg-white-text  mb-2">John Doe</h4>
        <p class="bg-white-text">Experienced full stack developer with a passion for teaching modern web technologies and best practices.</p>
      </article>

      <article tabindex="0" aria-label="Teacher John Doe, Web Developer" class="bg-white w-full sm:w-80 min-w-64 rounded-[4vw] shadow-lg p-8 flex flex-col items-center text-center cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600">
        <img src="https://randomuser.me/api/portraits/men/41.jpg" alt="Photo of John Doe" class="rounded-full w-32 h-32 object-cover border-4 border-theme mb-6" />
        <h4 class="text-xl font-extrabold bg-white-text  mb-2">John Doe</h4>
        <p class="bg-white-text">Experienced full stack developer with a passion for teaching modern web technologies and best practices.</p>
      </article>

      <article tabindex="0" aria-label="Teacher Mary Smith, Digital Marketing Expert" class="bg-white w-full sm:w-80 min-w-64 rounded-[4vw] shadow-lg p-8 flex flex-col items-center text-center cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600">
        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Photo of Mary Smith" class="rounded-full w-32 h-32 object-cover border-4 border-theme mb-6" />
        <h4 class="text-xl font-extrabold bg-white-text mb-2">Mary Smith</h4>
        <p class="bg-white-text">Marketing strategist specializing in digital campaigns, SEO optimization, and brand growth storytelling.</p>
      </article>

      

      
    </div>
  </section>
  <div class="w-full  my-3"></div>
  <!-- About Section -->
  <section id="about" aria-labelledby="aboutTitle" class=" select-text ">
    <h3 id="aboutTitle" class="text-3xl font-bold mb-6 text-h3 tracking-wide">{{__('lang.what we do')}}</h3>
    <div class="grid  sm:grid-cols-2  sm:grid-cols-5 max-sm:grid-cols-1 gap-8  sm:gap-3">
      <div class="rounded-[4vw]  sm:col-span-3  p-6 text-theme-1 bg-white">

        <p class="mb-4 md:text-base sm:text-md max-sm:text-lg lg:text-lg  xl:text-2xl font-medium first-letter:float-start first-letter:m-3 first-letter:text-7xl first-letter:font-bold first-letter:text-theme-1 first-line:tracking-widest first-line:uppercase">
          <span class="mb-4 md:text-lg sm:text-md max-sm:text-lg lg:text-2xl  font-medium ">
            @if(app()->getLocale() === 'ar')
            {{config('app.name_ar')}}
            @else
            {{config('app.name_en')}}
            @endif
          </span>
           {{__('lang.empowers teachers to create rich, interactive online courses featuring video lessons and exams. Students can browse, enroll, and learn at their own pace, supported by expert instructors and a vibrant learning community.')}}
        </p>
        <p class=" md:text-base sm:text-md max-sm:text-lg lg:text-lg xl:text-2xl font-medium">
        {{__('lang.Our mission is to make quality education accessible to everyone worldwide by connecting passionate educators and motivated learners through a user-friendly and engaging platform.')}}
        </p>

      </div>
      <div class="rounded-[4vw] sm:col-span-2 ">
        <img src="{{asset('images/home.png')}}" alt="img" class=" min-h-80  rounded-[4vw]">
      </div>
    </div>

  </section>
  <div class="w-full  my-4"></div>
  <section id="why" aria-labelledby="whyTitle" class=" mx-auto px-2 select-text py-12">
      <div class=" mx-auto px-2 text-center">
          <h2 class="text-4xl font-bold mb-6  text-h2 mb-6">{{__('lang.Why choose our platform?')}}</h2>
          <div class="grid md:grid-cols-3 gap-6 mt-4">
              <div class="bg-hero bg-white shadow-lg text-center ">
                  <h4 class="text-h4    text-xl font-medium">{{__('lang.Qualified teachers')}}</h4>
                  <p class="text-p text-lg">{{__('lang.The best teachers are those with experience in explaining the curricula in a simple way.')}}</p>
              </div>
              <div class="bg-hero  shadow-lg text-center ">
                  <h4 class="text-h4   text-xl font-medium">{{__('lang.Interactive videos')}}</h4>
                  <p class="text-p text-lg">{{__('lang.High-quality recorded lessons with interactive tests to help you understand and keep up.')}}</p>
              </div>
              <div class="bg-hero shadow-lg text-center ">
                  <h4 class="text-h4  d text-xl font-medium">{{__('lang.Track progress')}}</h4>
                  <p class="text-p text-lg">{{__('lang.A tracking board to know your level and completion rate of the courses.')}}</p>
              </div>
          </div>
      </div>
  </section>
 </main>
 <script>
 let slideIndex = 0;
 setInterval(() => {
   slideIndex += 1;
   showSlides(slideIndex);
 }, 2000);
 const slides = document.getElementsByClassName("mySlides");
 const dots = document.getElementsByClassName("dot");

 function showSlides(n) {
   const total = slides.length;
   const slidesPerView = 3;
   // تصحيح الـ index
   if (n >= total) slideIndex = 0;
   if (n < 0) slideIndex = total - slidesPerView;

   // إخفاء كل الشرائح
   for (let i = 0; i < total; i++) {
     slides[i].style.display = "none";
   }

   // عرض 3 شرائح بدءًا من slideIndex
   for (let i = slideIndex; i < slideIndex + slidesPerView && i < total; i++) {
     slides[i].style.display = "block";
   }

   // تحديث النقاط (dots)
   for (let i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" active", "");
   }
   dots[Math.floor(slideIndex / slidesPerView)].className += " active";

 }

 function plusSlides(n) {
   slideIndex += n * 1;
   showSlides(slideIndex);
 }

 function currentSlide(n) {
   slideIndex = (n - 1) * 1;
   showSlides(slideIndex);
 }

 showSlides(slideIndex);

 </script>

@endsection
