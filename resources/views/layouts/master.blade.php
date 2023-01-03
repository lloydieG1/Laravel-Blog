<!DOCTYPE html>
<html>
    <head>
        <title>Blog - @yield('title')</title>
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body class="bg-blue-700">
        <nav class="content-center">
            <a href="/">Home</a>
            <a href="/users">Users</a>
            <a href="/tags">Tags</a>
            <a href="/mypage">My page</a>
            <a href="/register">Register</a>
            @if (auth()->check())
                <a href="/mypage/createpost">Create Post</a>
                <a href="/logout">Log out</a>
            @else
                <a href="/login">Log in</a>
            @endif
        </nav>

        <h1>Blog - @yield('title')</h1>

        <div class="container">
            @yield('content')
        <div>
    </body>
</html>