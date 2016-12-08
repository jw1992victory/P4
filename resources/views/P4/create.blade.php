@extends('master')

@section('title')
    Posts
@endsection

@section('content')
    <p>Lost Or Found
        <input type="checkbox" name="random"> LOST
        <input type="checkbox" name="random"> FOUND
    </p>
    <p>Category
        <select>
            <option value="volvo">Wallet</option>
            <option value="saab">Phone</option>
            <option value="mercedes">Book</option>
            <option value="audi">Bag</option>
            <option value="audi">Key</option>
            <option value="audi">Card</option>
            <option value="audi">Other</option>
        </select>
    <p>Location <input type="text" name="password" value="@yield('password', old("password"))" class="input_text"></p>
    <p>Contact
        <input type="text" name="password" value="@yield('password', old("password"))" class="input_text">Email
        <input type="text" name="password" value="@yield('password', old("password"))" class="input_text">Phone
    </p>
    <p>Discription <textarea name="password" value="@yield('password', old("password"))"></textarea></p>
    <input type="submit" class="button" value="Submit"> do you want to log in first?
@endsection
