@extends('admin.layouts.master')
@section('title')
{{$data['title']}}
@endsection
@section('sub-topbar')
<div class=" " >
  <ul class="nav d-flex justify-content-start ">
    <li class="nav-item mx-3 pt-2 ">
       <b  class="text-info  font-weight-bolder  h3 align-items-center ">
         {{$data['title']}}
       </b>
    </li>
  </ul>
</div>
@endsection
@section('content')
 @include('admin.style')
 <style media="screen">
 thead{
   background-color: #002133;
   color:#ffffff;
 }
 </style>
 <div class="row" dir="rtl">
   <div class="col-xxl-12 order-2 order-xxl-1">
      <!--begin::Advance Table Widget 2-->
      <div class="card card-custom card-stretch gutter-b p-2">
          <!--begin::Header-->

          <div class="card-body bg-light-info">

            @include('admin.session')
            <form action="{{ route('admin.subjects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>اسم المادة:</label>
            <input type="text" name="name" class="form-input w-full" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label>الوصف:</label>
            <textarea name="description" class="form-textarea w-full">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label>الصف:</label>
            <select name="grade_id" class="form-select w-full">
                @foreach ($grades as $grade)
                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>المدرس:</label>
            <select name="teacher_id" class="form-select w-full">
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>مجانية؟</label>
            <select name="is_free" class="form-select w-full">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>

        <div class="mb-3">
            <label>السعر (إذا كانت مدفوعة):</label>
            <input type="number" name="price" class="form-input w-full" step="0.01">
        </div>

        <button type="submit" class="btn btn-success">حفظ</button>
    </form>
          </div>
        </div>
    </div>
 </div>


  </section>
@endsection
@section('script')
  @include('scripts')
@endsection
