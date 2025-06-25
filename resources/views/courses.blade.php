@extends('layouts.guest')

@section('title', 'جميع الكورسات')

@section('content')
<div class="container mx-auto  py-6">
    <div class="flex flex-col md:flex-row gap-6 md:me-auto md:ms-auto me-4 ms-6">


        <aside class="md:w-1/4 w-full  bg-theme-5 text-h2 p-4 rounded-lg shadow space-y-4">
            <h1 class="text-3xl text-center font-bolder capitalize">{{__('lang.filter your course')}}</h1>
            <form method="GET" action="" class="space-y-4" x-data="{ price: '{{ request('price') }}' }" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                <div>
                    <label class="block font-bold mb-1">الصف الدراسي</label>
                    <select name="grade" class="w-full border border-input text-theme-2 focus:border-input rounded-lg px-2 py-1 rtl:rtl-select" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                        <option value="">الكل</option>
                        <option value=""> الصف الاول الاعدادي</option>
                        <option value="">الصف الثالث الثانوي</option>
                        {{--
                        @foreach($grades as $grade)
                            <option value="{{ $grade->id }}" {{ request('grade') == $grade->id ? 'selected' : '' }}>{{ $grade->name }}</option>
                        @endforeach
                        --}}
                    </select>
                </div>
                <div>
                    <label class="block font-bold mb-1">المادة</label>
                    <select name="teacher" class="w-full border text-theme-2 focus:border-input rounded px-2 py-1 rtl:rtl-select ">
                        <option value="">الكل</option>
                        <option value=""> فيزياء</option>
                        <option value="">كيمياء</option>

                        {{-- @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ request('subject') == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                        @endforeach --}}
                    </select>
                </div>

                <div>
                    <label class="block font-bold mb-1">المدرس</label>
                    <select name="teacher" class="w-full border text-theme-2 focus:border-input rounded px-2 py-1 rtl:rtl-select ">
                        <option value="">الكل</option>
                        <option value=""> محمد احمد</option>
                        <option value=""> علي محمد</option>
                        {{-- @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ request('teacher') == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                        @endforeach --}}
                    </select>
                </div>

                <div>
                    <label class="block font-bold mb-1">السعر</label>
                    <select name="price" x-model="price" class="w-full border text-theme-2 focus:border-input rounded px-2 py-1 rtl:rtl-select">
                        <option value="">الكل</option>
                        <option value="free">مجاني</option>
                        <option value="paid">مدفوع</option>
                    </select>
                </div>
                <!-- نطاق السعر يظهر فقط إذا كان السعر = مدفوع -->
                <div x-show="price === 'paid'" x-transition>
                    <label class="block font-bold mb-1">نطاق السعر</label>
                    <div class="flex items-center gap-2">
                        <input type="number" name="min_price" placeholder="من" class="w-full border text-theme-2 focus:border-input rounded px-2 py-1" value="{{ request('min_price') }}">
                        <span class="text-gray-600">-</span>
                        <input type="number" name="max_price" placeholder="إلى" class="w-full border text-theme-2  focus:border-input rounded px-2 py-1" value="{{ request('max_price') }}">
                    </div>
                </div>

                <div>
                    <label class="block font-bold mb-1">التقييم</label>
                    <select name="rating" class="w-full border text-theme-2 focus:border-input rounded px-2 py-1 rtl:rtl-select">
                        <option value="">الكل</option>
                        @for($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>{{ $i }} نجوم فأعلى</option>
                        @endfor
                    </select>
                </div>

                <div>
                    <label class="block font-bold mb-1">الترتيب حسب</label>
                    <select name="sort" class="w-full border text-theme-2 focus:border-input rounded px-2 py-1 rtl:rtl-select">
                        <option value="">الأحدث</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>الأقدم</option>
                        <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>الأعلى تقييمًا</option>
                        <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>الأقل سعرًا</option>
                    </select>
                </div>

                <button type="submit" class="bg-theme-3 text-white px-4 py-2 rounded-full hover:bg-theme-2 w-full">تصفية</button>
            </form>
        </aside>

        <main class="flex-1 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3  gap-6">
            @for($j=1;$j<10 ;$j++ )
            @php  $m= rand(1,3) ;@endphp
                <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-md transition">
                  <div class="relative w-full rounded-lg">

                    <img src='{{asset("images/{$m}.gif")}}' alt="jhfjr" class="@if(app()->getLocale() === 'en') transform -scale-x-100 @endif w-full md:h-48 h-auto object-cover">
                    <div class="absolute  p-2 inset-0 flex items-center justify-end text-center text-white font-bold">
                        <h1 class="text-3xl p-2"> كورسات مدرستك</h1>
                    </div>
                  </div>                    <div class="p-4 space-y-2">
                        <h2 class="text-lg font-bold">course name</h2>
                        <p class="text-sm text-gray-600">المدرس: </p>
                        <p class="text-sm text-gray-600">الصف: </p>
                        <div class="flex justify-start items-center space-x-1 rtl:space-x-reverse text-yellow-400 text-2xl">
                            @for ($k = 1; $k <= 5; $k++)
                                @if ($k <= floor(3.5))
                                    <span>★</span>
                                @elseif ($k - (3.5 )< 1)
                                    <span class="rtl:rotate-180">@include('icons.star-half')</span>

                                @else
                                    {{-- <span class="text-gray-300">★</span> --}}
                                @endif

                            @endfor
                        </div>
                        {{-- <p class="text-sm text-yellow-500">⭐</p> --}}
                        <p class="text-sm font-semibold"> 50</p>
                        <a href="{{url('/topics')}}" class="block mt-2  theme-btn-md px-3 py-1 rounded-full hover:bg-theme-3 text-sm">عرض التفاصيل</a>
                    </div>
                </div>
            @endfor

            {{-- ////////////////////////////////////// --}}
            {{-- @forelse($courses as $course)
                <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-md transition ">
                    <img src="{{ $course->image }}" alt="{{ $course->title }}" class="w-full h-40 object-cover">
                    <div class="p-4 space-y-2">
                        <h2 class="text-lg font-bold">{{ $course->title }}</h2>
                        <p class="text-sm text-gray-600">المدرس: {{ $course->teacher->name }}</p>
                        <p class="text-sm text-gray-600">الصف: {{ $course->grade->name }}</p>
                        <p class="text-sm text-yellow-500">⭐ {{ $course->rating ?? '0.0' }}</p>
                        <p class="text-sm font-semibold">{{ $course->price > 0 ? $course->price . ' جنيه' : 'مجاني' }}</p>
                        <a href="{{ route('courses.show', $course) }}" class="bg-theme-3 text-white px-4 py-2 rounded-full hover:bg-theme-2 w-full">{{__('lang.show details')}}</a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500">لا توجد كورسات مطابقة للفلاتر.</div>
            @endforelse --}}
        </main>
    </div>

    {{-- <div class="mt-6">
        {{ $courses->withQueryString()->links() }}
    </div> --}}
</div>
@endsection
