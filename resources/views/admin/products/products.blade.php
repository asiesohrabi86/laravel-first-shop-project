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
                           <div class="row mb-1">
                               <div class="col-lg-6">
                                    <span>لیست محصولات</span>
                               </div>
                               <div class="col-lg-6 text-start">
                                    <a href="{{route('products.create')}}" class="btn btn-danger" style="margin-right:5px">ایجاد محصول</a>
                               </div>
                           </div>
                     
                        </header>
                        <table class="table table-striped border-top" id="sample_1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام محصول</th>
                                    <th>توضیحات</th>
                                    <th>قیمت</th>
                                    <th>عکس</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                @foreach ($products as $product)
    
                                <tr>
                                    
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{!!$product->description!!}</td>
                                    <td>{{$product->price}}</td>
                                    
 
                                    <td>
                                    <img src="{{$product->image}}" width="50px" height="50px">
                                    </td>
 
                                     <td class="d-flex pb-4">
                                        <div class="col-lg-3">
                                            <a href="{{route('products.edit', $product->id)}}" class="btn btn-success" style="margin-left:5px">ویرایش</a>
                                        </div>
                                        <div class="col-lg-6">
                                            <form method="POST" action="{{route('products.destroy',$product->id)}}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger col-lg-4">حذف</a>
                                            </form>
                                        </div>
                                        
                                    </td>
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