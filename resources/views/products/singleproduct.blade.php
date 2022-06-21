@extends('layouts.app')
@section('content')

@auth

    <!-- The Modal -->
    <div class="modal fade" id="sendComment">
    <div class="modal-dialog">
        <div class="modal-content">
    
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title pl-4">نظر خود را ثبت کنید</h4>
            {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        </div>
    
    <form action="{{route('send.comment')}}" method="post" id="sendCommentForm">
        @csrf
        <!-- Modal body -->
        <div class="modal-body">
            <input type="hidden" name="commentable_id" value="{{$product->id}}">
            <input type="hidden" name="commentable_type" value="{{get_class($product)}}">
            <div class="form-group">
                <label for="message-text">دیدگاه شما</label>
                <textarea name="comment" id="message-text" class="form-control"></textarea>
            </div>
            
            <input type="hidden" name="parent_id" value="0">

        </div>
    
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
            <button type="submit" class="btn btn-success">ارسال</button>
        </div>
    </form>
        </div>
    </div>
    </div>
 @endauth


    <section class="container fluid col-lg-8 offset-lg-2">
        <div class="text-center banner p-2" style="background-color: #8f0909c5">
            <h4>{{$product->title}}</h4>
        </div>
        <div class="shadow text-center mt-1 pt-1">
            <img src="{{$product->image}}" height="300px" width="300px">
            {{-- <ul class="mt-3 pt-4"> --}}
                <h5 class="mt-4">{{$product->title}}</h5>
                <p>{!!$product->description!!}</p>
                <h5>{{$product->price}}تومان</h5>
            {{-- </ul> --}}

        @if(Cart::count($product)<$product->inventory)
            <form action="{{route('cart.add',$product->id)}}" method="POST" id="add-to-cart">
                @csrf

            </form>
            <span class="btn btn-success" onclick="document.getElementById('add-to-cart').submit()">افزودن به سبد خرید</span>
        @endif
            <div class="dropdown pt-4">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">دسته بندی محصول</a>
                <div class="dropdown-menu text-center">
                    @foreach ($product->category()->get() as $category)
                        <a href="{{route('category.show',$category->slug)}}" class="d-block">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>
            
<hr>
            <div class="container mt-1 p-3">
                <div class="d-flex align-items-center justify-content-between p-2">
                    
                    <h3>دیدگاه کاربران</h3>
                
                
                    @auth

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sendComment">
                        ثبت نظر جدید
                        </button>
            
                    @endauth
                        
                    @guest
                        <span class="alert alert-warning">لطفا برای ثبت نظر وارد سایت شوید</span>
                    @endguest
                   
                 </div>

                @include('layouts.comments' , ['comments'=>$product->comment()->where('parent_id',0)->where('approved',1)->get()])

            </div>
            

        </div>
    </section>
@endsection