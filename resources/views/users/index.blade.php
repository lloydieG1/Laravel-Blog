@extends('layouts.app')

@section('title', 'users')

@section('content')
    <p>List of users:</p>
    <ul>
        @foreach ($users as $user)
            <li><a href="{{ route('users.show', ['id' => $user->id]) }}"> {{ $user->name }} </a></li>
        @endforeach
    </ul>
    {{ $users->links() }}

@endsection