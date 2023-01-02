@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <p>Details:</p>
    <ul>
       <li>Name: {{$user->name}}</li>
       <li>Email: {{$user->email}}</li>
    </ul>
@endsection