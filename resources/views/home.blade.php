@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <p class="text-3xl text-gray-800 mb-8 text-center">Welcome!</p>
    <h2 class="mb-4">Random fun fact:</h2>
    <p class="resize-none w-full py-2 px-10 leading-tight text-gray-700 border rounded">
        {{ $randomFact }}
    </p>
@endsection
