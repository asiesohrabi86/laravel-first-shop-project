@extends('layouts.app')
@section('content')
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">پروفایل کاربری</a></li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{auth()->user()->name}}</h4>
                      {{-- <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> --}}
                      <a class="btn btn-primary" href="{{route('profile')}}">پروفایل</a>
                      <a class="btn btn-outline-primary" href="{{route('profile.orders')}}">سفارشات</a>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            @yield('main')

          </div>

        </div>
</div>
@endsection