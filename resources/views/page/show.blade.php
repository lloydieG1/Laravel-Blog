@extends('layouts.master')

@section('title', 'Page')

@section('content')
    <p>Your details:</p>
    <ul>
       <li>Name: {{$page->user->name}}</li>
       <li>Email: {{$page->user->email}}</li>
    </ul>
    <p>Posts:</p>
    <ul>
        @foreach ($page->posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
@endsection