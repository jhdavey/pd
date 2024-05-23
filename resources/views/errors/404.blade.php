<!-- resources/views/errors/404.blade.php -->
<x-layout>
    <x-page-heading>Page Not Found</x-page-heading>

    <div class="text-center text-gray-500">
        <p>Sorry, the page you are looking for could not be found.</p>
        <a href="{{ url('/') }}" class="text-blue-500">Go to Homepage</a>
    </div>
</x-layout>