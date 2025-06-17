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
            <form action="{{ route('admin.grades.store') }}" method="POST">
          @csrf
          <div class="mb-3">
              <label class="block"></label>
              <input type="text" name="name" class="form-input w-full" value="{{ old('name') }}">
              @error('name') <div class="text-red-500">{{ $message }}</div> @enderror
          </div>
          <div class="mb-3">
              <label class="block"></label>
              <textarea name="description" class="form-textarea w-full">{{ old('description') }}</textarea>
          </div>
          <button type="submit" class="btn btn-success"></button>
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
