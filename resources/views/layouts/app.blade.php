<!DOCTYPE html>
<html>
    <head>
        <title>Blog - @yield('title')</title>
    </head>
    <body>
        <nav class="navbar">
            <a href="/">Home</a>
            <a href="/users">Users</a>
            <a href="/tags">Tags</a>
            <a href="/page">My page</a>
        </nav>

        <h1>Blog - @yield('title')</h1>
 
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>