@extends('master')

@section('title')
    View All Posts
@endsection

@section('content')
    <div class="posts">
        @foreach ($posts as $post)
            <div class="post">
                <form action="{{ url('/posts/claim') }}" method="POST" class="claim">
                    {{ csrf_field() }}
                    <input name='id' type='hidden' value={{$post['id']}}>
                    <input type="submit" class="btn btn-info" value="Claim">
                </form>

                <form action="{{ url('/posts/delete') }}" method="POST" >
                    {{ csrf_field() }}
                    <input name='id' type='hidden' value={{$post['id']}}>

                    <p class="text-primary">
                        @if ($post['lost_or_found'])
                           Lost
                        @else
                           Found
                        @endif
                    </p>
                    <p>Category: {{$post['category']['name']}}</p>
                    <div>Tag:
                        @foreach ($post['tags'] as $tag)
                            <span class="tag_block">{{$tag['name']}} </span>
                        @endforeach
                    </div>
                    <p>Location: {{$post['location']}}</p>
                    <p>Contact_email: {{$post['contact_email']}}</p>
                    <p>Contact_phone: {{$post['contact_phone']}}</p>
                    <p>Discription: {{$post['discription']}}</p>

                    <p>Claimed: @if ($post['claimed'])
                            Has already been claimed
                        @else
                            Hasn't been claimed yet
                        @endif
                    </p>

                    <input type="submit" class="btn btn-primary" value="delete">

                    <a href="/posts/edit/{{$post['id']}}"><input class="btn btn-info" value="Edit"></a>

                </form>
            </div>
        @endforeach
    </div>
@endsection
