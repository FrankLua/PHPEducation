
@extends('layout.main')
@section('content')

<div class="login-form">
    <form action={{route('posts.store')}} method="post">
        @csrf
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="title">
        </div>
        <div class="form-group">
            <textarea name="content" id="" cols="30" rows="15" class="form-control" placeholder="Content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary"> Create news </button>
    </form>
</div>

@endsection