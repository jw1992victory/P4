@extends('master')

@section('title')
    Home Page
@endsection

@section('content')
    <p>Email <input type="text" name="email" value="@yield('email', old("email"))" class="input_text"></p>
    <p>User Name <input type="text" name="user_name" value="@yield('user_name', old("user_name"))" class="input_text"></p>
    <p>Password <input type="text" name="password" value="@yield('password', old("password"))" class="input_text"></p>
    <p>Confirm Password <input type="text" name="password" value="@yield('password', old("password"))" class="input_text"></p>
    <input type="submit" class="button" value="Register">
@endsection
