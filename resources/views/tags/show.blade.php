@extends('layouts.master')

@section('title', $tag->name)

@section('content')
  <h1 class="text-3xl font-bold text-gray-800 mb-8">{{ $tag->name }}</h1>
  <ul class="list-reset">
    @foreach ($tag->posts as $post)
      <li class="px-4 py-2 mb-3 bg-gray-200 hover:bg-gray-300 shadow-md rounded-md">
        <a href="/posts/{{ $post->id }}" class="block no-underline hover:text-gray-800">
          <div class="flex items-center">
            <div class="text-lg font-bold text-gray-800">{{ $post->title }}</div>
          </div>
        </a>
      </li>
    @endforeach
  </ul>
@endsection
