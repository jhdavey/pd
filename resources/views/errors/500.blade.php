@extends('layouts.app')

@section('title', 'Server Error')

@section('content')
<x-panel>
    <h1 class="text-3xl font-bold mb-5">Oops! Something went wrong.</h1>
    <p class="mb-5">We're experiencing an internal server error. Please try again later or contact support if the issue persists.</p>
    <a href="{{ url('/') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Go to Homepage</a>
</x-panel>
@endsection