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
      ['id' => 301, 'title' => 'اختبار تمهيدي', 'url' => '/exams/1'],
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
      ['id' => 302, 'title' => 'امتحان الوحدة الأولى', 'url' => '/exams/2'],
    ]
  ]
];
@endphp
<div x-data="courseViewer()" class="flex min-h-screen ">

  <aside class="side-theme lg:w-72 lg:block min-h-screen  md:block sm:hidden  space-y-6  inset-y-0 start-0 transform lg:ms-3 md:ms-1  md:translate-x-0 transition duration-200 ease-in-out  border-l p-4 overflow-y-auto; " id="sidebar">
    <h2 class="text-xl font-bold mb-4 text-h2">{{__('lang.stages')}}</h2>
    <div class="p-4 z-50 shadow-lg rounded-lg text-h3"> <a href="" class="flex items-center space-x-2"> <span class="mx-2">@include('icons.circle-fill')</span> <span class="mx-2">{{__('lang.Test Scores')}}</span></a></div>

    <template x-for="topic in topics" :key="topic.id">
      <div class="mb-2">
        <!-- زر طي/فتح الموضوع -->
        <button @click="toggleTopic(topic.id)"
          class="w-full py-4 px-4 text-start font-bold flex justify-between  shadow-lg rounded-lg text-h3 hover:bg-gray-50/50"
          :class="{ 'bg-gray-50 text-theme-3': topic.id === openTopicId }">
                
                <span x-text="topic.title"></span>
                <span :class="{ 'rotate-90': open }" class="inline-block transform transition-transform duration-300">
                    <svg class="w-4 h-4 transform transition-transform" :class="{'rotate-90': topic.id === openTopicId}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </span> 

        </button>

        <!-- محتوى الموضوع -->
        <div x-show="topic.id === openTopicId" class="ps-4 mt-2 space-y-1 bg-theme-2 rounded-lg text-h3">
          <template x-for="video in topic.videos" :key="video.id">
            <button @click="showContent('video', video)"
              class="side-sub-list" :class="{
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


  <main class="flex-1 p-6 text-h1   overflow-y-auto">
    <template x-if="active.type === 'video'">
      <div>
        <h3 class="text-lg font-bold mb-2"><span x-text="active.data.title"></span></h3>
        <video :src="active.data.url" 
          controls  class="w-full rounded shadow" controlsList="nodownload" @contextmenu.preventw"></video>
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
      <div>
        <h3 class="text-lg font-bold mb-2"><span x-text="active.data.title"></span></h3>
        <p class="text-gray-600">عرض الأسئلة أو رابط الامتحان هنا</p>
      </div>
    </template>

    <template x-if="!active.type" >
      <div class="flex-1 p-4 mt-4 md:mt-0 md:ml-64">
        <h1 id="5544" class="text-4xl font-bold mb-8 text-h3 text-center  tracking-wide select-none"> {{__('lang.subjects')}}</h1>


        <p class="text-h2">اختر عنصرًا من القائمة لعرضه.</p>
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

     if(sidebar.classList.contains('sm:block')){
        sidebar.classList.remove('sm:block');
        sidebar.classList.add('sm:hidden');
     }
     else if(sidebar.classList.contains('sm:hidden')){
        sidebar.classList.remove('sm:hidden');
        sidebar.classList.add('sm:block');
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
