@extends('profile.layouts.main')
@section('main')
  <div class="col-md-8">
    <div class="card mb-3">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">نام و نام خانوادگی</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            {{auth()->user()->name}}
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">آدرس ایمیل</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            {{auth()->user()->email}}
          </div>
        </div>
  
        <hr>
        <div class="row">
          <div class="col-sm-12">
            <a class="btn btn-primary" href="{{route('profile.edit',auth()->user()->id)}}">ویرایش پروفایل</a>
          </div>
        </div>
      </div>
    </div>


  </div>
@endsection