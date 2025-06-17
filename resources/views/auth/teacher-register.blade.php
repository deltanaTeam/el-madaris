@extends('layouts.guest')

@section('title', __('lang.teacher register'))

@section('content')

<main class="grid grid-cols-1 md:grid-cols-2 px-1 py-1">
  <div class="w-full px-8 py-4 sm:p-12 transition-all duration-300 ease-in-out " x-data="{ step: 1, profileName: '', cvName: '' }">

    <!-- Progress Indicator -->

    <div class="w-full flex mb-6 justify-center space-x-12">
      <div class="flex flex-col items-center font-semibold after:content-[''] after:inline-block after:w-14 after:h-[2px] after:mt-2 after:rounded"
        :class="step === 1 ? 'text-h1 after:bg-theme' : 'text-gray-400 after:bg-gray-300'">
        <span :class="step === 1 ? 'bg-theme-3' : 'bg-gray-300'" class="text-2xl rounded-full p-1 px-3">1</span>
        <span class="mt-1 text-sm mx-10">{{__('lang.account')}}</span>
      </div>
      <h1 class="text-h1 text-3xl text-bolder text-center mx-3 pb-3 ">{{__('lang.teacher register')}}</h1>
      <div class="flex flex-col items-center font-semibold"
        :class="step === 2 ? 'text-h1 after:bg-theme' : 'text-gray-400 after:bg-gray-300'">
        <span :class="step === 2 ? 'bg-theme-3' : 'bg-gray-300'" class="text-2xl rounded-full p-1 px-3">2</span>
        <span class="mt-1 text-sm mx-10">{{__('lang.details')}}</span>
      </div>
    </div>

    <!-- Form Start -->
    <form method="POST" action="{{ route('teachers.register') }}" enctype="multipart/form-data">
      @csrf

      <!-- Step 1 -->
      <div x-show="step === 1" class="space-y-6" x-cloak>
        <div>
          <label for="name" class="block text-sm text-h1 font-medium mb-1">{{__('lang.full name')}}</label>
          <input type="text" id="name" value="{{old('name')}}" name="name" required class="w-full px-4 py-3 rounded-lg border border-lime-500 focus:border-input"
            placeholder="{{__('lang.Enter your full name')}}" />
        </div>

        <div>
          <label for="email" class="block text-sm text-h1 font-medium mb-1">{{__('lang.email')}}</label>
          <input type="email" id="email" value="{{old('email')}}" name="email" required class="w-full px-4 py-3 rounded-lg border border-lime-500 focus:border-input"
            placeholder="you@example.com" />
        </div>

        <div>
          <label for="phone" class="block text-sm text-h1 font-medium mb-1">{{__('lang.phone')}}</label>
          <input type="tel" id="phone" name="phone" required
            class="w-full px-4 py-3 rounded-lg border border-lime-500 focus:border-input" value="{{old('phone')}}"
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
          <a href="{{route('register')}}" class=" theme-btn-md  px-6 py-3 rounded-lg font-semibold">{{__('lang.student register')}}</a>

          <button type="button" @click="step = 2"
            class="theme-btn-md px-6 py-3 rounded-lg font-semibold">{{__('lang.next')}}</button>
        </div>
      </div>

      <!-- Step 2 -->
      <div x-show="step === 2" class="space-y-6" x-cloak>
        <div>
          <label for="address" class="block text-sm text-h1 font-medium mb-1">{{__('lang.address')}}</label>
          <textarea id="address" name="address" rows="3" required
            class="w-full px-4 py-3 rounded-lg border border-lime-500 focus:border-input"
            placeholder="{{__('lang.Enter your full address')}}">{{old('address')}}</textarea>
        </div>

        <div class="flex items-center space-x-4 w-full">
          <label for="profileImage"
            class="cursor-pointer w-full inline-flex items-center px-4 p-4 bg-stone-300 text-stone-900 text-sm font-medium rounded-md shadow hover:bg-stone-400 transition">
            @include('icons.image1')
            <span class="mx-1">{{__('lang.profile image')}} </span>

            <p class="text-sm text-gray-50 px-3 border border-gray-200" x-show="profileName" x-text="profileName">:</p>

          </label>
          <input id="profileImage" name="profileImage" type="file" class="hidden" accept="image/*" @change="profileName = $event.target.files[0]?.name || ''"/>



        </div>

        <div>
          <label for="specialization" class="block text-sm text-h1 font-medium mb-1">{{__('lang.specialization')}}</label>
          <input type="text" id="specialization" name="specialization" value="{{old('specialization')}}"required
            class="w-full px-4 py-3 rounded-lg border border-lime-500 focus:border-input"
            placeholder="{{__('lang.Your area of expertise')}}" />
        </div>

        <div>
          <label for="experience" class="block text-sm text-h1 font-medium mb-1">{{__('lang.experience')}} ({{__('lang.years')}})</label>
          <input type="number" id="experience" value="{{old('experience')}}" name="experience" min="0" max="100" required
            class="w-full px-4 py-3 rounded-lg border border-lime-500 focus:border-input"
            placeholder="{{__('lang.Number of years')}}" />
        </div>

        <div class="flex items-center space-x-4 w-full">
          <label for="cvFile"
            class="cursor-pointer w-full inline-flex items-center px-4 p-4 bg-zinc-300 text-zinc-900 text-sm font-medium rounded-md shadow hover:bg-zinc-400 transition">
            @include('icons.file-cv')
            <span class="mx-1"> {{__('lang.Upload CV')}} </span>
            <p class="text-sm text-gray-50 px-3 border-gray-200" x-show="cvName" x-text="cvName">:</p>

          </label>
          <input id="cvFile" name="cvFile" type="file" class="hidden" accept=".pdf,.doc,.docx" @change="cvName = $event.target.files[0]?.name || ''"/>
          <br>

        </div>

        <div class="flex justify-between">

          <button type="button" @click="step = 1"
            class="theme-btn-md bg-gray-300 text-gray-800 px-6 py-3 rounded-lg hover:bg-gray-400">
            {{__('lang.back')}}
          </button>
          <button type="submit" class="theme-btn-md px-6 py-3 rounded-lg font-semibold">
            {{__('lang.submit')}}
          </button>
        </div>
      </div>
    </form>
  </div>

  <div>
    <img src="{{ asset('images/teach-log.png') }}" alt="img" class="min-h-[100vh]" />
  </div>
</main>

@endsection
