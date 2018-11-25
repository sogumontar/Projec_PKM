@extends('layouts.app')

@section('content')
<div class="container">
    <form class="" action="{{ route('post.store')}}">
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" rows="6" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input class="btn btn-secondary" type="submit" value="save">
            
        </div>
    </form>
</div>
@endsection