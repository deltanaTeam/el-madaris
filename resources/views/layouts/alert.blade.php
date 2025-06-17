@if(session('success'))
<div x-data="{ show: true }" x-show="show" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold">{{__('lang.success')}}</strong>
  <span class="block sm:inline">{{__('lang.'.session('success'))}}</span>
  <span class="absolute top-0 bottom-0 start-0 px-4 py-3">
    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 20 20" @click="show = false">
      <path d="M14.348 5.652a1 1 0 00-1.414-1.414L10 7.172 7.066 4.238a1 1 0 00-1.414 1.414L8.586 8.586 5.652 11.52a1 1 0 001.414 1.414L10 9.828l2.934 2.934a1 1 0 001.414-1.414L11.414 8.586l2.934-2.934z"/>
    </svg>
  </span>
</div>



@endif
@if(session('status'))


 <div x-data="{ show: true }" x-show="show" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
   <strong class="font-bold">{{__('lang.success')}}</strong>
   <span class="block sm:inline">{{__('lang.'.session('status'))}}</span>
   <span class="absolute top-0 bottom-0 start-0 px-4 py-3">
     <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
       viewBox="0 0 20 20" @click="show = false">
       <path d="M14.348 5.652a1 1 0 00-1.414-1.414L10 7.172 7.066 4.238a1 1 0 00-1.414 1.414L8.586 8.586 5.652 11.52a1 1 0 001.414 1.414L10 9.828l2.934 2.934a1 1 0 001.414-1.414L11.414 8.586l2.934-2.934z"/>
     </svg>
   </span>
 </div>
@endif

@if(session('fail'))


 <div x-data="{ show: true }" x-show="show"
  class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
   <strong class="font-bold">{{__('lang.fail')}}</strong>
   <span class="block sm:inline">{{__('lang.'.session('fail'))}}</span>
   <span class="absolute top-0 bottom-0 start-0 px-4 py-3 cursor-pointer" @click="show = false">
     <svg class="fill-current h-6 w-6 text-red-500" viewBox="0 0 20 20">
       <path d="M14.348 5.652a1 1 0 00-1.414-1.414L10 7.172 7.066 4.238a1 1 0 00-1.414 1.414L8.586 8.586 5.652 11.52a1 1 0 001.414 1.414L10 9.828l2.934 2.934a1 1 0 001.414-1.414L11.414 8.586l2.934-2.934z"/>
     </svg>
   </span>
 </div>
@endif
@if ($errors->any())
@foreach($errors->all() as $error)



<div x-data="{ show: true }" x-show="show"
 class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold">{{__('lang.error')}}</strong>
  <span class="block sm:inline">{{ $error }}</span>
  <span class="absolute top-0 bottom-0 start-0 px-4 py-3 cursor-pointer" @click="show = false">
    <svg class="fill-current h-6 w-6 text-red-500" viewBox="0 0 20 20">
      <path d="M14.348 5.652a1 1 0 00-1.414-1.414L10 7.172 7.066 4.238a1 1 0 00-1.414 1.414L8.586 8.586 5.652 11.52a1 1 0 001.414 1.414L10 9.828l2.934 2.934a1 1 0 001.414-1.414L11.414 8.586l2.934-2.934z"/>
    </svg>
  </span>
</div>

@endforeach


@endif
