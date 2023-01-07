@extends('layouts.master')

@section('title', 'Create Page')

@section('content')
    <form method = "POST" action="{{ route('page.store') }}">
        @csrf
        <p>Name your page: <input type="text" name="title" value="{{ old('title') }}"></p>
        <p>Give your page a description: <input type="text"
            name="description" value="{{ old('description') }}"></p>
        <input class="px-4 py-2 bg-gray-800 text-white font-bold rounded-full shadow-md hover:bg-gray-900" type="submit" value="Submit">
        <input type="hidden" name="user_id" value={{Auth::user()->id}}>
        <a class="px-4 py-2 bg-red-500 text-white font-bold rounded-full shadow-md hover:bg-gray-900" href="{{ route('home') }}">Cancel</a>
    </form>
@endsection
