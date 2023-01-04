@extends('layouts.master')

@section('title', 'Page')

@section('content')
    <h2>{{ $page->title }}</h2>
    <p>{{ $page->description }}</p>
    <h3>Details:</h3>
    <ul>
       <li>Name: {{$page->user->name}}</li>
       <li>Email: {{$page->user->email}}</li>
    </ul>
    <p>Posts:</p>
    <ul>
        @foreach ($page->posts as $post)
            <li>Title: {{ $post->title }} <br> {{ $post->body }}</li>
        @endforeach
    </ul>
@endsection