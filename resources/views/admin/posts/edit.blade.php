@extends('layouts.admin')

@section('documentTitle')
    Edit {{ $post->title }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Edit {{ $post->title }}</h2>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="title" class="form-label">Title Posts</label>
                    <input type="text" value="{{ $post->title }}" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <input type="text" value="{{ $post->content }}" class="form-control" id="content" name="content">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection