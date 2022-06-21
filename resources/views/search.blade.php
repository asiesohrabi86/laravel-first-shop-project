@extends('layouts.app')

@section('content')

<div class="col-lg-12 container-fluid text-center">
    <div class="col-lg-12 bg-light p-2 mt-3">
        <h1 class="mahsulat">محصولات</h4>
    </div>
  
    <div class="col-lg-12 bg-light mb-3 mt-3">
      <div class="row radif">
        @foreach ($products as $product)
            <div class="col-lg-3 ">
                <div class="card" style="width: 18rem;">
                    <a href="{{route('singleproduct',$product->slug)}}"><img src="{{$product->image}}" class="card-img-top" alt="عکس شومیز" height="250px" width="250px"></a>
                    <div class="card-body">
                        <a href="{{route('singleproduct',$product->slug)}}"><p class="card-text"><h5>{{$product->title}}</h5></p></a>
                        <p class="card-text"><h5>قیمت محصول:{{$product->price}}</h5></p>
                    
                        <a class="card-link" href="#">افزودن به سبد خرید</a>
                    </div>
                </div>
            </div>
        @endforeach   
      </div>
    </div>
</div>
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