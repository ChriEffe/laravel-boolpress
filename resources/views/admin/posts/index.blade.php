@extends('layouts.admin')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <h1 class="h1">Admin - All posts</h1>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-primary">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Category</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th colspan="3" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>
                                    @foreach ($post->tags()->get() as $tag)
                                        {{ $tag->name }}
                                    @endforeach
                                </td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
                                <td><a class="btn btn-primary" href="{{ route('admin.posts.show', $post->slug) }}">View</a>
                                </td>
                                <td>
                                    <a class="btn btn-info"
                                        href="{{ route('admin.posts.edit', $post->slug) }}">Modify</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection