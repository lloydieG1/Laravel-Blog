@extends('layouts.app')

@section('title', 'Page')

@section('content')
    <p>Details:</p>
    <ul>
       <li>Name: {{$user->name}}</li>
       <li>Email: {{$user->email}}</li>
    </ul>
@endsection