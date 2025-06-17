@extends('layouts.guest')

@section('title', __('lang.register type'))

@section('content')
<main class="flex-grow flex items-center justify-center px-4 py-10">
  <div
    class="w-full max-w-3xl bg-body rounded-xl shadow-md p-8 sm:p-12 border border-lime-500 dark:border-white transition-all duration-300 ease-in-out"
    >
    <div class=" flex  justify-center">
      <img src="{{asset('images/logo.png')}}" alt="logo" class="h-64" >

    </div>
     <h1 class="text-2xl sm:text-xl md:text-2xl lg:text-3xl uppercase
       font-extrabold text-h1 mb-4 leading-tight text-center  mx-auto">{{__('lang.Welcome to your educational platform.')}}</h1>

     <h4 class="text-xl sm:text-lg md:text-lg lg:text-xl
       font-bold text-h4 mb-4 leading-tight text-center  mx-auto">{{__('lang.Register as a student or teacher and start your journey in learning or teaching easily.')}}</h4>
     <div class="flex  justify-between border-4 border border-lime-500 dark:border-white rounded-lg pt-4 my-2">
       <div class="mx-2">
         @include('icons.teacher')

       </div>
       <div class="my-3 ">
         <h3 class="text-h3 font-bold"> {{__('lang.teacher')}}</h3>
         <p class="text-h4">{{__('lang.you can register as a teacher')}}</p>
       </div>
       <a href="{{route('teachers.register')}}" class="h-12 theme-btn-md ">
       {{__('lang.register')}}
       </a>
     </div>
     <div class="flex  justify-between border-4 border border-lime-500 dark:border-white rounded-lg pt-4 my-2">
       <div class="mx-3">
         @include('icons.student')

       </div>
       <div class="my-3 m-end-12">
          <h3 class="text-h3 font-bold">{{__('lang.student')}}</h3>
          <p class="text-h4">{{__('lang.you can register as a student')}}</p>

       </div>
       <a href="{{route('register')}}" class=" h-12 theme-btn-md  ">
       {{__('lang.register')}}
       </a>
     </div>


  </div>
</main>


@endsection
