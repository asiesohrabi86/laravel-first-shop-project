@extends('admin.layouts.main')
@section('main')
<div id="main-content">
    <section class="wrapper">
        <div class="container" style="margin-top:70px">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                        فرم ثبت دسته
                    
                        </header>
                        <div class="panel-body">
                            <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام دسته:</label>
                                    <input type="text" class="form-control @error('name') is-invalid' @enderror" id="exampleInputEmail1" placeholder="نام دسته را وارد نمایید" name="name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">عنوان انگلیسی:</label>
                                    <input type="text" class="form-control @error('slug') is-inalid' @enderror" id="exampleInputEmail1" placeholder="" name="slug">

                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelect">دسته پدر:</label>
                                    <select class="form-control @error('category_id') is-invalid' @enderror" name="category_id" id="exampleSelect">
                                    
                                        <option value="">ندارد</option>
                                        @foreach ($parentCategories as $parentCategory)
                                        <option value="{{$parentCategory->id}}">{{$parentCategory->name}}</option> 
                                        @endforeach
                                        
                                    </select>
    
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            
                                <button type="submit" class="btn btn-info" name="addproduct">ثبت</button>
                                <a href="{{route('categories.index')}}" class="btn btn-default">لغو</a>
                            </form>
                        </div>
                    </section>
                </div>
            </div> 
        </div>
    </section>
</div>

@endsection

 