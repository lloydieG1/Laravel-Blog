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
            <a href="/register">Register</a>
            @if (auth()->check())
                @if (is_null(Auth::user()->page))
                    <a href="{{ route('page.create') }}">Create page</a>
                @else
                    <a href="{{ route('page.show', ['id' => Auth::user()->page->id]) }}">My page</a>
                    <a href="/page/createpost">Create Post</a>
                @endif
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