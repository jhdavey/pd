<!DOCTYPE html>
<html>
<head>
</head>
<body class="bg-gray-100 font-sans">
    <div class="max-w-lg mx-auto my-8 bg-background p-8 rounded-lg shadow">
        <div class="text-center">
            <!-- <a href="{{ config('app.url') }}">
                <img src="{{ Vite::asset('resources/images/logoSmall.png') }}" alt="{{ config('app.name') }}" class="h-12 mx-auto">
            </a> -->
        </div>
        <div class="mt-4">
            <h1 class="text-2xl font-bold">{{ $greeting }}</h1>
            @foreach ($introLines as $line)
                <p class="mt-2">{{ $line }}</p>
            @endforeach

            @isset($actionText)
                <div class="mt-6 text-center">
                    <a href="{{ $actionUrl }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                        {{ $actionText }}
                    </a>
                </div>
            @endisset

            @foreach ($outroLines as $line)
                <p class="mt-2">{{ $line }}</p>
            @endforeach

            <p class="mt-4">{{ $salutation }}</p>
        </div>
        <div class="mt-8 text-center text-gray-500 text-sm">
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>
</html>
