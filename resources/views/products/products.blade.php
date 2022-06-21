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
                    
                        <form action="{{route('cart.add',$product->id)}}" method="POST" id="add-to-cart">
                            @csrf

                        </form>
                        <span class="btn btn-success" onclick="document.getElementById('add-to-cart').submit()">افزودن به سبد خرید</span>
                    </div>
                    <div>
                        
                    </div>
                </div>
            </div>
        @endforeach   
      </div>
    </div>
</div>


{{-- <div class="text-center">
    {{$products->render()}}
</div> --}}
@endsection