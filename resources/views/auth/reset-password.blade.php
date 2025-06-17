@extends('layouts.guest')

@section('title', __('lang.Reset Password'))

@section('content')
<main class="flex justify-center px-1 py-1">
  <div class="w-full max-w-2xl rounded-[2vw]  px-8 py-4 sm:p-12 transition-all duration-300 ease-in-out bg-theme shadow-md p-8 sm:p-12 border border-lime-500 dark:border-white" >
    <div class=" flex  justify-center">
      <img src="{{asset('images/logo.png')}}" alt="logo" class="h-64" >

    </div>
  <h1 class="text-h1 text-3xl text-bolder text-center">{{__('lang.Reset Password')}}</h1>

    <!-- Form Start -->

    <form method="POST" action="{{ route('password.store') }}" class="space-y-6" >
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
          <label for="email" class="block text-sm text-h1 font-medium mb-1">{{__('lang.email')}}</label>
          <input type="email" id="email" name="email" required class="w-full px-4 py-3 rounded-lg border border-lime-500  focus:border-input"
            placeholder="you@example.com" />
        </div>



        <div>
          <label for="password" class="block text-sm text-h1 font-medium mb-1">{{__('lang.password')}}</label>
          <input type="password" id="password" name="password" required minlength="8"
            class="w-full px-4 py-3 rounded-lg border border-lime-500  focus:border-input"
            placeholder="{{__('lang.password')}}" />
        </div>

        <div>
          <label for="password_confirmation" class="block text-sm text-h1 font-medium mb-1">{{__('lang.Confirm Password')}}</label>
          <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8"
            class="w-full px-4 py-3 rounded-lg border border-lime-500 focus:border-input"
            placeholder="{{__('lang.Confirm Password')}}" />
        </div>



        <div class="flex items-center justify-end mt-4">
          <button type="submit" class="theme-btn-md px-6 py-3 rounded-lg font-semibold">
            {{__('lang.Reset Password')}}
          </button>

        </div>
    </form>
  </div>


</main>

@endsection
