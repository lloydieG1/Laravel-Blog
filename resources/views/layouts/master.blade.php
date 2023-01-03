<!DOCTYPE html>
<html>
    <head>
        <title>Blog - @yield('title')</title>
        <link rel="stylesheet" href="resources/css/app.css">
    </head>
    <body class="bg-blue-700">
        <nav class="content-center">
            <a href="/">Home</a>
            <a href="/users">Users</a>
            <a href="/tags">Tags</a>
            <a href="/page">My page</a>
            <a href="/login">Log in</a>
            <a href="/register">Register</a>
        </nav>

        <h1>Blog - @yield('title')</h1>

        <div class="container">
            @yield('content')
        <div>
    </body>
</html>