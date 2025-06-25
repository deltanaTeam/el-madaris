@extends('layouts.guest')

@section('title', __('lang.grade courses'))

@section('content')


<main class="max-w-7xl mx-auto px-4 py-12 flex-grow flex flex-col items-center bg-body ">
  <!-- Hero Section -->
  <div x-data="{open: false}" class=" max-w-5xl   my-4 w-full">
   <div class="flex items-center max-w-5xl gap-1 w-full">
    <form action="" method="get" class="flex w-3/4" id="oneSearch">
      <div class="relative w-full">
        <span class="absolute inset-y-0 start-0 flex items-center ps-3 text-theme-1">@include('icons.search')</span>
      
        <input type="text" name="search" form="oneSearch" id="" placeholder="{{__('lang.search....')}}" value="{{ request('search')}}" class=" w-full ps-10 pe-4 py-2 border border-form-input rounded-[2vh] focus:outline-none focus:ring-0 focus:border-input w-full">
      </div>
      <button type="submit" form="oneSearch" class="bg-white text-theme-2 px-4 py-2 ms-1 rounded-[2vh] hover:bg-sky-200">@include('icons.search')</button>

      </form>
    
    
    <button @click="open = !open" class="bg-white text-theme-2 px-4 py-2 rounded-[2vh] hover:bg-sky-200">@include('icons.filter')</button>
    </div> 
    <form  id="multiSearch" action="" method="get" x-show="open" x-transition @click.away="open = false" class="mt-4 w-4/5 space-y-4 bg-white p-4 rounded-[2vh] shadow border">
      <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
        <input type="text" value="{{ request('title')}}" form="multiSearch" name="title" class="md:col-span-3 px-4 py-2 border rounded-md w-full focus:outline-none focus:ring-0 focus:border-green-400" placeholder="{{__('lang.name')}}">
        <input type="text" value="{{ request('description')}}" form="multiSearch" name="description" class=" md:col-span-3 px-4 py-2 border rounded-md w-full focus:outline-none focus:ring-0 focus:border-green-400" placeholder="{{__('lang.description')}}">
        <input type="text" value="{{ request('teacher')}}" form="multiSearch" name="teacher" class="md:col-span-2 px-4 py-2 border rounded-md w-full focus:outline-none focus:ring-0 focus:border-green-400" placeholder="{{__('lang.teacher')}}">
        <input type="number" value="{{ request('price')}}" form="multiSearch" name="price" class=" md:col-span-2 px-4 py-2 border rounded-md w-full focus:outline-none focus:ring-0 focus:border-green-400" placeholder="{{__('lang.price')}}">
        <input type="date" value="{{ request('date')}}" form="multiSearch" name="date" class="md:col-span-2 px-4 py-2 border rounded-md w-full focus:outline-none focus:ring-0 focus:border-green-400" placeholder="{{__('lang.price')}}">

      </div>
      <div class="text-end">
        <button type="submit" form="multiSearch" class="bg-theme-3 text-white px-4 py-2 rounded-md hover:bg-theme-2">{{ __('lang.search')}}</button>

      </div>
    </form>
      <hr class="min-h-1 max-w-4xl  my-8 bg-white">

 </div>

<section id="grade" tabindex="-1" class="text-center mb-16 select-none pb-2">
  <h3 id="GradeTitle" class="text-3xl font-bold mb-8 text-h3  tracking-wide select-none">{{$subjects->first()->grade->name}}  {{__('lang.subjects')}}</h3>
    <div class="flex flex-wrap justify-center items-center gap-12">
      @forelse($subjects as $subject)
      @php
        $path = ($subject->image) ? asset('storage/'.$subject->image)  : asset('images/subject.jpg')  ;
      @endphp
      <article tabindex="0" aria-label="Photography Basics Course" class=" md:max-w-sm sm:max-w-xs bg-white rounded-[4vw] shadow-md overflow-hidden cursor-default select-none focus:outline-none focus-visible:ring-4 focus-visible:ring-teal-600 mx-1">
          <img src="{{$path}}" alt="Camera on tripod" class="w-full h-64 object-cover rounded-t-xl" />
          <div class="p-6 flex flex-col h-full">
            <h4 class="text-xl font-extrabold bg-white-text mb-2">{{$subject->name}}</h4>
            <p class="bg-white-text flex-grow">{{ Str::limit($subject->description, 100) }}</p>
            <div class=" flex flex-nowrap justify-between items-center overflow-x-auto gap-2  ">
                <div class=" flex flex-nowrap justify-between items-center">
                  <span class="text-gray-600 p-1 px-2 rounded-full m-2">@include('icons.users')</span>
                  <span class="text-gray-600  p-1 px-2 rounded-full m-2">{{$subject->students_count}}</span>
                  
                </div>
                  <div class=" flex flex-nowrap justify-between items-center">
                  <span class="text-gray-600 p-1 px-2 rounded-full m-2">@include('icons.stage')</span>
                  <span class="text-gray-600 p-1 px-2 rounded-full m-2">{{$subject->stages_count}}</span>
                  
                </div>
            </div>
            
            <button class="btn-enroll bg-theme-3 hover:bg-theme-2 text-white text-lg font-bold">{{__('lang.Enroll Now')}}</button>

          </div>
        </article>
      
      @empty
      <p>{{__('lang.No Grades Added Yet')}}</p>
      @endforelse
      <div class="flex flex-wrap justify-center items-center w-full my-3">
        <p class="max-w-[1vw] my-2 p-6">{{ $subjects->appends(['search' => request('search')])->links()}}</p>
          
      </div>
      
    </div>
</section>









 </main>


@endsection
