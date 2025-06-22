@extends('layouts.guest')

@section('title', "teacher")

@section('content')
<section dir="rtl" class="py-12 bg-gray-100">
  <div class="max-w-5xl mx-auto   px-4">
    <div class="bg-white rounded-2xl shadow-lg p-6  text-theme-2 grid grid-cols-1  md:grid-cols-3 gap-6">

      {{-- صورة المدرس --}}
      <div class="flex-shrink-0 col-span-1">
        <img src="{{ asset('images/man.png')}}" alt="صورة المدرس" class="rounded-2xl w-full h-auto object-cover shadow-md">
      </div>

      {{-- بيانات المدرس --}}
      <div class=" w-full  md:col-span-2 mt-6 md:mt-0">
        <h1 class="text-3xl font-bold text-theme-1 w-full">اسم المدرس</h1>
        <p class=" mt-2"><span class="font-semibold">التخصص:</span> فيزياء</p>

        

        {{-- سيرة ذاتية --}}
        <div class="mt-4  leading-relaxed">
          <h2 class="text-xl font-semibold mb-2">نبذة عن المدرس:</h2>
          <p>
             مدرس ذو خبرة عالية في مجاله، يهتم بتقديم أفضل تجربة تعليمية للطلاب.
                          مدرس ذو خبرة عالية في مجاله، يهتم بتقديم أفضل تجربة تعليمية للطلاب.
             مدرس ذو خبرة عالية في مجاله، يهتم بتقديم أفضل تجربة تعليمية للطلاب.
             مدرس ذو خبرة عالية في مجاله، يهتم بتقديم أفضل تجربة تعليمية للطلاب.
             مدرس ذو خبرة عالية في مجاله، يهتم بتقديم أفضل تجربة تعليمية للطلاب.

          </p>
     
       </div>
        <div class="mt-4  flex justify-between">
          <h2 class="text-xl font-semibold mb-3"> الكورسات </h2>
          <a href="" class="theme-btn-md "> كورسات المدرس</a>
     
       </div>
      </div>
    </div>
  </div>
</section>
@endsection
