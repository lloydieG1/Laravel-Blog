@extends('layouts.app')

@section('title', 'users')

@section('content')
    <p>List of users:</p>
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
@endsection