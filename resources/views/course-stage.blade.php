@extends('layouts.guest')

@section('title', __('lang.course topics'))

@section('content')

  <div  class=" w-full  min-h-screen  mb-6">
    <h1 class="text-2xl md:text-4xl  text-h1 text-center capitalize my-6  p-6"> {{__('lang.course contents')}}</h1>
    <div x-data="{ tab: 'info' }" class="w-full max-w-5xl mx-auto mb-6  md:w-[90%] w-[90%] ">

    <div class="flex justify-between border-b border-gray-200 mb-6 ">
      <div class="flex">

        <button
        @click="tab = 'info'"
        :class="tab === 'info' ? 'border-theme-3 text-theme-3' : 'border-transparent text-gray-400 hover:text-theme-3'"
        class="px-4 py-2 capitalize md:text-lg text-sm  font-semibold border-b-2 -mb-px transition">
        معلومات
        </button>
        <button
        @click="tab = 'reviews'"
        :class="tab === 'reviews' ? 'border-theme-3 text-theme-3' : 'border-transparent text-gray-400 hover:text-theme-3'"
        class="px-4 py-2 capitalize md:text-lg text-sm  font-semibold border-b-2 -mb-px transition">
        التقييمات
        </button>
        <button
        @click="tab = 'teacher'"
        :class="tab === 'teacher' ? 'border-theme-3 text-theme-3' : 'border-transparent text-gray-400 hover:text-theme-3'"
        class="px-4 py-2 capitalize md:text-lg text-sm  font-semibold border-b-2 -mb-px transition">
        المعلم
        </button>
         <button
        @click="tab = 'description'"
        :class="tab === 'description' ? 'border-theme-3 text-theme-3' : 'border-transparent text-gray-400 hover:text-theme-3'"
        class="px-4 py-2 capitalize md:text-lg text-sm  font-semibold border-b-2 -mb-px transition">
        الوصف
        </button>
       </div>
       <a href="{{url('course')}}" class="float-start md:text-lg text-sm  bg-theme-3 hover:bg-theme-2 py-2 md:px-3 px-1 text-white  mb-2 rounded-full text-h3 ">{{__('lang.Enroll Now')}}</a>
    </div>

    <div>
        <div x-show="tab === 'info'" class="p-4 bg-white rounded shadow">
          <h2 class="text-xl md:text-2xl  font-bold my-2">محتوى الدورة</h2>
          <div>
            @for($i=1; $i<6 ; $i++)
            <div x-data="{ open: false }" class="p-4">
                <!-- Toggle Button -->
                <button  @click="open = !open"
                    class="  w-full text-right font-semibold flex justify-between  p-2 rounded hover:bg-gray-200 transition"
                    :class="{ 'bg-theme-6': open,    'hover:bg-gray-200': !open }" >
                   <span class="flex text-lg md:text-xl"> <span class="mx-2"> @include('icons.layers') </span> content {{$i}}</span>
                   <span :class="{ 'rotate-180': open }" class="inline-block transform transition-transform duration-300">
                    <svg class="w-4 h-4 transform transition-transform" :class="{'rotate-180': topic.id === openTopicId}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                   </span>
                </button>

                <!-- Collapsible Content -->
                <div  x-show="open" x-transition  class=" p-4 bg-gray-1000 rounded shadow mx-6">
                    <ul>
                        <li class=" flex my-4 ">
                         <span class="mx-2">@include('icons.video2')</span> <span> 3</span>
                         <span class="mx-2">@include('icons.file')</span> <span> 2</span>
                         <span class="mx-2">@include('icons.edu-scroll')</span> <span> 3</span>
                        </li>


                    </ul>
                </div>
            </div>
            @endfor

          </div>
        </div>

        <div x-show="tab === 'reviews'" class="p-4 bg-white rounded shadow">
          <h2 class="text-xl font-bold mb-2">تقييمات الطلاب</h2>
           @php
            $averageRating =4.66;
           @endphp
          <div class=" px-4 py-8">
            <!-- متوسط التقييم -->
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold mb-2">متوسط التقييم</h2>
                <div class="flex justify-center items-center space-x-1 rtl:space-x-reverse text-yellow-400 text-2xl">
                    @for ($j = 1; $j <= 5; $j++)
                        @if ($j <= floor($averageRating))
                            <span>★</span>
                        @elseif ($j - $averageRating < 1)
                            <span class="rtl:rotate-180">@include('icons.star-half')</span>
                        @else
                            <span class="text-gray-300">★</span>
                        @endif
                    @endfor
                </div>
                <p class="text-gray-600 mt-2">{{ number_format($averageRating, 1) }} من 5</p>
            </div>

            <!-- تقييمات المستخدمين -->
            <div class="space-y-6">
                {{-- @forelse ($reviews as $review)
                    <div class="p-4 bg-white rounded shadow">
                        <div class="flex items-center space-x-2 rtl:space-x-reverse mb-2">
                            <strong>{{ $review->user->name }}</strong>
                            <div class="flex text-yellow-400 text-sm">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="{{ $i <= $review->rating ? '' : 'text-gray-300' }}">★</span>
                                @endfor
                            </div>
                        </div>
                        <p class="text-gray-700">{{ $review->comment }}</p>
                    </div>
                @empty
                    <p class="text-center text-gray-500">لا توجد تقييمات بعد.</p>
                @endforelse --}}
                 @for ($m=1; $m<10; $m++)
                    <div class="p-4 bg-white rounded shadow">
                        <div class="flex items-center space-x-2 rtl:space-x-reverse mb-2">
                            <strong>username</strong>
                            <div class="flex text-yellow-400 text-sm">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="{{ $i <= 4 ? '' : 'text-gray-300' }}">★</span>
                                @endfor
                            </div>
                        </div>
                        <p class="text-gray-700">افضل كورس اشتركت فيه </p>
                    </div>

                @endfor
            </div>
          </div>

        </div>

        <div x-show="tab === 'teacher'" class="p-4 bg-white rounded shadow">
          <h2 class="text-xl font-bold mb-2">معلومات المعلم</h2>
            <div class="grid grid-cols-5">
             <img src="{{asset('images/man.png')}}" alt="teacher image " class="h-[30vh] w-[30vh] rounded-lg sm:col-span-1 col-span-2">

             <div class="space-y-3 p-4  sm:col-span-4 col-span-3">
               <h2 class="text-xl font-bold capitalize mb-4 text-theme-2"> teacher  name </h2>
               <h2 class="text-xl font-bold capitalize mb-4 text-theme-2"> teacher  experience  </h2>

               <p class=""> kbhlb klylly ykhkyhly khjkyhjky hykhjky hjykjhky hyjkhykj
                 khkyhjkyh hykhjykh jhjyhjy jhyhnjyh khjykhjyk jhjkyhnyj jhyhjy jhyhjy jhjyh jhyhjy
               </p>
             </div>
            </div>
        </div>
        <div x-show="tab === 'description'" class="p-4 bg-white rounded shadow">
          <h2 class="text-xl font-bold mb-2 capitalize" >  {{__('lang.description') }}</h2>
            <div class="">
              <p>is optimized for learning and training. Examples might be simplified to improve reading and learning. Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content</p>

            </div>
        </div>
    </div>
    </div>


  </div>













@endsection
