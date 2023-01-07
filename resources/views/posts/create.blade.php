@extends('layouts.master')

@section('title', 'Create Post')

@section('content')
    <form method = "POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
        @csrf
        <p class="block font-bold text-2xl mb-2">
            Title: <input class="w-full rounded-md p-4 border-2 border-gray-200" type="text" name="title" value="{{ old('title') }}">
        </p>
        <p class="block font-bold text-2xl mb-2">
            Body: <input class="w-full rounded-md p-4 border-2 border-gray-200" type="text" name="body" value="{{ old('body') }}">
        </p>
        <div class="mb-4">
            <label for="tags" class="block text-gray-700 font-bold mb-2">Tags</label>
            <select name="tags[]" id="tags" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" multiple>
              @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
              @endforeach
            </select>
        </div>
        <input type="file" name="image_url" class="w-full rounded-md p-4 border-2 border-gray-200">
        <input type="hidden" name="page_id" value="{{ Auth::user()->page->id }}">
        <input type="submit" value="Submit" class="px-4 py-2 mt-8 bg-gray-800 text-white font-bold rounded-full shadow-md hover:bg-gray-900">
        <a href="{{ route('page.show', ['id' => Auth::user()->page->id]) }}"
            class="px-4 py-2 mt-8 bg-gray-800 text-white font-bold rounded-full shadow-md hover:bg-gray-900">Cancel</a>
    </form>
@endsection
