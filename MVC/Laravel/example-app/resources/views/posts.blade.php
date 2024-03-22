
@extends('layout.main')
@section('content')


<div class="wrapper">
    <div class="posts-table">
        <div class="posts-header">
            <h3> Список всех постов IShepot.ru </h3>
        </div>
        <div class="posts-main">
              
@foreach ($data as $item)

<div class = "one-post">
    <div class="main-part">
        {{$item->shor_content}}
    </div>
    
</div>



    
</div>
    
@endforeach
</div> 
</div>

</div>

@endsection