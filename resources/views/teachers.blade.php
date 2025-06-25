@extends('layouts.guest')

@section('title', 'جميع المدرسين')

@section('content')
@php
  $teachers = [
    [
      'id' => 1,
      'name' => 'أ. محمد عبد الله',
      'specialization' => 'الرياضيات',
      'photo' => 'https://randomuser.me/api/portraits/men/11.jpg',
      'rating' => 4,
    ],
    [
      'id' => 2,
      'name' => 'د. فاطمة الزهراء',
      'specialization' => 'اللغة العربية',
      'photo' => 'https://randomuser.me/api/portraits/women/12.jpg',
      'rating' => 5,
    ],
    [
      'id' => 3,
      'name' => 'أ. أحمد حسن',
      'specialization' => 'العلوم',
      'photo' => 'https://randomuser.me/api/portraits/men/13.jpg',
      'rating' => 3,
    ],
    [
      'id' => 4,
      'name' => 'د. ليلى عبد العزيز',
      'specialization' => 'اللغة الإنجليزية',
      'photo' => 'https://randomuser.me/api/portraits/women/14.jpg',
      'rating' => 5,
    ],
    [
      'id' => 5,
      'name' => 'أ. خالد محمود',
      'specialization' => 'الفيزياء',
      'photo' => 'https://randomuser.me/api/portraits/men/15.jpg',
      'rating' => 4,
    ],
    [
      'id' => 6,
      'name' => 'أ. سارة عادل',
      'specialization' => 'الكيمياء',
      'photo' => 'https://randomuser.me/api/portraits/women/16.jpg',
      'rating' => 4,
    ],
  ];
@endphp
<section  class="py-12 ">
  <div class="max-w-7xl mx-auto px-4">
    <h1 class="text-3xl font-bold text-center text-h1 mb-10">جميع المدرسين</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      @foreach ($teachers as $teacher)
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">
          <img src="{{ asset('images/man.png')}}" class="w-full md:h-60 h-auto object-cover" alt="صورة المدرس">

          <div class="p-4">
            <h3 class="text-xl font-semibold text-theme-2">{{ $teacher["name"] }}</h3>
            <p class="text-theme-3 mt-1">التخصص: {{ $teacher["specialization"] }}</p>


            <div class="my-4 w-full">
              <a href="{{url('teachers\show')}}" class="rounded-full text-white text-center block px-3 py-2 my-4 transition-colors text-sm  theme-btn-md ">
                          عرض الملف الشخصي
              </a>
            </div>

          </div>
        </div>


      @endforeach
    </div>
  </div>
</section>
@endsection
