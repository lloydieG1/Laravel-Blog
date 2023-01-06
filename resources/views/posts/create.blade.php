@extends('layouts.master')

@section('title', 'Create Post')

@section('content')
    <form method = "POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
        @csrf
        <p>Title: <input type="text" name="title" value="{{ old('title') }}"></p>
        <p>Body: <input type="text" name="body" value="{{ old('body') }}"></p>
        <p>Tag: <input type="text" name="tag" value="{{ old('tag') }}"></p>
        <input type="file" name="image_url" class="w-full rounded-md p-4 border-2 border-gray-200">
        <input type="submit" value="Submit">
        <input type="hidden" name="page_id" value="{{ Auth::user()->page->id }}">
        <a href="{{ route('page.show', ['id' => Auth::user()->page->id]) }}">Cancel</a>
    </form>
@endsection
