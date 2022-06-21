@extends('admin.layouts.main')

@section('main')
   
<main class="col-lg-10 m-auto">
    <div class="container mt-5">
      <div class="alert alert-secondary text-center">
        <h2>پنل مدیریتی</h2>
        <hr>
        <p>خوش آمدی ادمین عزیز</p>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 text-center">
          <div class="shadow">
            <div class="bg-success p-2">
              <i class="fa fa-user" aria-hidden="true"></i>
            </div>
            <h3 class="pt-2">22</h3>
            <p class="pb-2">
              تعداد کاربران
            </p>
          </div>
        </div>
        <div class="col-lg-3 text-center">
          <div class="shadow">
            <div class="bg-danger p-2">
              <i class="fab fa-product-hunt" aria-hidden="true"></i>
            </div>
            <h3 class="pt-2">22</h3>
            <p class="pb-2">
              تعداد محصولات
            </p>
          </div>
        </div>
        <div class="col-lg-3 text-center">
          <div class="shadow">
            <div class="bg-warning p-2">
              <i class='fas fa-shopping-cart' aria-hidden="true"></i>
            </div>
            <h3 class="pt-2">22</h3>
            <p class="pb-2">
              تعداد سفارشات
            </p>
          </div>
        </div>
        <div class="col-lg-3 text-center">
          <div class="shadow">
            <div class="bg-info p-2">
              <i class='far fa-comments' aria-hidden="true"></i>
            </div>
            <h3 class="pt-2">22</h3>
            <p class="pb-2">
              تعداد نظرات
            </p>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
      
       


   