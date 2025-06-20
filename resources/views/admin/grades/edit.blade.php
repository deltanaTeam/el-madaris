@extends('admin.layouts.master')
@section('title', __('lang.edit grade'))

@section('sub-topbar')
<div class=" " >
  <ul class="nav d-flex justify-content-start ">
    <li class="nav-item mx-3 pt-2 ">
       <b  class="text-primary  font-weight-bolder  h3 align-items-center ">
         {{__('lang.edit grade')}}
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

          <div class="card-body bg-light-info">

            @include('admin.session')
            <form action="{{ route('admin.grades.update',$grade) }}" method="POST" class="row">
                @csrf
                @method('PATCH')
                <div class="mb-3 col-6 form-group2">
                    <label class="block">{{__('lang.name_en')}} <span class="required">*</span> :</label>
                    <input type="text" name="name_en" value="{{old('name_en',$grade->getTranslations('name')['en']??'')}}" class="form-control " value="{{ old('name_en') }}">
                   
                </div>
                <div class="mb-3 col-6 form-group2">
                    <label class="block">{{__('lang.name_ar')}} <span class="required">*</span> :</label>
                    <input type="text" name="name_ar" value="{{old('name_ar',$grade->getTranslations('name')['ar']??'')}}" class="form-control " value="{{ old('name_ar') }}">
                </div>
                
                <div class="col-9"></div>
                
                <div class="col-3"><button type="submit" class="btn btn-warning btn-block"><i class="fas fa-edit"></i>{{__('lang.Save')}}</button></div>
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
