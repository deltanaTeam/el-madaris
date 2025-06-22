@extends('layouts.guest')

@section('title', 'الامتحان')

@section('content')
@php
$questions = collect();

for ($i = 1; $i <= 20; $i++) {
    $questions->push([
        'id' => $i,
        'text' => "ما هو ناتج السؤال رقم " .$i."?",
        'choices' => [
            "اختيار A للسؤال $i",
            "اختيار B للسؤال $i",
            "اختيار C للسؤال $i",
            "اختيار D للسؤال $i",
        ],
    ]);
}
@endphp
<div x-data="examForm()" x-init="init()" class="max-w-7xl mx-auto px-4 py-8  ">
    <h1 class="text-3xl font-boldest text-h2 my-6 mx-auto text-center"> امتحان الرياضيات على موضوع 1</h1>
    <form  action="" class="w-full mx-auto">
        <!-- شريط التقدم والوقت -->
        <div class="flex items-center justify-between bg-theme-4  px-4 py-3 rounded mb-6 shadow-sm text-sm md:text-base">
            <div class="font-semibold text-gray-700">
                سؤال <span x-text="currentIndex + 1"></span> من <span x-text="questions.length"></span>
            </div>
            <div class="font-bold text-2xl text-red-600 bg-theme-3 p-3 rounded-lg">
               <span x-text="timer.minutes" ></span>:<span x-text="timer.seconds.toString().padStart(2, '0')"></span>
            </div>
        </div>
        @csrf

        <!-- الأسئلة -->
        <template x-for="(question, index) in questions" :key="index">
            <div x-show="currentPage === Math.floor(index / questionsPerPage) + 1" class="mb-6 bg-white rounded-lg py-3 px-4">
                <h2 class="font-bold text-xl mb-2" x-text="'السؤال رقم ' + (index + 1)"></h2>
                <p class="mb-4" x-text="question.text"></p>
                <div class="flex flex-col md:flex-row md:flex-wrap gap-4 mx-auto">

                   <template x-for="(choice, i) in question.choices" :key="i" class="mx-auto ">
                     <label class=" w-full md:w-[50%] lg:w-[20%] flex items-center  p-3 rounded cursor-pointer hover:bg-gray-200 peer-checked:bg-theme-3 peer-checked:text-h2 ">
                        <input type="radio" 
                            :name="'answers[' + question.id + ']'"
                            :value="choice"
                            class="me-2 text-theme-1 "
                            
                        >
                        <span x-text="choice" class="text-sm "></span>
                     </label>
                   </template>
                </div>
            </div>
        </template>

        <!-- التنقل -->
        <div class="flex justify-between mt-8">
            <button type="button" @click="prevPage"
                class="bg-gray-300  mx-4 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded"
                x-show="currentPage > 1"
            >
                السابق
            </button>

            <button type="button" @click="nextPage"
                class="bg-theme-3 mx-4 hover:bg-theme-4 text-white font-semibold px-4 py-2 rounded ml-auto"
                x-show="currentPage < totalPages"
            >
                التالي
            </button>

            <button type="submit"
                class="bg-green-500 mx-4 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded ml-auto"
                x-show="currentPage === totalPages"
            >
                إرسال الإجابات
            </button>
        </div>
    </form>
    {{-- <div>
        <div class="flex items-center space-x-2 text-base">
            <h4 class="font-semibold text-slate-900">Contributors</h4>
            <span class="bg-slate-100 px-2 py-1 text-xs font-semibold text-slate-700 ...">204</span>
        </div>
        <div class="mt-3 flex -space-x-2 overflow-hidden">
            <img class="inline-block h-12 w-12 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
            <img class="inline-block h-12 w-12 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
            <img class="inline-block h-12 w-12 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80" alt="" />
            <img class="inline-block h-12 w-12 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
            <img class="inline-block h-12 w-12 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
        </div>
        <div class="mt-3 text-sm font-medium">
            <a href="#" class="text-blue-500">+ 198 others</a>
        </div>
    </div> --}}
</div>

<script>
function examForm() {
    return {
        currentPage: 1,
        questionsPerPage: 5,
        timer: { minutes: 10, seconds: 0 },
        interval: null,

        get currentIndex() {
            return (this.currentPage - 1) * this.questionsPerPage;
        },

        questions: [
            @foreach($questions as $q)
            {
                id: {{ $q['id'] }},
                text: @json($q['text']),
                choices: @json($q['choices']),
            },
            @endforeach
        ],

        get totalPages() {
            return Math.ceil(this.questions.length / this.questionsPerPage);
        },

        nextPage() {
            if (this.currentPage < this.totalPages) this.currentPage++;
        },

        prevPage() {
            if (this.currentPage > 1) this.currentPage--;
        },

        startTimer() {
            this.interval = setInterval(() => {
                if (this.timer.minutes === 0 && this.timer.seconds === 0) {
                    clearInterval(this.interval);
                    alert('انتهى الوقت! سيتم إرسال الامتحان الآن.');
                    document.querySelector('form').submit();
                } else if (this.timer.seconds === 0) {
                    this.timer.minutes--;
                    this.timer.seconds = 59;
                } else {
                    this.timer.seconds--;
                }
            }, 1000);
        },

        init() {
            this.startTimer();
        }
    }
}

</script>
@endsection
