
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
  <div>
    @if ($post->image_url)
        <img src="{{ asset('storage/' . $post->image_url) }}" alt="{{ $post->title }}" class="w-320 h-180 mb-4" width="320" height="180">
    @endif
  </div>
  <div class="mb-8">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Comments</h2>
        <!-- ... -->
        @auth
          <form action="/comments" method="post" class="mb-4">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea name="body" rows="4" class="w-full rounded-md p-4 border-2 border-gray-200" placeholder="Leave a comment..."></textarea>
            <button type="submit" class="px-4 py-2 mt-4 bg-gray-800 text-white font-bold rounded-full shadow-md hover:bg-gray-900">
              Comment
            </button>
          </form>
        @else
          <p class="mb-4 text-gray-600">
            Please <a href="/login" class="text-gray-800 font-bold hover:text-gray-800 underline">log in</a> to leave a comment.
          </p>
        @endauth
    </div>

    <ul class="list-reset">
      @foreach ($post->comments as $comment)
        <li class="mb-4">
          <div class="bg-gray-200 p-4 rounded-md">
            <div class="text-gray-600 font-bold mb-2">
              by <a href="/users/{{ $comment->user->page->id }}">{{ $comment->user->name }}</a>
              on {{ $comment->created_at->format('F j, Y') }}
            </div>
            <div class="text-gray-700">{{ $comment->body }}</div>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
@endsection
