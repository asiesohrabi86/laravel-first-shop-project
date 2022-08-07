@extends('profile.layouts.main')
@section('main')
    <div class="col-md-8">
        <table class="table table-light table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>آیدی محصول</th>
                    <th>عنوان محصول</th>
                    <th>تعداد سفارش</th>
                    <th>هزینه نهایی</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($order->product as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->pivot->quantity}}</td>
                        <td>{{$product->pivot->quantity * $product->price}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection