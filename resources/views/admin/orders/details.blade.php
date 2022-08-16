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
                            جزئیات سفارش
                     
                        </header>
                        <table class="table table-striped border-top" id="sample_1">
                            <thead>
                                <tr>
                                    <th>آیدی محصول</th>
                                    <th>نام محصول</th>
                                    <th>قیمت محصول</th>
                                    <th>تعداد محصول</th>
                                    <td>هزینه نهایی</td>
                                </tr>
                            </thead>
                            <tbody>
                            
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->pivot->quantity}}</td>
                                        <td>{{$product->price * $product->pivot->quantity}}</td>
                                    </tr>
                                @endforeach
                                

                            </tbody>
                        </table>
                    </section>

                    <div class="text-center">
                        {{$products->render()}}
                    </div>
                </div>
                </div>
          
                </div>
            </section>
      </section>
      <!--main content end-->
@endsection