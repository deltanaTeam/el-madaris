@extends('admin.layouts.master')
@section('title', __('lang.create subject'))
@section('sub-topbar')
<div class=" " >
  <ul class="nav d-flex justify-content-start ">
    <li class="nav-item mx-3 pt-2 ">
       <b  class="text-primary  font-weight-bolder  h3 align-items-center ">
         {{__('lang.create new subject')}}
       </b>
    </li>
  </ul>
</div>
@endsection
@section('content')
 @include('admin.style')
 
 <div class="row" dir="rtl">
   <div class="col-xxl-12 order-2 order-xxl-1">
      <!--begin::Advance Table Widget 2-->
      <div class="card card-custom card-stretch gutter-b p-2">
          <!--begin::Header-->

          <div class="card-body bg-light-info ">

            @include('admin.session')
            <form action="{{ route('admin.subjects.store') }}" method="POST" enctype="multipart/form-data" class="row">
             @csrf

        <div class="mb-3 col-md-6 form-group2">
            <label class="block">{{__('lang.name_en')}} <span class="required">*</span> :</label>
            <input type="text" name="name_en" class="form-control " value="{{ old('name_en') }}">
            
        </div>
        <div class="mb-3 col-md-6 form-group2">
            <label class="block">{{__('lang.name_ar')}} <span class="required">*</span> :</label>
            <input type="text" name="name_ar" class="form-control " value="{{ old('name_ar') }}">
        </div>
        <div class="mb-3 col-md-6 form-group2">
            <label class="block">{{__('lang.description_en')}}  :</label>
            <textarea  id="des1" class="form-control" name="description_en">{{ old('description_en') }}</textarea>

        </div>
        <div class="mb-3 col-md-6 form-group2">
            <label class="block">{{__('lang.description_ar')}} :</label>
            <textarea  id="des2" class="form-control" name="description_ar">{{ old('description_ar') }}</textarea>
 
        </div>

        <div class="mb-3 col-md-6 form-group2">
            <label>{{__('lang.grade')}}<span class="required">*</span> :</label>
            <select name="grade" class="form-control">
                @forelse ($grades as $grade)
                    <option value="{{ $grade->id }}" {{old('grade')== $grade->id?'selected':''}}>{{ $grade->name }}</option>
                @empty
                @endforelse
            </select>
        </div>

        <div class="mb-3 col-md-6 form-group2">
            <label>{{__('lang.teacher')}} <span class="required">*</span> :</label>
            <select name="teacher" class="form-control">  
                @forelse ($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{old('teacher')== $teacher->id?'selected':''}}>{{ $teacher->name }}</option>
                @empty
                @endforelse
            </select>
        </div>

        <div class="mb-3 col-md-6 form-group2">
            <label>{{__('lang.is_free')}} <span class="required">*</span> :</label>
            <select name="is_free" class="form-control">
                <option value="1" {{old('is_free')== 1?'selected':''}}>{{__('lang.yes')}}</option>
                <option value="0" {{old('is_free')== 0?'selected':''}}>{{__('lang.no')}}</option>
            </select>
        </div>

        <div class="mb-3 col-md-6 form-group2">
            <label>{{__('lang.price')}}<span class="required">*</span> :</label>
            <input type="number" name="price" class="form-control" step="0.01" value="{{old('price')}}">
        </div>
        <div class="mb-3 col-md-12 form-group2">
          <div class="custom-file ">
            <input type="file" class="custom-file-input" id="customFile" name="image">
            <label class="custom-file-label" for="customFile">{{__('lang.Choose Image')}}</label>
          </div>
        </div>
        <div class="col-md-9"></div>
                
        <div class="col-md-3"><button type="submit" class="btn btn-success btn-block"><i class="fas fa-save"></i>{{__('lang.Save')}}</button></div>

    </form>
          </div>
        </div>
    </div>
 </div>


  </section>
@endsection
@section('script')
  @include('admin.scripts')
@endsection
