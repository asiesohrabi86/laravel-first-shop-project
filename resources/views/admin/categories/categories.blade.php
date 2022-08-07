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
                                <span>لیست دسته بندی ها</span>
                            </div>
                            <div class="col-lg-6 text-start">
                                <a href="{{route('categories.create')}}" class="btn btn-danger" style="margin-right:5px">ایجاد دسته بندی</a>
                            </div>
                        </div>
                    
                    </header>
                    <table class="table table-striped border-top" id="sample_1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام دسته</th>
                                <th>دسته پدر</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach ($categories as $category)

                            <tr>
                                
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->getParentName()}}</td>

                                    <td class="d-flex pb-4">
                                    <div class="col-lg-3 text-start">
                                        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-success" style="margin-left: 5px">ویرایش</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <form method="POST" action="{{route('categories.destroy',$category->id)}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger col-lg-4" onclick="return confirm('آیا از حذف دسته اطمینان دارید؟')">حذف</a>
                                        </form>
                                    </div>
                                    
                                </td>
                                </tr>
                            @endforeach
                            

                        </tbody>
                    </table>
                </section>

                <div class="text-center">
                    {{$categories->render()}}
                </div>
            </div>
            </div>
        
            </div>
        </section>
    </section>
    <!--main content end-->
@endsection