@extends('admin.layouts.main')
@section('main')

    <!--main content start-->
      <section id="main-content">
          <section class="container wrapper">
            <div class="container" style="margin-top:70px">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                <div class="row mb-1">
                                    <div class="col-lg-6">
                                        <span>لیست کاربران</span>
                                    </div>
                                    <div class="col-lg-6 text-start">
                                        <a href="{{route('users.create')}}" class="btn btn-danger ">ایجاد کاربر</a>
                                    </div>
                                </div>   
                         
                            </header>
                            <table class="table table-striped border-top" id="sample_1">
                                <thead>
                                    <tr>
                                        <th>ایدی کاربر</th>
                                        <th>نام کاربری</th>
                                        <th>ایمیل</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
    
                                <tbody>
    
                                    @foreach ($users as $user)
    
                                        <tr>
                                        
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td class="d-flex">
                                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-success">ویرایش</a>
    
                                                <form method="POST" action="{{route('users.destroy',$user->id)}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('آیا از حذف کاربر اطمینان دارید؟')">حذف</a>
                                                </form>
                                                   
                                             </td>
                                        </tr>
                                    @endforeach
                               
                                   
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
              
 
            <div class="text-center">
                {{$users->render()}}
            </div>


          </section>
      </section>
      <!--main content end-->
     
@endsection
