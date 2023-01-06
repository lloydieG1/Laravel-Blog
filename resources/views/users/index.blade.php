@extends('layouts.master')

@section('title', 'Users')

@section('content')
    <ul class="list-reset">
        @foreach ($users as $user)
            <li class="px-4 py-2 mb-3 bg-gray-200 hover:bg-gray-300 shadow-md rounded-md">
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
