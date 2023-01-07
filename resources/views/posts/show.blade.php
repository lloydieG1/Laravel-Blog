
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
    <div class="mb-8">
        {{ $post->body }}
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
    <div>
        <livewire:add-comment :model='$post' />
    </div>
    </div>
@endsection
