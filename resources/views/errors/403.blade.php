@extends('layouts.guest')

@section('title', 403)

@section('content')
<div class="  min-h-screen  mx-auto bg-no-repeat" style="background:url({{ asset('images/403.png') }}); background-repeat: no-repeat;background-repeat: no-repeat;
  background-size: cover;  background-position: top center;


  " >
  <!-- الصورة -->


  <!-- النص فوق الصورة -->
  <div class=" flex items-center justify-center">
    <h2 class="text-theme-3 lg:text-6xl text-4xl  font-extrabold  px-4 py-8 rounded">
      {{__('lang.Forbidden')}}
    </h2>
  </div>
</div>



@endsection
