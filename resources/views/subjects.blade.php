@extends('layouts.guest')

@section('title', 'جميع المواد')

@section('content')
@php
  $subjects = [
    [
      'id' => 1,
      'name' => 'الرياضيات',
      'description'=>'هذا النص هو نص عشوائي لا يمثل تاواقع باي صلة',
      'color' =>'#ac3973'
    ],

    [
      'id' => 2,
      'name' => 'اللغة العربية',
      'description'=>'هذا النص هو نص عشوائي لا يمثل تاواقع باي صلة',
      'color' =>'#9900ff'

    ],
    [
      'id' => 3,
      'name' => 'العلوم',
      'description'=>'هذا النص هو نص عشوائي لا يمثل تاواقع باي صلة',
      'color' =>'#cc6600'
    ],
    [
      'id' => 4,
      'name' => 'اللغة الإنجليزية',
      'description'=>'هذا النص هو نص عشوائي لا يمثل تاواقع باي صلة',
      'color' =>'#00cc00'
    ],
    [
      'id' => 5,
      'name' => 'الفيزياء',
      'description'=>'هذا النص هو نص عشوائي لا يمثل تاواقع باي صلة',
      'color' =>'#3399ff'
    ],
    [
      'id' => 6,
      'name' => 'الكيمياء',
      'description'=>'هذا النص هو نص عشوائي لا يمثل تاواقع باي صلة',
      'color' =>'#ff0066'
    ],
  ];
@endphp
<section  class="py-12 ">
  <div class="max-w-7xl mx-auto px-4">
    <h1 class="text-3xl font-bold text-center text-h1 mb-10">جميع مواد الصف الثاني الثانوي</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      @foreach ($subjects as $subject)
        <div class=" rounded-2xl font-bold shadow hover:shadow-lg transition overflow-hidden" style="background-color:{{$subject['color']}}">

          <div class="p-4">
            <h3 class="text-2xl text-center font-bold text-white">{{ $subject["name"] }}</h3>
            <p class="text-white text-lg mt-2"> {{ $subject["description"] }}</p>


            <div class="my-4 w-full flex justify-end">
              <a href="{{url('subject-cources')}}" class="rounded-lg text-theme-1 text-center  px-3 py-2 my-4 transition-colors text-sm shadow-lg  bg-white hover:bg-gray-200 ">
                          عرض الدورات
              </a>
            </div>

          </div>
        </div>


      @endforeach
    </div>
  </div>
</section>
@endsection
