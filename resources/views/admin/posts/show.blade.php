@extends('layouts.admin')

@section('documentTitle')
    {{ $post->title }}
@endsection

@section('content')
    @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{ $post->title }}</h1>
                <h2>Category: {{ $post->category()->first()->name }} </h2>
                <h3>Author: {{ $post->user()->first()->name }} </h3>
            </div>
            <div class="row">
            <div class="col">
                {{ $post->content }}
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-primary mt-3" href="{{ route('admin.posts.index') }}">Go Back</a>
            </div>
        </div>
    </div>
@endsection