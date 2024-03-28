@extends('layouts.app')


@section('content')
<div class="wrapper">
    <div class="big-one-post">
        <div class="post-child">            
            <form action="/Post/Store" method="post">
                <h1>Напиши Пост</h1>
                @csrf
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Заголовок" min="6" max="255">
                </div>
                <div class="form-group">
                    <textarea name="content" id="" cols="30" rows="15" class="form-control" placeholder="Содержание"
                        min="6"></textarea>
                </div>
                <button type="submit" class="btn btn-submit"> Шепнуть </button>
            </form>
        </div>
    </div>
</div>
@endsection