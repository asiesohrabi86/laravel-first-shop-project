@extends('layouts.app')

@section('script')
<script>
    function changeQuantity(event, id , cartName = 'default') {
        //
        $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                'Content-Type' : 'application/json'
            }
        })

        //
        $.ajax({
            type : 'POST',
            url : '/cart/quantity/change',
            data : JSON.stringify({
                id : id ,
                quantity : event.target.value,
                cart : cartName,
                _method : 'patch'
            }),
            success : function(res) {
                location.reload();
            }
        });
    }

</script>
@endsection

@section('content')
<div class="container mt-5 mb-5">
    <table class="table table-bordered">
        <thead>
            <th>نام محصول</th>
            <th>قیمت واحد</th>
            <th>تعداد</th>
            <th>قیمت نهایی</th>
            <th>حذف</th>
        </thead>

        <tbody>
            {{-- @foreach (Cart::all() as $cart) --}}
            @foreach (Cart::instance('cart-shop')->all() as $cart)
            @if (isset($cart['product']))
                
            @php
                $product=$cart['product'];
            @endphp
                
            <tr>
                <td>{{$product->title}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <select onchange="changeQuantity(event,'{{$cart['id']}}' , 'cart-shop')" id="" class="form-control text-center">
                        @foreach (range(1,$product->inventory) as $item)
                         <option value="{{$item}}" {{$cart['quantity']==$item ? 'selected' : ''}}>{{$item}}</option>
                        @endforeach
                        
                    </select>
                </td>
                <td>{{$product->price * $cart['quantity'] }}</td>
                <td>
                    <form action="{{route('cart.destroy',$cart['id'])}}" method="POST" id="delete-cart-{{$product->id}}">
                    @csrf
                    @method('delete')
                    </form>
                    <a href="" onclick="event.preventDefault();document.getElementById('delete-cart-{{$product->id}}').submit();"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                </td>
            </tr>

            @endif
            @endforeach
            
        </tbody>
    </table>
    <div>
        @php
            $totalPrice=Cart::all()->sum(function($Cart)
        {
            return $Cart['product']->price * $Cart['quantity'];
        });
        @endphp

        <p>قیمت کل: {{$totalPrice}}</p>

    </div>
</div>
@endsection