@extends('layouts.guest')

@section('title', __('lang.login'))

@section('content')
<main class="flex justify-center px-1 py-1">
  <div class="w-full max-w-3xl rounded-[2vw]  my-3 px-8 py-4 sm:p-12 transition-all duration-300 ease-in-out bg-white shadow-md p-8 sm:p-12  " >
    <div class=" flex  justify-center">
      <img src="{{asset('images/logo.png')}}" alt="logo" class="h-64" >

    </div>
  <h1 class="text-h1 text-2xl md:text-4xl font-bold text-center">{{__('lang.Log in')}}</h1>

    <!-- Form Start -->
    <form method="POST" action="{{ route('login') }}"  class="space-y-6" >
      @csrf



        <div>
          <label for="email" class="block text-sm text-h1 font-medium mb-1">{{__('lang.email')}}</label>
          <input type="email" id="email" name="email" value="{{old('email')}}" required class="w-full px-4 py-3 rounded-lg border-2 border-form-input  focus:border-input"
            placeholder="you@example.com" />
        </div>



        <div>
          <label for="password" class="block text-sm text-h1 font-medium mb-1">{{__('lang.password')}}</label>
          <input type="password" id="password" name="password" required minlength="8"
            class="w-full px-4 py-3 rounded-lg border-2 border-form-input  focus:border-input"
            placeholder="{{__('lang.Create a password')}}" />
        </div>

        <div class="forget-password-div flex justify-between items-center">
          <!-- Remember Me -->

          <div class="flex items-center">
            <input id="remember_me" name="remember" type="checkbox"
              class=" h-6 w-6 text-sky-600 focus:ring-sky-500 border-gray-300 rounded">
            <label for="remember_me" class="mx-2 text-sm text-h2">
              {{ __('lang.Remember me') }}
            </label>
          </div>

          <!-- Forgot Password -->
          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-sm text-h2 underline hover:text-lime-600 transition">
              {{ __('lang.Forgot your password?') }}
            </a>
          @endif
        </div>


        <div class="flex justify-between">
          <a href="{{route('type.register')}}" class=" theme-btn-md  px-6 py-3 rounded-lg font-semibold">{{__('lang.new register')}}</a>

          <button type="submit" class="theme-btn-md px-6 py-3 rounded-lg font-semibold">
            {{__('lang.submit')}}
          </button>
        </div>

    </form>
  </div>


</main>

@endsection
