@extends('admin.layouts.main')
@section('main')
<div id="main-content">
    <section class="container wrapper">
        <div class="container" style="margin-top:70px">
            <div class="row">
                <div class="col-lg-9">
                    <section class="panel">
                        <header class="panel-heading">
                        فرم ویرایش دسته
                     
                        </header>
                        <div class="panel-body">
                            <form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                                 @csrf
                                 @method('put')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام دسته:</label>
                                    <input type="text" class="form-control @error('name') is-invalid' @enderror" id="exampleInputEmail1" placeholder="نام دسته را وارد نمایید" name="name" value="{{$category->name}}">
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">عنوان انگلیسی دسته:</label>
                                    <input type="text" class="form-control @error('slug') is-invalid' @enderror" id="exampleInputEmail1" placeholder="" name="slug" value="{{$category->slug}}">
    
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
                                            <option value="{{$parentCategory->id}}" {{$parentCategory->id==$category->category_id ? 'selected' : ''}} >{{$parentCategory->name}}</option>
                                        @endforeach
                                        
                                    </select>
    
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                               
                                <button type="submit" class="btn btn-info" name="addcategory">ویرایش</button>
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

 