@extends('layouts.guest')

@section('title', __('lang.Forgot password'))

@section('content')
<main class="flex justify-center px-1 py-1">

  <div class="w-full max-w-3xl rounded-[2vw]  my-3 px-8 py-4 sm:p-12 transition-all duration-300 ease-in-out bg-theme shadow-md p-8 sm:p-12 border border-lime-500 dark:border-white" >
    <div class=" flex  justify-center">
      <img src="{{asset('images/logo.png')}}" alt="logo" class="h-64" >

    </div>
    <h1 class="text-h1 lg:text-4xl sm:text-3xl text-bolder text-center my-6">  {{ __('lang.Forgot password') }}</h1>

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('lang.Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
          <label for="email" class="block text-sm text-h1 font-medium mb-1">{{__('lang.email')}}</label>
          <input type="email" id="email" name="email" required class="w-full px-4 py-3 rounded-lg border border-lime-500  focus:border-input"
            placeholder="you@example.com" />
        </div>

        <div class="flex items-center justify-end mt-4">
          <button type="submit" class="theme-btn-md px-6 py-3 rounded-lg font-semibold">
                {{ __('lang.Email Password Reset Link') }}
          </button>

        </div>
    </form>
  </div>

</main>

@endsection
