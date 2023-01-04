@extends('layouts.master')

@section('title', 'Page')

@section('content')
    <p>Your details:</p>
    <ul>
       <li>Name: {{$user->name}}</li>
       <li>Email: {{$user->email}}</li>
    </ul>
@endsection