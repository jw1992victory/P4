@extends('master')

@section('title')
    Create A Post
@endsection

@section('content')
    <form action="{{ url('/posts/save') }}" method="POST">
        {{ csrf_field() }}
        <div name="lostorfound" class="input_section"><span class="sub_title">Lost Or Found </span>
            <input type="radio" name="lostorfound" value="lost"> LOST
            <input type="radio" name="lostorfound" value="found"> FOUND
        </div>
        <div class="input_section"><span class="sub_title">Category </span>
            <select name="categories">
                @foreach ($categories as $category)
                    <option value={{$category['id']}}>{{$category['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="input_section"><p class="sub_title">Tag</p>
            @foreach ($tags as $tag)
                <input type="checkbox" name="tag[]" id={{$tag['id']}} value={{$tag['id']}}>{{$tag['name']}}
            @endforeach
        </div>
        <div class="input_section"><span class="sub_title">Location</span> <input type="text" class="input_group" name="location" value="@yield('location', old("location"))" class="input_text"></div>
        <div class="input_section"><span class="sub_title">Contact </span>
            </br>
            Email  <input type="text" name="email" value="@yield('email', old("email"))" class="input_text">
            Phone <input type="text" name="phone" value="@yield('phone', old("phone"))" class="input_text">
        </div>
        <div class="input_section"><span class="sub_title">Discription </span><textarea name="discription" value="@yield('discription', old("discription"))">@yield('discription', old("discription"))</textarea></div>
        <input type="submit" class="btn btn-primary input_section" value="Submit">

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
