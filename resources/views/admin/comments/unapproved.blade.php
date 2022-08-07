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
                                    <span>نظرات تاییدنشده</span>
                               </div>
                           </div>
                     
                        </header>
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام کامنت گذار</th>
                                    <th>متن کامنت</th>
                                    <th>کامنت والد</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                @foreach ($comments as $comment)
    
                                <tr>
                                    
                                    <td>{{$comment->id}}</td>
                                    <td>{{$comment->user->name}}</td>
                                    <td>{!!$comment->comment!!}</td>
                                    <td>{{$comment->parent_id}}</td>

                                     <td class="d-flex pb-4">
                                        <div class="col-lg-3">
                                            <form action="{{route('comments.update',$comment->id)}}" method="POST" >
                                            @csrf
                                            @method('patch')
                                            <button class="btn btn-success" type="submit">تایید</a>
                                            </form>
                                        </div>
                                        <div class="col-lg-6">
                                            <form method="POST" action="{{route('comments.destroy',$comment->id)}}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger col-lg-4" onclick="return confirm('آیا از حذف نظر اطمینان دارید؟')">حذف</a>
                                            </form>
                                        </div>
                                        
                                    </td>
                                 </tr>
                                @endforeach
                                

                            </tbody>
                        </table>
                    </section>

                    <div class="text-center">
                        {{$comments->render()}}
                    </div>
                </div>
                </div>
          
                </div>
            </section>
      </section>
      <!--main content end-->
@endsection