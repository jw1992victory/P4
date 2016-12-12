@extends('master')

@section('title')
    Posts
@endsection

@section('content')
    <form action="{{ url('/posts/addNewPost') }}" method="POST">
        {{ csrf_field() }}
        <p>Lost Or Found
            <input type="checkbox" name="lost"> LOST
            <input type="checkbox" name="found"> FOUND
        </p>
        <p>Category
            <select name="tag">
                <option value="volvo">Wallet</option>
                <option value="saab">Phone</option>
                <option value="mercedes">Book</option>
                <option value="audi">Bag</option>
                <option value="audi">Key</option>
                <option value="audi">Card</option>
                <option value="audi">Other</option>
            </select>
        </p>
        <div>Tag
            <ul class="choices_list">
                <li class="choice"><input type="radio" name="tag" id="US" value="united states"></li>
                <li class="choice"><input type="radio" name="tag" id="Canada" value="canada">Canada</li>
                <li class="choice"><input type="radio" name="tag" id="Englaund" value="england">England</li>
                <li class="choice"><input type="radio" name="tag" id="Australia" value="australia">Australia</li>
                <li class="choice"><input type="radio" name="tag" id="Germany" value="germany">Germany</li>
                <li class="choice"><input type="radio" name="tag" id="China" value="china">China</li>
            </ul>
            <p>Add new tag<input type="text" name="newTag" value="@yield('newTag', old("newTag"))" class="input_text"></p>
        </div>
        <p>Location <input type="text" name="location" value="@yield('location', old("location"))" class="input_text"></p>
        <p>Contact
            <input type="text" name="email" value="@yield('email', old("email"))" class="input_text">Email
            <input type="text" name="phone" value="@yield('phone', old("phone"))" class="input_text">Phone
        </p>
        <p>Discription <textarea name="discription" value="@yield('discription', old("discription"))"></textarea></p>
        <input type="submit" class="btn btn-primary" value="Submit">
    </form>
@endsection
