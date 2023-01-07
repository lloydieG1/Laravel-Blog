@extends('layouts.master')

@section('title', 'Tags')

@section('content')
    <ul class="list-reset">
        @foreach ($tags as $tag)
            <li class="px-4 py-2 mb-3 bg-gray-200 hover:bg-gray-300 shadow-md rounded-md">
                <a class="block no-underline hover:text-gray-800"
                    href="{{ route('tags.show', ['id' => $tag->id]) }}">
                    <div class="flex items-center">
                        <div class="text-lg font-bold text-gray-800">{{ $tag->name }}</div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>

@endsection
