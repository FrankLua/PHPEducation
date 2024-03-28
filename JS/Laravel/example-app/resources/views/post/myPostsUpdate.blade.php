@foreach ($posts as $item)
<div class="post-all">
    <h3>{{$item->title}}</h3>
    <p>
        {{$item->short_content}} ...
    </p>
    <h3> {{ date("d-m-Y h:m", strtotime($item->create_data));}}</h3>
    <div class="post-one-dashbord">
        <a href={{route('post.page', ['id'=> $item->id])}} class="btn btn-post">
            Узнать больше
        </a>
        <button class="btn btn-warning" id='btn-delete-post' data-id={{$item->id}}>
            Удалить
        </button>
    </div>

</div>
@endforeach
<div id="pagination_links">
        {{$posts->links('pagination::bootstrap-5')}}
</div>