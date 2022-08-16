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
                            لیست پرداخت ها
                     
                        </header>
                        <table class="table table-striped border-top" id="sample_1">
                            <thead>
                                <tr>
                                    <th>آیدی پرداخت</th>
                                    <th>شماره پرداخت</th>
                                    <th>وضعیت پرداخت</th>
                                    <th>زمان ثبت پرداخت</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{$payment->id}}</td>
                                        <td>{{$payment->resnumber}}</td>
                                        <td>
                                            {{-- {{$payment->status ? 'پرداخت شده' : 'پرداخت نشده'}} --}}
                                            @switch($payment->status)
                                                @case(1)
                                                    <span class="badge badge-success">پرداخت شده</span>
                                                    @break
                                                @case(0)
                                                    <span class="badge badge-danger">پرداخت نشده</span>
                                                    @break
                                                @default
                                                    
                                            @endswitch
                                        </td>
                                        <td>{{jdate($payment->created_at)->format('%d %B %Y')}}</td>
                                        
                                    </tr>
                                @endforeach
                                

                            </tbody>
                        </table>
                    </section>

                    <div class="text-center">
                        {{$payments->render()}}
                    </div>
                </div>
                </div>
          
                </div>
            </section>
      </section>
      <!--main content end-->
@endsection