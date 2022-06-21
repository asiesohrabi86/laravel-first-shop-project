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
                                    <span>لیست نظرات تاییدشده</span>
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
                                        
                                            <form method="POST" action="{{route('comments.destroy',$comment->id)}}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">حذف</a>
                                            </form>
                                        
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