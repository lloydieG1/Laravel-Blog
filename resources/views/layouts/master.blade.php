<!DOCTYPE html>
<html>
    <head>
        <title>Blog - @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-200 font-sans leading-normal tracking-normal">
        <nav class="bg-white py-6 shadow-md">
            <div class="container mx-auto px-6 flex items-center justify-between">
                <a href="/"><img src="/images/logo.png" alt="Logo" class="h-20 w-200" height="20" width="200"></a>
                <a href="/users" class="mr-4 text-gray-800 hover:text-gray-600 no-underline">Users</a>
                <a href="/tags" class="mr-4 text-gray-800 hover:text-gray-600 no-underline">Tags</a>
                @auth
                    @if (is_null(Auth::user()->page))
                        <a href="{{ route('page.create') }}" class="mr-4 text-gray-800 hover:text-gray-600 no-underline">Create page</a>
                    @else
                        <a href="{{ route('page.show', ['id' => Auth::user()->page->id]) }}" class="mr-4 text-gray-800 hover:text-gray-600 no-underline">My page</a>
                        <a href="/page/createpost" class="mr-4 text-gray-800 hover:text-gray-600 no-underline">Create Post</a>
                    @endif
                    <a href="/logout" class="mr-4 text-gray-800 hover:text-gray-600 no-underline">Log out</a>
                @else
                    <a href="/login" class="mr-4 text-gray-800 hover:text-gray-600 no-underline">Log in</a>
                    <a href="/register" class="mr-4 text-gray-800 hover:text-gray-600 no-underline">Register</a>
                @endauth
            </div>
        </nav>
        <div class="container mx-auto px-6 pt-10 pb-8">
            <h1 class="text-4xl font-bold text-gray-800 text-center mb-8">
                @yield('title')
            </h1>
        </div>

        <div class="container" class="container mx-auto px-6 pt-10 pb-8">
            @yield('content')
        <div>

    </body>

</html>
