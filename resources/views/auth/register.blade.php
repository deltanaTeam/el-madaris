@extends('layouts.guest')

@section('title', __('lang.student register'))

@section('content')
<main class="grid grid-cols-1 md:grid-cols-2 px-1 py-1">
  <div class="w-full px-8 py-4 sm:p-12 transition-all duration-300 ease-in-out " >

  <h1 class="text-h1 text-3xl text-bolder text-center">{{__('lang.student register')}}</h1>

    <!-- Form Start -->
    <form method="POST" action="{{ route('register') }}"  class="space-y-6" >
      @csrf

      <!-- Step 1 -->
        <div >
          <label for="name" class="block text-sm text-h1 font-medium mb-1">{{__('lang.full name')}}</label>
          <input type="text" id="name" name="name" required class="w-full px-4 py-3 rounded-lg border border-lime-500 focus:border-input"
            placeholder="{{__('lang.Enter your full name')}}" />
        </div>

        <div>
          <label for="email" class="block text-sm text-h1 font-medium mb-1">{{__('lang.email')}}</label>
          <input type="email" id="email" name="email" required class="w-full px-4 py-3 rounded-lg border border-lime-500 focus:border-input"
            placeholder="you@example.com" />
        </div>

        <div>
          <label for="phone" class="block text-sm text-h1 font-medium mb-1">{{__('lang.phone')}}</label>
          <input type="tel" id="phone" name="phone" required
            class="w-full px-4 py-3 rounded-lg border border-lime-500 focus:border-input"
            placeholder="+54545454544" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" />
        </div>

        <div>
          <label for="password" class="block text-sm text-h1 font-medium mb-1">{{__('lang.password')}}</label>
          <input type="password" id="password" name="password" required minlength="8"
            class="w-full px-4 py-3 rounded-lg border border-lime-500 focus:border-input"
            placeholder="{{__('lang.Create a password')}}" />
        </div>

        <div>
          <label for="password_confirmation" class="block text-sm text-h1 font-medium mb-1">{{__('lang.Confirm Password')}}</label>
          <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8"
            class="w-full px-4 py-3 rounded-lg border border-lime-500 focus:border-input"
            placeholder="{{__('lang.Confirm Password')}}" />
        </div>


        <div class="flex justify-between">
          <a href="{{route('teachers.register')}}" class=" theme-btn-md  px-6 py-3 rounded-lg font-semibold">{{__('lang.teacher register')}}</a>

          <button type="submit" class="theme-btn-md px-6 py-3 rounded-lg font-semibold">
            {{__('lang.submit')}}
          </button>
        </div>
    </form>
  </div>

  <div>
    <img src="{{ asset('images/stud-log.png') }}" alt="img" class="min-h-[100vh] rounded-lg" />
  </div>
</main>

@endsection
