@extends('admin.layouts.main')
@section('main')
<div id="main-content">
    <section class="container wrapper">
        <div class="container" style="margin-top:70px">
            <div class="row">
                <div class="col-lg-9">
                    <section class="panel">
                        <header class="panel-heading">
                        فرم ویرایش محصول
                     
                        </header>
                        <div class="panel-body">
                            <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                                 @csrf
                                 @method('put')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام محصول:</label>
                                    <input type="text" class="form-control @error('title') is-invalid' @enderror" id="exampleInputEmail1" placeholder="نام محصول را وارد نمایید" name="title" value="{{$product->title}}">
    
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">عنوان انگلیسی محصول:</label>
                                    <input type="text" class="form-control @error('slug') is-invalid' @enderror" id="exampleInputEmail1" placeholder="" name="slug" >
    
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">توضیحات:</label>
                                    <textarea type="text" class="form-control @error('description') is-invalid' @enderror" id="editor-id" name="description">{!!$product->description!!}</textarea>
    
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">قیمت محصول :</label>
                                    <input type="text" class="form-control @error('price') is-inalid' @enderror" id="exampleInputPassword1" placeholder="قیمت محصول را وارد نمایید" name="price" value="{{$product->price}}">
    
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">موجودی محصول :</label>
                                    <input type="text" class="form-control @error('inventory') is-inalid' @enderror" id="exampleInputPassword1" placeholder="موجودی محصول را وارد نمایید" name="inventory" value="{{$product->inventory}}">

                                    @error('inventory')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mt-2" style="display: flex">
                                    <input type="text" id="image_label" class="form-control" name="image"
                                           aria-label="Image" aria-describedby="button-image" value="{{$product->image}}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب</button>
                                    </div>
                                </div>
                                
                                <div class="select-group">
                                    <label for="exampleSelect">انتخاب دسته بندی</label>
                                    <select name="categories[]" id="exampleSelect" class="form-control @error('categories') 'is-invalid' @enderror" multiple>
                                    
                                        @foreach (App\Models\Category::all() as $category)
                                            <option value="{{$category->id}}" {{in_array($category->id,$product->category()->pluck('id')->toArray()) ? 'selected' : '' }}>{{$category->name}}</option>      
                                        @endforeach
                                    </select>

                                    @error('categories')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                
                                <button type="submit" class="btn btn-info" name="addproduct">ویرایش</button>
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

 