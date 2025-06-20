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

<div x-data="courseViewer()" class="flex min-h-screen rounded-md">
  <div class="p-4 ">
    <button @click="sidebarOpen = true"
        class="bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700 transition md:hidden"
      >
      ☰ القائمة
    </button>
  </div>
  <!-- ✅ Sidebar -->
   <div class="flex flex-col md:flex-row ">

    <!-- Sidebar: يظهر دائمًا في الشاشات الكبيرة، وينزلق في الموبايل -->
    <div 
      class="fixed inset-0 bg-black bg-opacity-50 z-30 md:hidden"
      x-show="sidebarOpen"
      x-transition
      @click="sidebarOpen = false"
    ></div>

    <aside 
      class="fixed md:static rounded-[2vw] z-40 md:z-auto top-0 start-0 min-h-screen h-full lg:w-80 md:w-64 side-theme p-4 shadow transition-transform transform md:translate-x-0"
      :class="{ '-translate-x-full': !sidebarOpen }"
      x-show="sidebarOpen || window.innerWidth >= 768"
      x-transition >
      <div class="flex justify-between items-center mb-4 md:hidden">
        <h2 class="text-lg font-bold">{{__('lang.list')}}</h2>
        <button @click="sidebarOpen = false" class="text-gray-500 hover:text-black text-xl">&times;</button>
      </div>
        <h2 class="text-xl font-bold mb-4 text-gray-700">الموضوعات</h2>

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

  <!-- ✅ Main Content -->
    <main class="flex-1 p-4 mt-4 md:mt-0 md:ml-64 bg-white border-r overflow-y-auto">
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
</div>

<script>
function courseViewer() {
  return {
    sidebarOpen: false, // ← أضف هذا السطر
    openTopicId: null,
    active: { type: null, data: {} },
    topics: @json($fakeData),

    toggleTopic(id) {
      this.openTopicId = this.openTopicId === id ? null : id;
    },

    showContent(type, data) {
      this.active = { type, data };
      this.sidebarOpen = window.innerWidth >= 768; // يغلق تلقائيًا في الموبايل بعد الضغط
    }
  }
}
</script>
@endsection
