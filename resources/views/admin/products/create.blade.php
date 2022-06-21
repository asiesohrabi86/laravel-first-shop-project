@extends('admin.layouts.main')
@section('main')
<div id="main-content">
    <section class="wrapper">
        <div class="container" style="margin-top:70px">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                        فرم ثبت محصول جدید
                    
                        </header>
                        <div class="panel-body">
                            <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام محصول:</label>
                                    <input type="text" class="form-control @error('title') is-inalid' @enderror" id="exampleInputEmail1" placeholder="نام محصول را وارد نمایید" name="title">

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">عنوان انگلیسی محصول:</label>
                                    <input type="text" class="form-control @error('slug') is-inalid' @enderror" id="exampleInputEmail1" placeholder="" name="slug">

                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">توضیحات:</label>
                                    <textarea class="form-control @error('description') is-invalid' @enderror" name="description" id="editor-id"></textarea>
    
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">قیمت محصول :</label>
                                    <input type="text" class="form-control @error('price') is-inalid' @enderror" id="exampleInputPassword1" placeholder="قیمت محصول را وارد نمایید" name="price">

                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">موجودی محصول :</label>
                                    <input type="text" class="form-control @error('inventory') is-inalid' @enderror" id="exampleInputPassword1" placeholder="موجودی محصول را وارد نمایید" name="inventory">

                                    @error('inventory')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mt-1 mb-1" style="display: flex">
                                    <input type="text" id="image_label" class="form-control" name="image"
                                           aria-label="Image" aria-describedby="button-image">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب</button>
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <label for="exampleInputEmail1">انتخاب دسته بندی:</label>
                                    <select name="categories[]" id="exampleInputEmail1" class="form-select @error('categories') 'is-invalid' @enderror" multiple>
                                        @foreach (App\Models\Category::all() as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('categories')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            
                                <button type="submit" class="btn btn-info" name="addproduct">ثبت</button>
                            </form>
                        </div>
                    </section>
                </div>
            </div> 
        </div>
    </section>
</div>

@endsection

 