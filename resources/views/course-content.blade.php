@extends('layouts.guest')

@section('title', __('lang.course content'))

@section('content')


<main class="  w-full  px-4  flex-grow flex flex-col items-center bg-body ">


<section class="w-full" >
<div x-data="{ sidebarOpen: false }" class="min-h-screen rounded-md">

  <!-- زر فتح الـ Sidebar -->
  <div class="p-4 ">
    <button @click="sidebarOpen = true"
        class="bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700 transition md:hidden"
      >
      ☰ القائمة
    </button>
  </div>

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
      <ul class="space-y-2 text-xl">
        <li class="p-4 z-50 shadow-lg rounded-lg text-h3"> <a href="" class="flex items-center space-x-2"> <span class="mx-2">@include('icons.circle-fill')</span> <span class="mx-2">{{__('lang.Test Scores')}}</span></a></li>
        <li>
            <div x-data="{ open: false }" class="p-2 z-50 shadow-lg rounded-lg">
                <!-- Toggle Button -->
                <h3 class="font-bold flex justify-between px-4 py-2">
                    <span class="text-h1 "> moduel 1 </span>
                    
                    <button  @click="open = !open" class=" text-h1  rounded transition">
                        
                    <span :class="{ 'rotate-180': open }" class="inline-block transform transition-transform duration-300">
                        <svg class="w-4 h-4 transform transition-transform" :class="{'rotate-180': open.contact}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </span>
                    </button>
                </h3>
                

                <!-- Collapsible Content -->
                <div  x-show="open" x-transition class="mt-4 p-4  rounded text-h3 ">
                    
                    <ul class="space-y-2">
                        <li >
                        
                            <a href="" class="flex items-center space-x-2 shadow py-3"> <span class="mx-1"> @include('icons.video2')</span>  <span class="mx-1  whitespace-nowrap overflow-hidden text-ellipsis"> video 45454 hghfgh hghgh hghj hgh </span></a>
                            
                        </li>
                        <li class="flex items-center space-x-2">
                            @include('icons.video2')  video 45454
                        </li>
                        <li class="flex items-center space-x-2">
                            @include('icons.question')  video 45454
                        </li>
                    </ul>
        
                    
                </div>
            </div>
        </li>
       
        
      </ul>
    </aside>

    <!-- المحتوى الرئيسي -->
    <main class="flex-1 p-4 mt-4 md:mt-0 md:ml-64">
      <h1 id="GradeTitle" class="text-4xl font-bold mb-8 text-h3 text-center  tracking-wide select-none"> {{__('lang.subjects')}}</h1>

      <h3 class="text-2xl font-semibold mb-4">محتوى الصفحة</h3>
      <p>ده المحتوى الأساسي للصفحة، والـ Sidebar بيشتغل بشكل متجاوب مع الموبايل.</p>
    </main>

  </div>
</div>

 
</section>









 </main>


@endsection
