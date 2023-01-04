@extends('layouts.master')

@section('title', 'Create Page')

@section('content')
    <form method = "POST" action="{{ route('page.store') }}">
        @csrf
        <p>Name your page: <input type="text" name="title" value="{{ old('title') }}"></p>
        <p>Give your page a description: <input type="text" 
            name="description" value="{{ old('description') }}"></p>
        <input type="submit" value="Submit">
        <input type="hidden" name="user_id" value={{Auth::user()->id}}>
        <a href="{{ route('home') }}">Cancel</a>
    </form>
@endsection