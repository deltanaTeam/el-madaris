
<header class="bg-header text-header  sticky top-0 z-30 py-2 ">

  <nav class=" " x-data="{ open: false }">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
         <div class="flex justify-between h-20 items-center">

             <!-- Logo -->
             <div class="flex items-start">
                 <a href="" class="button-header rounded-md px-2  transition-colors ">
                     <img class="h-12 rounded-full " src="{{asset('images/logo.PNG')}}" alt="Logo">
                 </a>

             </div>



             <!-- Hamburger (Mobile) -->
             <div class="md:hidden">
                 <button @click="open = !open" class="button-header focus:outline-none">
                     <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               d="M4 6h16M4 12h16M4 18h16"/>
                     </svg>
                     <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               d="M6 18L18 6M6 6l12 12"/>
                     </svg>
                 </button>
             </div>

             <!-- Desktop Links -->
             <div class="hidden md:flex md:items-center md:space-x-6 rtl:space-x-reverse">

               <button onclick="document.documentElement.classList.toggle('dark')" class="button-header rounded-md px-3 py-1 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">
                  @include('layouts.icons.dark_mode') @include('layouts.icons.light-mode')
               </button>
               <!-- Language Dropdown -->
               <div x-data="{ langOpen: false }" class="relative drop-nav">
                  <button @click="langOpen = !langOpen"
                          class="flex items-center space-x-2 rtl:space-x-reverse px-3 py-1 button-header rounded-md focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">
                          {{ app()->getLocale() === 'ar' ? 'ع' : 'EN' }}
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7"/>
                      </svg>
                  </button>
                  <div x-show="langOpen"
                       @click.away="langOpen = false"
                       class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                       @forelse(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                      <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                         class="block px-4 py-2 hover:bg-theme-4 text-theme-2">{{ $properties['native'] }}</a>

                       @empty
                       @endforelse
                  </div>
               </div>
               <!-- end Language Dropdown -->
               <!-- grades Dropdown -->
               <div x-data="{ gradOpen: false }" class="relative drop-nav">
                  <button @click="gradOpen = !gradOpen"
                          class="flex items-center space-x-2 rtl:space-x-reverse px-3 py-1 button-header rounded-md focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">
                          {{__('lang.grades')}}
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7"/>
                      </svg>
                  </button>
                  <div x-show="gradOpen"
                       @click.away="gradOpen = false"
                       class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                       @forelse(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                      <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                         class="block px-4 py-2 hover:bg-theme-4 text-theme-2">{{ $properties['native'] }}</a>

                       @empty
                       @endforelse
                  </div>
               </div>
               <!-- end grades Dropdown -->
                 <a href="#" class="button-header rounded-md px-3 py-1 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">{{ __('lang.home') }}</a>
                 <a href="#" class="button-header rounded-md px-3 py-1 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">{{ __('lang.contact us') }}</a>
                 <a href="{{route('login')}}" class="button-header rounded-md px-3 py-1 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">{{__('lang.login')}} </a>
                 <!-- Search -->

             </div>
         </div>

         <!-- Mobile Menu (Toggles) -->
         <div x-show="open" class="md:hidden mt-4 space-y-2">
           <button onclick="document.documentElement.classList.toggle('dark')">
              @include('layouts.icons.dark_mode') @include('layouts.icons.light-mode')
          </button>
           <!-- Language Dropdown -->
           <div x-data="{ langOpen: false }" class="relative  w-full p-end-6/10">
              <a @click="langOpen = !langOpen"
                      class=" block flex items-center  hover:bg-theme-3 hover:text-theme-1 rounded-md px-3 py-1 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">
                   {{ app()->getLocale() === 'ar' ? 'ع' : 'EN' }}
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7"/>
                  </svg>
              </a>
              <div x-show="langOpen"
                   @click.away="langOpen = false"
                   class="absolute end-0 mt-2 w-full bg-white border border-gray-200 rounded-md shadow-lg z-50">
                  <a href=""
                     class="block px-4 py-2 hover:bg-theme-4 text-theme-1">English</a>
                  <a href=""
                     class="block px-4 py-2 hover:bg-theme-4 text-theme-1">العربية</a>
              </div>
           </div>
           <!-- end Language Dropdown -->
           <!-- grad Dropdown -->
           <div x-data="{ gradOpen: false }" class="relative  w-full p-end-6/10">
              <a @click="gradOpen = !gradOpen"
                      class=" block flex items-center  hover:bg-theme-3 hover:text-theme-1 rounded-md px-3 py-1 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">
                   {{ __('lang.grades')}}
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7"/>
                  </svg>
              </a>
              <div x-show="gradOpen"
                   @click.away="gradOpen = false"
                   class="absolute end-0 mt-2 w-full bg-white border border-gray-200 rounded-md shadow-lg z-50">
                  <a href=""
                     class="block px-4 py-2 hover:bg-theme-4 text-theme-1">English</a>
                  <a href=""
                     class="block px-4 py-2 hover:bg-theme-4 text-theme-1">العربية</a>
              </div>
           </div>
           <!-- end Language Dropdown -->
             <a href="#" class="block hover:bg-theme-3 hover:text-theme-1 rounded-md px-3 py-1 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">{{ __('lang.home') }}</a>
             <a href="#" class="block hover:bg-theme-3 hover:text-theme-1 rounded-md px-3 py-1 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">{{ __('lang.contact us') }}</a>
             <a href="{{route('login')}}" class="block hover:bg-theme-3 hover:text-theme-1 rounded-md px-3 py-1 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-700">{{__('lang.login')}} </a>

         </div>
     </div>
  </nav>
</header>
