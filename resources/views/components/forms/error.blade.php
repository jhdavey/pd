@props(['error' => false])

@if ($error)
dd('Error');
    <p class="text-sm text-red-500 mt-1">{{ $error }}</p>
@endif