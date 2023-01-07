
@extends('layouts.master')

@section('title', $post->title)

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">{{ $post->title }}</h1>
        <div class="text-gray-600 font-bold">
             by <a href="/users/{{ $post->page->id }}">{{ $post->page->user->name }}</a>
            on {{ $post->created_at->format('F j, Y') }}
        </div>
    </div>
    <div class="mb-4">
    <div class="mb-8">
        <p class="resize-none w-full py-2 px-10 leading-tight text-gray-700 border rounded">
            {{ $post->body }}
        </p>
    </div>
    <div class="mb-8">
    <span class="font-bold text-gray-700">Tags:</span>
        @foreach ($post->tags as $tag)
            <a href="{{ route('tags.show', ['id' => $tag->id]) }}" class="inline-block px-2 py-1 text-blue-500 rounded-full bg-gray-100 hover:bg-gray-200 hover:text-blue-600">{{ $tag->name }}</a>
        @endforeach
    </div>
     @auth
        @if (Auth::user()->id == $post->page->user->id || Auth::user()->role == 'admin')
            <div>
                @if ($post->image_url)
                    <img src="{{ asset('storage/' . $post->image_url) }}" alt="{{ $post->title }}" class="w-320 h-180 mb-4" width="320" height="180">
                @endif
            </div>
            <div>
                <a href="/posts/{{ $post->id }}/edit" class="px-4 py-2 bg-gray-800 text-white font-bold rounded-full shadow-md hover:bg-gray-900">
                    Edit
                </a>
            </div>
            <div>
                <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white float-right font-bold rounded-full shadow-md hover:bg-red-700">
                        Delete
                    </button>
                </form>
            </div>
        @endif
    @endauth
    <div class="mb-8">
        <livewire:add-comment :model='$post' />
    </div>
@endsection
