@extends('layouts.master')

@section('title', 'users')

@section('content')
    <ul class="list-reset">
        @foreach ($users as $user)
            <li class="px-4 py-2 mb-2 bg-white shadow-md rounded-md">
                <a class="block no-underline hover:text-gray-800"
                    href="{{ route('page.show', ['id' => $user->page->id]) }}">
                    <div class="flex items-center">
                        <div class="text-lg font-bold text-gray-800">{{ $user->name }}</div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
    {{ $users->links() }}

@endsection
