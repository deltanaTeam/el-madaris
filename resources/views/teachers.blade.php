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

  <aside class="lg:w-72 lg:block side-theme  md:block sm:hidden space-y-6 absolute inset-y-0 start-0 transform -transform-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out bg-white border-l p-4 overflow-y-auto" id="sidebar">
    <h2 class="text-xl font-bold mb-4 text-gray-700">الموضوعات</h2>
     <button id="toggleSidebar" class="md:hidden">uhjhjhhjh</button>
    <template x-for="topic in topics" :key="topic.id">
      <div class="mb-2">
        <!-- زر طي/فتح الموضوع -->
        <button @click="toggleTopic(topic.id)"
          class="w-full text-right font-semibold bg-gray-100 p-2 rounded hover:bg-gray-200"
          :class="{ 'bg-gray-300': topic.id === openTopicId }">
                <span x-text="topic.title"></span>

        </button>

        <!-- محتوى الموضوع -->
        <div x-show="topic.id === openTopicId" class="pl-4 mt-2 space-y-1">
          <template x-for="video in topic.videos" :key="video.id">
            <button @click="showContent('video', video)"
              class="text-sm text-blue-600 hover:underline block text-right">
              🎥 <span x-text="video.title"></span>
            </button>
          </template>

          <template x-for="file in topic.files" :key="file.id">
            <button @click="showContent('file', file)"
              class="text-sm text-green-600 hover:underline block text-right">
               📁 <span x-text="file.title"></span>
            </button>
          </template>

          <template x-for="exam in topic.exams" :key="exam.id">
            <button @click="showContent('exam', exam)"
              class="text-sm text-red-600 hover:underline block text-right">
              📝 <span x-text="exam.title"></span>
            </button>
          </template>
        </div>
      </div>
    </template>
  </aside>


  <main class="flex-1 p-6 bg-white border-r overflow-y-auto">
    <template x-if="active.type === 'video'">
      <div>
        <h3 class="text-lg font-bold mb-2"><span x-text="active.data.title"></span></h3>
        <video :src="active.data.url" controls class="w-full rounded shadow"></video>
      </div>
    </template>

    <template x-if="active.type === 'file'">
      <div>
        <h3 class="text-lg font-bold mb-2"><span x-text="active.data.title"></span></h3>
        <iframe :src="active.data.url" class="w-full h-[500px] rounded shadow"></iframe>
      </div>
    </template>

    <template x-if="active.type === 'exam'">
      <div>
        <h3 class="text-lg font-bold mb-2"><span x-text="active.data.title"></span></h3>
        <p class="text-gray-600">عرض الأسئلة أو رابط الامتحان هنا</p>
      </div>
    </template>

    <template x-if="!active.type">
      <p class="text-gray-400">اختر عنصرًا من القائمة لعرضه.</p>
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
    active: { type: null, data: {} },
    // topics: @json($fakeData), // مرري البيانات من Laravel Controller
    topics:@json($fakeData) , // مرري البيانات من Laravel Controller

    toggleTopic(id) {
      this.openTopicId = this.openTopicId === id ? null : id;
    },

    showContent(type, data) {
      this.active = { type, data };
    }
  }
}
</script>
@endsection
