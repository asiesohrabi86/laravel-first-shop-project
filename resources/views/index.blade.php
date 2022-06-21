@extends('layouts.app')

@section('content')
  
  @include('layouts.slider')

  <div class="d-flex container-fluid">
    <div class="col-lg-4 mt-5 text-center">
      <i class="fa fa-truck icon1" aria-hidden="true"></i>
      <p>ارسال رایگان</p>
    </div>
    <div class="col-lg-4 mt-5 text-center">
      <i class="fa fa-cog icon1"></i>
      <p>نحوه ثبت سفارش</p>
    </div>
    <div class="col-lg-4 mt-5 text-center">
      <i class="fa fa-refresh icon1"></i>
      <p>ارسال سریع</p>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 text-center mb-3 mt-3 shadow bg-light">
        <div class="list-group">
          <button type="button" class="list-group-item list-group-item-action active">
            دسته بندی محصولات
          </button>
          @include('layouts.list-categories')

        </div>
      </div>

      <div class="col-lg-8 shadow bg-light mb-3 mt-3">
        <h5 class="text-center pt-3 pb-3">محصولات پرفروش</h5>
        <div class="row parent">
          <div class="col-lg-4 child">
            <div class="card text-center">
              <a href=""><img class="card-img-top" src="images/coat&pants3.jpg" alt="Card image cap">
              </a>
              <div class="card-body">
                <a href=""><h5 class="card-title">کت و شلوار</h5></a>
                <p class="card-text">قیمت محصول: 1میلیون تومان</p>
               
              </div>
            </div>
          </div>
          
          <div class="col-lg-4 child">
            <div class="card text-center">
              <a href=""><img class="card-img-top" src="images/dress1.jpg" alt="Card image cap"></a>
              <div class="card-body">
                <a href=""><h5 class="card-title">پیراهن</h5></a>
                <p class="card-text">قیمت محصول: 500هزار تومان</p>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4 child">
            <div class="card text-center">
              <a href=""><img class="card-img-top" src="images/overall4.jpg" alt="Card image cap"></a>
              <div class="card-body">
                <a href=""><h5 class="card-title">سرهمی</h5></a>
                <p class="card-text">قیمت محصول:750 هزار تومان</p>
               
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  @foreach (App\Models\Category::latest()->get() as $category)
  <div class="col-lg-12 container-fluid text-center">
    <h4 class="bg-light shomiz">{{$category->name}}</h4>
    <div class="col-lg-12 bg-light">
      <div class="row">
        @foreach ($category->product as $product)
          <div class="col-lg-3 ">
            <div class="card" style="width: 18rem;">
              <a href="{{route('singleproduct',$product->slug)}}"><img src="{{$product->image}}" class="card-img-top" alt="عکس شومیز" height="250px" width="250px"></a>
              <div class="card-body">
                  <a href="{{route('singleproduct',$product->slug)}}"><p class="card-text"><h5>{{$product->title}}</h5></p></a>
                  <p class="card-text"><h5>قیمت محصول:{{$product->price}}</h5></p>
                 
                  <form action="{{route('cart.add',$product->id)}}" method="POST" id="add-to-cart">
                    @csrf
    
                </form>
                <span class="btn btn-success" onclick="document.getElementById('add-to-cart').submit()">افزودن به سبد خرید</span>
              </div>
            </div>
          </div>
        @endforeach   
      </div>
    </div>
    <div class="col-lg-12 bg-light">
      <a href="{{route('category.show',$category->slug)}}" class="btn moshahede">همه {{$category->name}}</a>
    </div>
  </div> 
  @endforeach
 


<br>
  <div class="col-lg-12 container-fluid">
    <div class="row">
      <div class="col-lg-6 text-center mt-5">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">آدرس: مازندران، ساری</li>
          <li class="list-group-item"><a href="tel:09113561287">شماره تماس: 09113561287</a></li>
          <li class="list-group-item"><a href="mail:info@shop.ir">ایمیل: info@shop.ir</a></li>
        </ul>
      </div>
      <div class="col-lg-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d6408.737103236603!2d53.06652971917704!3d36.56933552120659!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfa!2s!4v1652191134266!5m2!1sfa!2s" width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
   
  </div>
  

@endsection