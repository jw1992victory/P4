<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'HomePage' --}}
        @yield('title','HomePage')
    </title>

    <meta charset='utf-8'>
    <link href="{{ URL::asset('css/master.css') }}" type='text/css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{ URL::asset('js/p4.js') }}"></script>
</head>
<body>

    <div class="wrapper">

        <div class="navigation">
            <h1 class="app_title navigation_title">Online LOST&FOUND</h1>
            <form method="POST" action="/homepage/login">
                {{ csrf_field() }}
                <input type="submit" class="button js-login" onclick="jumpToLogin()" value="Log In">
            </form>
            <form method="POST" action="/homepage/register">
                {{ csrf_field() }}
                <input type="submit" class="button js-register" onclick="jumpToRegister()" value="Join Now">
            </form>
        </div>

        <section>
            {{-- Main page content will be yielded here --}}
            <div class="content">
                @yield('content')
            </div>
        </section>
    </div>
    <footer>
        wendy jiang @ {{ date('Y') }} <img class="picture" src="/img/github.png"><a target="_blank" href="https://github.com/jw1992victory/P3">github</a>
    </footer>

</body>
</html>