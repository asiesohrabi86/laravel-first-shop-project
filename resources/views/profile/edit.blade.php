@extends('profile.main')
@section('main')
<div class="col-md-8">
  <form action="{{route('profile.update',auth()->user()->id)}}" method="post" class="bg-light">
    @csrf
    @method('patch')
    <div class="form-group">
      <label for="#name">نام و نام خانوادگی</label>
      <input type="text" name="name" value="{{auth()->user()->name}}" id="name" class="form-control @error('name') is-invalid @enderror">
      @error('name')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="#pass">رمز عبور</label>
      <input type="password" name="password" id="pass" class="form-control @error('password') is-invalid @enderror">
      @error('password')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="#confirm-pass">تکرار رمز عبور</label>
      <input type="password" name="password_confirmation" id="confirm-pass" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">ویرایش</button>
  </form>
</div>
@endsection