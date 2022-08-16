@extends('admin.layouts.main')
@section('main')

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <div class="container" style="margin-top:70px">
              <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            لیست سفارشات
                     
                        </header>
                        <table class="table table-striped border-top" id="sample_1">
                            <thead>
                                <tr>
                                    <th>آیدی سفارش</th>
                                    <th>نام کاربر</th>
                                    <th>هزینه سفارش</th>
                                    <th>وضعیت سفارش</th>
                                    <th>شماره پیگیری پستی</th>
                                    <th>زمان ثبت سفارش</th>
                                    <th>اقدامات</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->user->name}}</td>
                                        <td>{{$order->price}}</td>
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
                                        <td>{{jdate($order->created_at)->format('%d %B %Y')}}</td>
                                        <td class="d-flex">
                                            <a href="{{route('orders.show',$order->id)}}" class="btn btn-sm btn-warning ml-3">جزییات سفارش</a>
                                            <a href="{{route('orders.payments',$order->id)}}" class="btn btn-sm btn-info ml-3">مشاهده پرداخت ها</a>
                                            <a href="{{route('orders.edit',$order->id)}}" class="btn btn-sm btn-success ml-3">ویرایش سفارش</a>
                                            <form action="{{route('orders.destroy',$order->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('آیا از حذف سفارش اطمینان دارید؟')">حذف سفارش</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                

                            </tbody>
                        </table>
                    </section>

                    <div class="text-center">
                        {{$orders->render()}}
                    </div>
                </div>
                </div>
          
                </div>
            </section>
      </section>
      <!--main content end-->
@endsection