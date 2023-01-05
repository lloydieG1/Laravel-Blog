
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
    {!! $post->body !!}
  </div>
  <div class="mb-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Comments</h2>
    <ul class="list-reset">
      @foreach ($post->comments as $comment)
        <li class="mb-4">
          <div class="bg-gray-200 p-4 rounded-md">
            <div class="text-gray-600 font-bold mb-2">
              by <a href="/users/{{ $comment->commentable }}">{{ $comment->commentable->name }}</a>
              on {{ $comment->created_at->format('F j, Y') }}
            </div>
            <div class="text-gray-700">{{ $comment->body }}</div>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
@endsection
