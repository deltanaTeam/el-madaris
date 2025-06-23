
<footer class="bg-footer p-8   bottom-0" x-data="{
    open: { contact: false, company: false, app: false },
    isDesktop: window.innerWidth >= 768,
    updateScreen() {
      this.isDesktop = window.innerWidth >= 768;
    }
  }"
  x-init="updateScreen()"
  @resize.window="updateScreen">
  <div class="max-w-7xl mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

      <!-- الوصول إلينا -->
      <div>
        <h3 class="text-lg font-bold flex justify-between items-center mb-4">
          {{__('lang.contact us')}}
          <button class="md:hidden" @click="open.contact = !open.contact"  >
            <svg class="w-5 h-5 transform transition-transform" :class="{'rotate-180': open.contact}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
        </h3>
        <div x-show="open.contact || isDesktop" x-transition>
          <ul class="space-y-2 text-sm">
            <li class="grid grid-cols-6 gap-2"> <span class=" w-8">@include('icons.phone')</span><span class="col-span-5 ">+964 770 009 5529 </span></li>
            <li class="grid grid-cols-6 gap-2"> <span class=" w-8">@include('icons.email')</span><span class="col-span-5 ">info@example.com </span></li>
            <li class="grid grid-cols-6 gap-2"> <span class="w-8">@include('icons.location')</span><span class="col-span-5 "> {{__('lang.address')}}  </span></li>
          </ul>
        </div>
      </div>

      <!-- الشركه -->
      <div>
        <h3 class="text-lg font-bold flex justify-between items-center mb-4">
          {{__('lang.site')}}
          <button class="md:hidden" @click="open.company = !open.company">
            <svg class="w-5 h-5 transform transition-transform" :class="{'rotate-180': open.company}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
        </h3>
        <div x-show="open.company || isDesktop" x-transition>
          <ul class="space-y-2 text-sm">
            <li><a href="#" class="footer-link">{{__('lang.home')}}</a></li>
            <li><a href="#" class="footer-link">{{__('lang.login')}}</a></li>
            <li><a href="#" class="footer-link">{{__('lang.contact us')}}</a></li>
          </ul>
        </div>
      </div>

      <!-- تنزيل التطبيق -->
      <div>
        <h3 class="text-lg font-bold flex justify-between items-center mb-4">
          {{__('lang.app download')}}
          <button class="md:hidden" @click="open.app = !open.app">
            <svg class="w-5 h-5 transform transition-transform" :class="{'rotate-180': open.app}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
        </h3>
        <div x-show="open.app || isDesktop" x-transition>
          <div class="flex flex-col space-y-2">
            <a href="#"><img src="{{ asset('images/apple_store.png') }}" alt="Apple Store" width="100"></a>
            <a href="#"><img src="{{ asset('images/play_store.png') }}" alt="Google Play" width="100"></a>
          </div>
        </div>
      </div>

      <!-- Logo & Social -->
      <div class="flex flex-col items-end space-y-4">
        <img src="{{asset('images/logo.png')}}" alt="logo" class="rounded-full w-24 ">
        <div class="flex space-x-3 rtl:space-x-reverse">
          <a href="#" class="footer-link">
            <span>
              <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                 <path d="M22 12c0-5.522-4.478-10-10-10S2 6.478 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54v-2.891h2.54V9.845c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.242 0-1.63.771-1.63 1.562v1.875h2.773l-.443 2.891h-2.33v6.987C18.343 21.128 22 16.991 22 12z"/>
              </svg>
            </span>
          </a>
          <a href="#" class="footer-link">
            <span>
              <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2.163c3.204 0 3.584.012 4.849.07 1.366.062 2.633.336 3.608 1.31.975.975 1.248 2.242 1.31 3.608.058 1.265.07 1.645.07 4.849s-.012 3.584-.07 4.849c-.062 1.366-.336 2.633-1.31 3.608-.975.975-2.242 1.248-3.608 1.31-1.265.058-1.645.07-4.849.07s-3.584-.012-4.849-.07c-1.366-.062-2.633-.336-3.608-1.31-.975-.975-1.248-2.242-1.31-3.608C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.849c.062-1.366.336-2.633 1.31-3.608.975-.975 2.242-1.248 3.608-1.31C8.416 2.175 8.796 2.163 12 2.163zm0 1.838c-3.17 0-3.548.012-4.796.07-1.012.047-1.56.215-1.92.36-.482.19-.828.418-1.19.78s-.59.708-.78 1.19c-.145.36-.313.908-.36 1.92-.058 1.248-.07 1.626-.07 4.796s.012 3.548.07 4.796c.047 1.012.215 1.56.36 1.92.19.482.418.828.78 1.19s.708.59 1.19.78c.36.145.908.313 1.92.36 1.248.058 1.626.07 4.796.07s3.548-.012 4.796-.07c1.012-.047 1.56-.215 1.92-.36.482-.19.828-.418 1.19-.78s.59-.708.78-1.19c.145-.36.313-.908.36-1.92.058-1.248.07-1.626.07-4.796s-.012-3.548-.07-4.796c-.047-1.012-.215-1.56-.36-1.92-.19-.482-.418-.828-.78-1.19s-.708-.59-1.19-.78c-.36-.145-.908-.313-1.92-.36-1.248-.058-1.626-.07-4.796-.07zM12 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a3.999 3.999 0 110-7.998 3.999 3.999 0 010 7.998zm6.406-11.845a1.44 1.44 0 11-2.881 0 1.44 1.44 0 012.881 0z"/>
              </svg>
            </span>
          </a>
          <a href="#" class="footer-link">
            <span>
              <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>
              </svg>
            </span>
          </a>
          <a href="#" class="footer-link">
            <span>
              <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M16 8a6 6 0 016 6v6h-4v-6a2 2 0 00-4 0v6h-4v-6a6 6 0 016-6zM2 9h4v12H2z"/>
                <circle cx="4" cy="4" r="2"/>
              </svg>
            </span>
          </a>
        </div>
      </div>

    </div>

    <hr class="my-6 border-gray-300">

    <div class="text-center text-sm">
      {{__('lang.all right reserved © ')}}  2025
    </div>
  </div>
</footer>
