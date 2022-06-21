@extends('admin.layouts.main')

@section('main')

<section id="main-content">
    <section class="container wrapper">
        <div class="card col-md-8" style="margin: 65px 17% 0px 0px">
            <div class="card-header text-center bg-secondary pt-3 pb-3"><strong>فرم ویرایش</strong></div>
     
     <div class="card-body">
          <form method="post" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row" style="margin:12px 0px 5px 0px;">
                 <label class="col-md-3 col-form-lable text-md-end" style="padding-top:9px;">نام کاربر:</label>
                 <div class="col-md-8">
                    <input type="text" name="name" value="{{$user->name}}" class="form-control  @error('name') is-invalid @enderror">

                     @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                 
            </div>
            <div class="row" style="margin:5px 0px;">
                <label class="col-md-3" style="padding-top:9px;">آدرس ایمیل:</label>
                <div class="col-md-8">
                    <input type="text" name="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                
            </div>

            <div class="row" style="margin:5px 0px;">
                <label class="col-md-3" style="padding-top:9px;">رمز عبور:</label>
                <div class="col-md-8">
                    <input type="password" name="password" class="form-control col-lg-8 @error('password') 'is-invalid' @enderror" >

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                
            </div>

            <div class="row" style="margin:5px 0px;">
                <label class="col-md-3" style="padding-top:9px;">تکرار رمز عبور:</label>
                <div class="col-md-8">
                    <input type="password" name="password_confirmation" class="form-control col-lg-8">
                </div>
               
            </div>

            <div class="row" style="margin:12px 7px 12px 0px;">
                <label class="col-md-8" style="padding-top:9px;"></label>
                <div class="col-md-4 row">
                    <button type="submit" class="btn btn-success" style="width: 110px">
                        {{ __('ویرایش کاربر') }}
                    </button>

                    <a href="{{route('users.index')}}" class="btn btn-secondary mt-1 float-left" style="width: 84px;
                    margin-right: 5px;">{{ __('لغو') }}</a>
                </div>      
            </div>

          </form>
     </div>
    </div>
       
    </section>
</section>



@endsection
