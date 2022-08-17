@extends('admin.layouts.main')
@section('main')
<div id="main-content">
    <section class="container wrapper">
        <div class="container" style="margin-top:70px">
            <div class="row">
                <div class="col-lg-9">
                    <section class="panel">
                        <header class="panel-heading">
                        فرم ویرایش سفارش مربوط به کاربر
                        {{$order->user->name}}
                     
                        </header>
                        <div class="panel-body">
                            <form action="{{route('orders.update',$order->id)}}" method="post" enctype="multipart/form-data">
                                 @csrf
                                 @method('put')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">هزینه سفارش</label>
                                    <input type="text" class="form-control @error('price') is-invalid' @enderror" id="exampleInputEmail1" name="price" value="{{$order->price}}">
    
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">وضعیت سفارش</label>
                                    <select class="form-control @error('status') is-invalid' @enderror" id="exampleInputEmail1" placeholder="" name="status">
                                        <option value="unpaid">پرداخت نشده</option>
                                        <option value="paid">پرداخت شده</option>
                                        <option value="preparation">در حال آماده سازی</option>
                                        <option value="post">ارسال شده</option>
                                        <option value="recieved">دریافت شده</option>
                                        <option value="cancled">کنسل شده</option>
                                    </select>
    
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">شماره پیگیری پستی</label>
                                    <input type="text" class="form-control @error('tracking_serial') is-invalid' @enderror" name="tracking_serial" value="{{$order->tracking_serial ?? 'هنوز ثبت نشده'}}">
    
                                    @error('tracking_serial')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                
                                <button type="submit" class="btn btn-info">ویرایش</button>
                                <button class="btn btn-default" >لغو</button>
                            </form>
            
                        </div>
                    </section>
                </div>
              </div> 
        </div>
    </section>
</div>

@endsection

 