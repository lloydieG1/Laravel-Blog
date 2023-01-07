@extends('layouts.master')

@section('title', 'Add tags')

@section('content')
    <form method = "POST" action="{{ route('tags.store') }}">
        @csrf
        <p class="block font-bold text-2xl mb-2">
            Name: <input class="w-full rounded-md p-4 border-2 border-gray-200" type="text" name="name" value="{{ old('title') }}">
        </p>
        <input type="submit" value="Submit" class="px-4 py-2 mt-8 bg-gray-800 text-white font-bold rounded-full shadow-md hover:bg-gray-900">
        <a href="{{ route('page.show', ['id' => Auth::user()->page->id]) }}"
            class="px-4 py-2 mt-8 bg-gray-800 text-white font-bold rounded-full shadow-md hover:bg-gray-900">Cancel</a>
    </form>
@endsection
