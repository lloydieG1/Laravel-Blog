@extends('layouts.master')

@section('title', 'users')

@section('content')
    <p>List of users:</p>
    <ul>
        @foreach ($users as $user)
            <li><a href="{{ route('page.show', ['id' => $user->page->id]) }}"> {{ $user->name }} </a></li>
        @endforeach
    </ul>
    {{ $users->links() }}

@endsection