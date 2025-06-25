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

      <a href="{{url('/courses')}}" class="theme-btn-md text-3xl font-bolder py-4 block w-80 ">
        {{ __('lang.start now') }}
      </a>
    </div>
    <div class="md:col-span-3 lg:col-span-2 sm:grid-cols-5 relative w-full  md:h-full">

       <img src="{{ asset('images/home2.png') }}" alt="Hero Image"
          class="w-full h-full object-cover rounded-[4vw] @if(app()->getLocale() === 'ar') transform -scale-x-100 @endif" />
      <!-- نص في أعلى الصورة -->

    </div>
  </div>
</section>

  <!-- Featured Courses -->

<div class="w-full  my-3"></div>

<!-- <section id="courses12" aria-labelledby="coursesTitle11"  class="max-w-7xl"> -->


  <h3 id="coursesTitle" class="text-3xl font-bold my-8  text-h3 tracking-wide select-none">{{__('lang.featured courses')}}</h3>

    <section class="mx-auto  ">

      <script id="subjects-data" type="application/json">
        {!! $coursesJson !!}
      </script>

      <div class="relative">
        <div id="slider" class="flex transition-all duration-500 ease-in-out overflow-hidden lg:gap-12  md:gap-8  gap-2"></div>

        <button onclick="prevSlide()" class="absolute left-0 top-1/2 -translate-y-1/2 bg-theme-2 text-white px-3 py-1 rounded-full z-10"> &#10094; </button>
        <button onclick="nextSlide()" class="absolute right-0 top-1/2 -translate-y-1/2 bg-theme-2 text-white px-3 py-1 rounded-full z-10"> &#10095; </button>
      </div>
    </section>
  <!-- </section> -->
  <div class="w-full  my-3"></div>
  <!-- Featured Teachers -->
  <section id="teachers" aria-labelledby="teachersTitle" class="mb-16 w-full">
    <h3 id="teachersTitle" class="text-3xl font-bold mb-8 text-h3  tracking-wide select-none">{{__('lang.Meet Our Teachers')}}</h3>
    <div class=" w-full flex flex-wrap justify-center items-center gap-6 lg:gap-12">
      <article tabindex="0" aria-label="Teacher John Doe, Web Developer" class="bg-white  w-full sm:w-80 min-w-64 rounded-[4vw] shadow-lg p-8 flex flex-col items-center text-center cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600">
        <img src="{{asset('images/man.png')}}" alt="Photo of John Doe" class="rounded-full w-32 h-32 object-cover border-4 border-theme mb-6" />
        <h4 class="text-xl font-extrabold bg-white-text  mb-2">John Doe</h4>
        <p class="bg-white-text">Experienced full stack developer with a passion for teaching modern web technologies and best practices.</p>

      </article>

      <article tabindex="0" aria-label="Teacher John Doe, Web Developer" class="bg-white w-full sm:w-80 min-w-64 rounded-[4vw] shadow-lg p-8 flex flex-col items-center text-center cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600">
        <img src="{{asset('images/woman.png')}}" alt="Photo of John Doe" class="rounded-full w-32 h-32 object-cover border-4 border-theme mb-6" />
        <h4 class="text-xl font-extrabold bg-white-text  mb-2">John Doe</h4>
        <p class="bg-white-text">Experienced full stack developer with a passion for teaching modern web technologies and best practices.</p>

      </article>

      <article tabindex="0" aria-label="Teacher Mary Smith, Digital Marketing Expert" class="bg-white w-full sm:w-80 min-w-64 rounded-[4vw] shadow-lg p-8 flex flex-col items-center text-center cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600">
        <img src="{{asset('images/man.png')}}" alt="Photo of Mary Smith" class="rounded-full w-32 h-32 object-cover border-4 border-theme mb-6" />
        <h4 class="text-xl font-extrabold bg-white-text mb-2">Mary Smith</h4>
        <p class="bg-white-text">Marketing strategist specializing in digital campaigns, SEO optimization, and brand growth storytelling.</p>

      </article>




    </div>
  </section>
<div class="w-full  my-3"></div>


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
        <img src="{{asset('images/site1.png')}}" alt="img" class=" min-h-80  rounded-[4vw]">
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
  const subjects = JSON.parse(document.getElementById("subjects-data").textContent);
  const usersIcon = `<svg width="22px" height="22px" viewBox="0 0 16 16" fill="none" >
<path d="M8 3.5C8 4.88071 6.88071 6 5.5 6C4.11929 6 3 4.88071 3 3.5C3 2.11929 4.11929 1 5.5 1C6.88071 1 8 2.11929 8 3.5Z" fill="#85adad"/>
<path d="M3 8C1.34315 8 0 9.34315 0 11V15H8V8H3Z" fill="#85adad"/>
<path d="M13 8H10V15H16V11C16 9.34315 14.6569 8 13 8Z" fill="#85adad"/>
<path d="M12 6C13.1046 6 14 5.10457 14 4C14 2.89543 13.1046 2 12 2C10.8954 2 10 2.89543 10 4C10 5.10457 10.8954 6 12 6Z" fill="#85adad"/>
</svg>`;
const stageIcon = `<svg width="22px" height="22px" viewBox="0 0 6.3500002 6.3500002" id="svg1976" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" >
<defs id="defs1970"/>
<g id="layer1" style="display:inline">
<path d="m 0.26485,5.8204456 a 0.2645835,0.2645835 0 0 0 -0.26563,0.26563 0.2645835,0.2645835 0 0 0 0.26563,0.26367 h 5.82031 a 0.2645835,0.2645835 0 0 0 0.26562,-0.26367 0.2645835,0.2645835 0 0 0 -0.26562,-0.26563 z" id="path726"  style="color:#85adad;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-variant-east-asian:normal;font-feature-settings:normal;font-variation-settings:normal;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#85adad;letter-spacing:normal;word-spacing:normal;text-transform:none;writing-mode:lr-tb;direction:ltr;text-orientation:mixed;dominant-baseline:auto;baseline-shift:baseline;text-anchor:start;white-space:normal;shape-padding:0;shape-margin:0;inline-size:0;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#85adad;solid-opacity:1;vector-effect:none;fill:#85adad;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate;stop-color:#85adad"/>
<path d="m 1.16328,3.9688856 c -0.34722,0 -0.63476,0.28754 -0.63476,0.63477 v 1.48242 a 0.26460996,0.26460996 0 0 0 0.26562,0.26367 h 1.0586 a 0.26460996,0.26460996 0 0 0 0.26367,-0.26367 v -1.48242 c 0,-0.34723 -0.28755,-0.63477 -0.63477,-0.63477 z" id="path728" style="color:#85adad;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-variant-east-asian:normal;font-feature-settings:normal;font-variation-settings:normal;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#85adad;letter-spacing:normal;word-spacing:normal;text-transform:none;writing-mode:lr-tb;direction:ltr;text-orientation:mixed;dominant-baseline:auto;baseline-shift:baseline;text-anchor:start;white-space:normal;shape-padding:0;shape-margin:0;inline-size:0;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#85adad;solid-opacity:1;vector-effect:none;fill:#85adad;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;paint-order:stroke fill markers;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate;stop-color:#85adad"/>
<path d="m 3.0168,3.0684956 c -0.34722,0 -0.63477,0.28753 -0.63477,0.63477 v 2.38281 a 0.26460996,0.26460996 0 0 0 0.26367,0.26367 h 1.0586 a 0.26460996,0.26460996 0 0 0 0.26367,-0.26367 v -2.38281 c 0,-0.34724 -0.28755,-0.63477 -0.63477,-0.63477 z" id="path730" style="color:#85adad;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-variant-east-asian:normal;font-feature-settings:normal;font-variation-settings:normal;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#85adad;letter-spacing:normal;word-spacing:normal;text-transform:none;writing-mode:lr-tb;direction:ltr;text-orientation:mixed;dominant-baseline:auto;baseline-shift:baseline;text-anchor:start;white-space:normal;shape-padding:0;shape-margin:0;inline-size:0;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#85adad;solid-opacity:1;vector-effect:none;fill:#85adad;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;paint-order:stroke fill markers;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate;stop-color:#85adad"/>
<path d="m 4.86836,2.2755256 c -0.34722,0 -0.63477,0.28754 -0.63477,0.63477 v 3.17578 a 0.26460996,0.26460996 0 0 0 0.26368,0.26367 h 1.05859 a 0.26460996,0.26460996 0 0 0 0.26563,-0.26367 v -3.17578 c 0,-0.34723 -0.2895,-0.63477 -0.63672,-0.63477 z" id="path732" style="color:#85adad;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-variant-east-asian:normal;font-feature-settings:normal;font-variation-settings:normal;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#85adad;letter-spacing:normal;word-spacing:normal;text-transform:none;writing-mode:lr-tb;direction:ltr;text-orientation:mixed;dominant-baseline:auto;baseline-shift:baseline;text-anchor:start;white-space:normal;shape-padding:0;shape-margin:0;inline-size:0;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#85adad;solid-opacity:1;vector-effect:none;fill:#85adad;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;paint-order:stroke fill markers;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate;stop-color:#85adad"/>
<path d="M 4.6205208,2.5237e-4 A 0.2645835,0.2645835 0 0 0 4.3564534,0.26380219 0.2645835,0.2645835 0 0 0 4.6205208,0.52941905 H 4.8938883 C 3.3974791,1.8159538 1.8306324,2.6151331 0.2161369,2.9142865 A 0.2645835,0.2645835 0 0 0 0.0052984,3.2227949 0.2645835,0.2645835 0 0 0 0.3117388,3.4357016 C 2.050091,3.1136013 3.722697,2.2498105 5.2923138,0.88753671 V 1.1991456 A 0.2645835,0.2645835 0 0 0 5.5558626,1.4647625 0.2645835,0.2645835 0 0 0 5.8214805,1.1991456 V 0.41986501 C 5.8215308,0.19150501 5.62816,2.0237e-4 5.3998008,2.5237e-4 Z" id="path734" style="color:#85adad;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-variant-east-asian:normal;font-feature-settings:normal;font-variation-settings:normal;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#85adad;letter-spacing:normal;word-spacing:normal;text-transform:none;writing-mode:lr-tb;direction:ltr;text-orientation:mixed;dominant-baseline:auto;baseline-shift:baseline;text-anchor:start;white-space:normal;shape-padding:0;shape-margin:0;inline-size:0;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#85adad;solid-opacity:1;vector-effect:none;fill:#006666;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:0.529167;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;paint-order:stroke fill markers;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate;stop-color:#85adad"/>
</g>
</svg>`;
  let currentIndex = 0;
  const slider = document.getElementById("slider");


  function getVisibleCount() {
    const width = window.innerWidth;
    if (width < 768) return 1;
    if (width < 1000) return 2;
    return 3;
  }

  function renderSlider() {
    const visibleCount = getVisibleCount();
    slider.innerHTML = "";
    const url = @json(url('/topics'));
    for (let i = 0; i < visibleCount; i++) {
      const index = (currentIndex + i) % subjects.length;
      const s = subjects[index];

      const card = document.createElement("article");
      card.className = `
        bg-white rounded-[4vw] shadow-md overflow-hidden
        select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600
        w-full md:w-[1/3] xl:w-80 lg:w-64 transform transition duration-500 ease-in-out opacity-0 scale-95
      `;
       card.innerHTML = `
        <div class="relative w-full rounded-lg">

          <img src="${s.image}" alt="${s.name}" class=" @if(app()->getLocale() === 'en') transform -scale-x-100 @endif w-full h-48 object-cover rounded-t-[4vw]" />
          <div class="absolute  p-2 inset-0 flex items-center justify-end text-center text-white font-bold">
              <h1 class="text-3xl p-2"> كورسات مدرستك</h1>
          </div>
        </div>
        <div class="p-6 flex flex-col h-full">
          <h2 class="text-2xl font-bold mb-2 text-teal-700">${s.name}</h2>
          <p class="text-gray-700 mb-1"> ${s.grade}</p>
          <p class="bg-white  ">${truncateText(s.description, 100)}</p>
            <div class="flex items-center justify-between gap-4 mt-2">
              <div class="flex items-center gap-1 text-gray-600">
                ${usersIcon}<span>${s.students_count}</span>
              </div>
              <div class="flex items-center gap-1 text-gray-600">
                ${stageIcon}<span>${s.stages_count}</span>
              </div>
            </div>
          <a href="${url}" class="mt-4 inline-block bg-theme-2 text-white text-center py-2 px-4 rounded-full hover:bg-theme-1 shadow-lg capitalize transition">
            مشاهدة التفاصيل
          </a>
        </div>
      `;
      slider.appendChild(card);
      requestAnimationFrame(() => {
        card.classList.remove('opacity-0', 'scale-95');
        card.classList.add('opacity-100', 'scale-100');
      });
    }
  }
  function truncateText(text, maxLength) {
    if (!text || typeof text !== 'string') return '';
    return text.length > maxLength ? text.substring(0, maxLength) + "..." : text;
  }
  function nextSlide() {
    currentIndex = (currentIndex + 1) % subjects.length;
    renderSlider();
    resetAutoSlide();
  }

  function prevSlide() {
    currentIndex = (currentIndex - 1 + subjects.length) % subjects.length;
    renderSlider();
    resetAutoSlide();
  }

  function startAutoSlide() {
    autoSlideInterval = setInterval(() => {
      nextSlide();
    }, 2000);
  }

  function stopAutoSlide() {
    clearInterval(autoSlideInterval);
  }

  function resetAutoSlide() {
    stopAutoSlide();
    startAutoSlide();
  }

  window.addEventListener("resize", renderSlider);
  window.addEventListener("DOMContentLoaded", () => {
    renderSlider();
    startAutoSlide();
  });

  let autoSlideInterval;

</script>


@endsection
