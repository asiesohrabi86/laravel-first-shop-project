@extends('profile.layouts.main')
@section('main')
    <div class="col-md-8">
        <table class="table table-light table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>شماره سفارش</th>
                    <th>تاریخ ثبت</th>
                    <th>وضعیت سفارش</th>
                    <th>کد رهگیری پستی</th>
                    <th>اقدامات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{jdate($order->created_at)->format('%d %B %Y')}}</td>
                        <td>
                            @switch($order->status)
                                @case('paid')
                                    <span class="badge badge-success">پرداخت شده</span>
                                    @break
                                @case('unpaid')
                                    <span class="badge badge-danger">پرداخت نشده</span>
                                    @break
                                @default
                                    
                            @endswitch
                        </td>
                        <td>{{$order->tracking_serial ?? 'هنوز ثبت نشده'}}</td>
                        <td class="d-flex">
                            <a href="{{route('order.details',$order->id)}}" class="btn btn-sm btn-info ml-2">جزییات سفارش</a>
                            @if($order->status == 'unpaid')
                                <a href="{{route('order.payment',$order->id)}}" class="btn btn-sm btn-warning">پرداخت سفارش</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection