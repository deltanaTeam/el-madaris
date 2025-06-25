@extends('layouts.guest')

@section('title', __('lang.course content'))

@section('content')
@php
$fakeData = [
  [
    'id' => 1,
    'title' => 'المقدمة',
    'videos' => [
      ['id' => 101, 'title' => 'فيديو تعريفي بالكورس', 'url' => '/storage/videos/intro.mp4'],
    ],
    'files' => [
      ['id' => 201, 'title' => 'ملف تعريفي PDF', 'url' => '/storage/files/intro.pdf'],
    ],
    'exams' => [
      ['id' => 301, 'title' => 'اختبار تمهيدي', 'url' => url('exam')],
    ]
  ],
  [
    'id' => 2,
    'title' => 'الوحدة الأولى: المفاهيم الأساسية',
    'videos' => [
      ['id' => 102, 'title' => 'فيديو 1: ما هو البرمجة؟', 'url' => '/storage/videos/programming-basics.mp4'],
      ['id' => 103, 'title' => 'فيديو 2: أنواع لغات البرمجة', 'url' => '/storage/videos/languages.mp4'],
    ],
    'files' => [
      ['id' => 202, 'title' => 'مذكرة الوحدة الأولى', 'url' => asset('/images/test.pdf')],
    ],
    'exams' => [
      ['id' => 302, 'title' => 'امتحان الوحدة الأولى', 'url' => url('exam')],
    ]
  ]
];
@endphp
<div x-data="courseViewer()" class="grid lg:grid-cols-7  min-h-screen ">

  <aside class="side-theme  lg:col-span-2 lg:block min-h-screen  hidden  space-y-6  inset-y-0 start-0 transform lg:ms-3 md:ms-1  md:translate-x-0 transition duration-200 ease-in-out  shadow-lg p-4 overflow-y-auto; " id="sidebar">
    <h2 class="text-2xl text-center font-bold mb-4 text-h2">{{__('lang.course name')}}</h2>
    <button  @click="active = { type: null, data: {} }; currentContentId = null;"
      class="  px-4 py-3 w-full rounded shadow hover:bg-sky-200 hover:text-sky-800 transition"
      :class="{
    'bg-theme-1 text-white': !active.type,
    ' hover:bg-sky-200 hover:text-sky-800': active.type
  }">
      {{__('lang.about course')}}
    </button>
    <h2 class="text-xl font-bold mb-4 text-h2">{{__('lang.topics')}}</h2>
    <div class="p-4 z-50 shadow rounded-lg text-h3"> <a href="{{url('exam/results')}}" class="flex items-center space-x-2"> <span class="mx-2">@include('icons.circle-fill')</span> <span class="mx-2">{{__('lang.Test Scores')}}</span></a></div>

    <template x-for="topic in topics" :key="topic.id">
      <div class="mb-2">
        <!-- زر طي/فتح الموضوع -->
        <button @click="toggleTopic(topic.id)"
          class="w-full py-4 px-4 text-start font-bold flex justify-between  shadow rounded-lg text-h3  hover:bg-gray-300 "
          :class="{ 'bg-gray-50 text-theme-3': topic.id === openTopicId }">

                <span x-text="topic.title"></span>
                <span :class="{ 'rotate-90': open }" class="inline-block transform transition-transform duration-300">
                    <svg class="w-4 h-4 transform transition-transform" :class="{'rotate-90': topic.id === openTopicId}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </span>

        </button>


        <div x-show="topic.id === openTopicId" class="ps-2 mt-2 space-y-1  rounded-lg text-h3 w-full collapsed-content ">
          <template x-for="video in topic.videos" :key="video.id">
            <button @click="showContent('video', video)"
              class="side-sub-list w-full" :class="{
                 'bg-theme-3 text-white': currentContentId === video.id,
                  'hover:bg-gray-300/50': currentContentId !== video.id}" >
              <span class="mx-1"> @include('icons.video2') </span> <span x-text="video.title"></span>
            </button>
          </template>

          <template x-for="file in topic.files" :key="file.id">
            <button @click="showContent('file', file)"
              class="side-sub-list" :class="{
                 'bg-theme-3 text-white': currentContentId === file.id,
                  'hover:bg-gray-300/50': currentContentId !== file.id}">
              <span class="mx-1"> @include('icons.file') </span> <span x-text="file.title"></span>
            </button>
          </template>

          <template x-for="exam in topic.exams" :key="exam.id">
            <button @click="showContent('exam', exam)"
              class="side-sub-list" :class="{
                 'bg-theme-3 text-white': currentContentId === exam.id,
                  'hover:bg-gray-300/50': currentContentId !== exam.id}">
              <span class="mx-1"> @include('icons.edu-scroll') </span> <span x-text="exam.title"></span>
            </button>
          </template>
        </div>
      </div>
    </template>
  </aside>


  <main class="flex-1 p-6 text-h1 lg:col-span-5  overflow-y-auto">
    <template x-if="active.type === 'video'">
      <div>
        <h3 class="text-lg font-bold mb-2"><span x-text="active.data.title"></span></h3>
        <video :src="active.data.url"
          controls  class="w-full rounded shadow" controlsList="nodownload" @contextmenu.preventw></video>
      </div>
    </template>

    <template x-if="active.type === 'file'">
      <div >

        <h3 class="text-lg font-bold mb-2"><span x-text="active.data.title"></span></h3>
        <iframe   :src="active.data.url" class="w-full h-[500px] rounded shadow"  style="border: none;"
          oncontextmenu="return false;"></iframe>
      </div>
    </template>

    <template x-if="active.type === 'exam'">
      <div class="bg-white flex-1 p-4 mt-4 md:mt-0 md:ms-4 rounded-lg h-64">
        <h3 class="text-lg font-bold text-center mb-2 text-theme-2"><span x-text="active.data.title"></span></h3>
        <p class="text-gray-600"><a href="{{url('exam')}}" class="theme-btn-md"> اضغط لاداء الامتحان</a></p>
      </div>
    </template>

    <template x-if="!active.type"  >
      <div class="flex-1 p-4 mt-4 md:mt-0 md:ms-4">
          <h1 id="5544" class="text-4xl font-bold mb-8 text-h3 capitalize text-center  tracking-wide select-none"> {{__('lang.course name')}}</h1>
          <div class="py-6 px-6 rounded-lg  bg-white text-theme-2 ">
            <h2 class="text-2xl font-bold capitalize mb-8 text-theme-2"> what you will learn in this course  </h2>

            <ul class="space-y-3 px-4">

              {{-- course objectives --}}
              <li class="flex items-start text-xl">
                <span class="me-2 mt-1">@include('icons.circle')</span> <span class="">icon</span>
                objective 1
              </li>
              <li class="flex items-start text-xl">
                <span class="me-2 mt-1">@include('icons.circle')</span> <span class="">icon</span>
                objective 2
              </li>
              <li class="flex items-start text-xl">
                <span class="me-2 mt-1">@include('icons.circle')</span> <span class="">icon</span>
                objective 3
              </li>
              <li class="flex items-start text-xl">
                <span class="me-2 mt-1">@include('icons.circle')</span> <span class="">icon</span>
                objective 4
              </li>

              <li class="flex items-start text-xl">
                <span class="me-2 mt-1">@include('icons.circle')</span> <span class="">icon</span>
                objective 5
              </li>




            </ul>
          </div>
          <div class="py-6 px-6 rounded-lg  bg-white text-theme-2 my-4 ">
            <h2 class="text-2xl font-bold capitalize mb-8 text-theme-2"> description  </h2>
             <p class="space-y-3 px-4">               >is optimized for learning and training. Examples might be simplified to improve reading and learning. Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content

             </p>
          </div>


          <div class="py-6 px-6 rounded-lg  bg-white text-theme-2 my-4 ">
            <h2 class="text-2xl font-bold capitalize mb-8 text-theme-2"> teacher  </h2>
            <div class="grid grid-cols-5">
             <img src="{{asset('images/man.png')}}" alt="teacher image " class="h-[16vh] w-[16vh] rounded-full sm:col-span-1 col-span-2">
            <p class="space-y-3 p-4  sm:col-span-4 col-span-3"> kbhlb klylly ykhkyhly khjkyhjky hykhjky hjykjhky hyjkhykj
              khkyhjkyh hykhjykh jhjyhjy jhyhnjyh khjykhjyk jhjkyhnyj jhyhjy jhyhjy jhjyh jhyhjy
             </p>
             </div>
          </div>

          <div class="py-4 px-6 rounded-lg  bg-white text-theme-2 my-4 ">
            <h2 class="text-2xl font-bold capitalize mb-8 text-theme-2"> add you rating  </h2>
            <div x-data="{ rating: 0, hover: 0, comment: '' }" class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">

            <!-- begin stars -->
              <div class="flex justify-center mb-4 space-x-1">
                <template x-for="star in 5" :key="star">
                  <svg
                    @click="rating = star"
                    @mouseover="hover = star"
                    @mouseleave="hover = 0"
                    :class="{
                      'text-yellow-400': star <= hover || (!hover && star <= rating),
                      'text-gray-300': star > hover && star > rating
                    }"
                    class="w-10 h-10 cursor-pointer transition duration-200"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.073 3.298a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.073 3.298c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.072-3.298a1 1 0 00-.363-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.951-.69l1.072-3.298z"/>
                  </svg>
                </template>
              </div>
            <!-- end stars -->
              <!-- begin comment -->
              <p class="text-center text-sm text-gray-600 mb-4" > {{__('lang.your rate')}}  <span x-text="rating"></span> {{__('lang.stars')}}</p>

              <textarea
                x-model="comment"
                rows="4"
                placeholder="اكتب تعليقك هنا..."
                class="w-full p-3 rounded focus:border-input  focus:outline-none focus:ring-2 focus:ring-theme-3 mb-4 resize-none"
              ></textarea>
             <!-- end comment -->

              <button
                @click="submitRating()"
                class="w-full bg-theme-3 text-white py-2 px-4 rounded hover:bg-theme-2 transition">
                 {{__('lang.save')}}
              </button>
            </div>

            <script>
              function submitRating() {
                alert('تم إرسال التقييم');
              }
            </script>

          </div>

      </div>

    </template>
  </main>
</div>

<script>
    // const toggleSidebar = document.getElementById('toggleSidebar');
    // const sidebar = document.getElementById('sidebar');
    // toggleSidebar.addEventListener('click',()=>{
    //     sidebar.classList.toggle('-translate-x-full');
    // });
    function toggleSidebar(){
     const sidebar = document.getElementById('sidebar');


      if(sidebar.classList.contains('block')){
        sidebar.classList.remove('block');
        sidebar.classList.add('hidden');
     }
     else if(sidebar.classList.contains('hidden')){
        sidebar.classList.remove('hidden');
        sidebar.classList.add('block');
        sidebar.classList.add('ms-6');
        sidebar.classList.add('me-4');

     }
     if(sidebar.classList.contains('sm:block')){
        sidebar.classList.remove('sm:block');
        sidebar.classList.add('sm:hidden');
     }
     else if(sidebar.classList.contains('sm:hidden')){
        sidebar.classList.remove('sm:hidden');
        sidebar.classList.add('sm:block');
        sidebar.classList.add('ms-6');
        sidebar.classList.add('me-4');
     }

    }
function courseViewer() {
  return {
    openTopicId: null,
    currentContentId: null,

    active: { type: null, data: {} },
    // topics: @json($fakeData), // مرري البيانات من Laravel Controller
    topics:@json($fakeData) , // مرري البيانات من Laravel Controller

    toggleTopic(id) {
      this.openTopicId = this.openTopicId === id ? null : id;
    },

    showContent(type, data) {
      this.active = { type, data };
      if (type === 'video') {
        this.currentContentId = data.id;
      }
      if (type === 'file') {
        this.currentContentId = data.id;
      }
      if (type === 'exam') {
        this.currentContentId = data.id;
      }

    }
  }
}
</script>
@endsection
