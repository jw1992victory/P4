@extends('master')

@section('title')
    Home Page
@endsection

@section('content')
    <div class="redirect_link">
        <p class="add_new nav_link"><a href="posts/create">Add a New Post</a></p>
        <p class="view_all nav_link"><a href="posts/view">View all posts</a></p>
    </div>
    <div class="brief_introduction">
        <img class="background_pic" src="/img/lost_and_found.png" alt="cannot display, please refresh">
    </div>
@endsection
