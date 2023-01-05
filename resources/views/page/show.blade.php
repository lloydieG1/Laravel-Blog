@extends('layouts.master')

@section('title', $page->title)

@section('content')
    <div class="border-2 border-gray-200 rounded-md p-4">
        <p class="text-lg font-bold text-gray-800 mb-2">Description</p>
        <p class="text-gray-700">{{ $page->description }}</p>
    </div>
    <div class="flex items-center mb-8">
        <img src="/images/logo.png" alt="Avatar" class="h-24 w-24 rounded-full mr-4">
        <div class="text-3xl font-bold text-gray-800">{{ $page->user->name}}</div>
    </div>
    <h2 class="text-2xl font-bold text-gray-800 mb-8">Posts</h2>
    <ul>
        @foreach ($page->posts as $post)
        <li class="px-4 py-2 mb-2 bg-white shadow-md rounded-md">
            <a href="/posts/{{ $post->id }}" class="block no-underline hover:text-gray-800">
              <div class="flex items-center">
                <div class="text-lg font-bold text-gray-800">{{ $post->title }}</div>
              </div>
            </a>
          </li>
        @endforeach
    </ul>
@endsection
