
    @foreach ($comments as $comment)
        <div class="card">
            <div class="card-header">
                <span>{{$comment->user->name}}</span>
                <span>{{jdate($comment->created_at)->ago()}}</span>
            </div>

            <div class="card-body">
                {{$comment->comment}}
                @auth
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sendComment" data-id="{{$comment->id}}">
                    پاسخ به نظر
                </button>
                @endauth

                @include('layouts.comments', ['comments'=>$comment->child()->where('approved',1)->get()])

            </div>
        </div>
        
    @endforeach
