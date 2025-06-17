@extends('layouts.app')

@section('title', __('lang.Resend Verification Email'))

@section('content')
<main class="flex justify-center px-1 py-1">

  <div class="w-full max-w-3xl rounded-[2vw]  my-3 px-8 py-4 sm:p-12 transition-all duration-300 ease-in-out bg-theme shadow-md p-8 sm:p-12 border border-lime-500 dark:border-white" >
    <div class=" flex  justify-center">
      <img src="{{asset('images/logo.png')}}" alt="logo" class="h-64" >

    </div>
    <h1 class="text-h1 lg:text-4xl sm:text-3xl text-bolder text-center my-6">  {{ __('lang.Resend Verification Email') }}</h1>

    <div class="mb-6 lg:text-lg  text-sm text-gray-600 dark:text-gray-400">
        {{ __('lang.Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('lang.A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
              <button type="submit" class="theme-btn-md px-6 py-3 rounded-lg font-semibold">
                    {{ __('lang.Resend Verification Email') }}
              </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <div>
            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Log Out') }}
            </button>
            </div>
        </form>
    </div>

  </div>

</main>

@endsection
