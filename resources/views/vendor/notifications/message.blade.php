<x-layout>
    <div class="wrapper">
        <div class="content">
            <div class="header">
                <h1>{{ config('app.name') }}</h1>
            </div>
            {{ $slot }}
            <div class="footer">
                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </div>
        </div>
    </div>
</x-layout>