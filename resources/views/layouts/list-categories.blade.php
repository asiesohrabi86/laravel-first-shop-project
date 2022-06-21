
    <div class="list-group">
        
        @foreach ($categories as $category)
        <a href="{{route('category.show',$category->slug)}}" class="list-group-item list-group-item-action">{{$category->name}}</a>
        @endforeach

    </div>
