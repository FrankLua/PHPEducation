@extends('layouts.app')


@section('content')
<div class="wrapper">
    <div class="big-one-post">
        <div class="post-child">
            <h1>{{$data->title}}</h1>
            <p class="text-big-post">{{$data->content}}</p>
            <div class="post-footer">
                <h4>Автор: {{$data->user_tag}}</h4>
                <h4>Дата создания: {{date("d-m-Y h:m", strtotime($data->create_data))}}</h4>
            </div>
        </div>

    </div>
</div>
@endsection