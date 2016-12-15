@extends('master')

@section('title')
    Edit A Post
@endsection

@section('content')

    <form action='/posts/update/{{ $post->id }}' method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <input name='id' value='{{$post->id}}' type='hidden'>

        <p name="lostorfound">Lost Or Found
            <input type="radio" name="lostorfound" @if ($post->lostorfound == 0) checked @endif> LOST
            <input type="radio" name="lostorfound" @if ($post->lostorfound == 1) checked @endif> FOUND
        </p>
        <p>Category
            <select name="categories">
                @foreach ($categories as $category)
                    <option value={{$category['id']}} @if ($post->category_id == $category['id']) selected @endif>{{$category['name']}}</option>
                @endforeach
            </select>
        </p>
        <div>Tag
            <ul class="tags">
                @foreach ($tags as $tag)
                    <li class="tag"><input type="checkbox" name="tag[]" id={{$tag['id']}} value={{$tag['id']}} @if (in_array($tag['id'], $checkedTags)) checked @endif>{{$tag['name']}}</li>
                @endforeach
            </ul>
        </div>
        <p>Location <input type="text" name="location" value='{{old('location', $post->location)}}' class="input_text"></p>
        <p>Contact
            </br>
            Email <input type="text" name="email" value='{{old('email', $post->contact_email)}}' class="input_text">
            Phone <input type="text" name="phone" value='{{old('phone', $post->contact_phone)}}' class="input_text">
        </p>
        <p>Discription <textarea name="discription" value='{{old('discription', $post->discription)}}'>{{old('discription', $post->discription)}}</textarea></p>
        <input type="submit" class="btn btn-primary" value="Update">

        <div class="error">
            @if(count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </form>
@endsection
