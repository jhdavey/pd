<x-mail::message>
<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name') }}</title>
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }
        .container {
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin-top: 20px;
        }
        .header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .content {
            font-size: 16px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #6c757d;
        }
        .btn-primary {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            {{ config('app.name') }}
        </div>
        <div class="content">
            {{-- Greeting --}}
            @if (! empty($greeting))
                <h1>{{ $greeting }}</h1>
            @else
                @if ($level === 'error')
                    <h1>@lang('Whoops!')</h1>
                @else
                    <h1>@lang('Hello!')</h1>
                @endif
            @endif

            {{-- Intro Lines --}}
            @foreach ($introLines as $line)
                <p>{{ $line }}</p>
            @endforeach

            {{-- Action Button --}}
            @isset($actionText)
                <?php
                    $color = match ($level) {
                        'success', 'error' => $level,
                        default => 'primary',
                    };
                ?>
                <a href="{{ $actionUrl }}" class="btn-primary">
                    {{ $actionText }}
                </a>
            @endisset

            {{-- Outro Lines --}}
            @foreach ($outroLines as $line)
                <p>{{ $line }}</p>
            @endforeach

            {{-- Salutation --}}
            @if (! empty($salutation))
                <p>{{ $salutation }}</p>
            @else
                <p>@lang('Regards'),<br>{{ config('app.name') }}</p>
            @endif
        </div>
        {{-- Subcopy --}}
        @isset($actionText)
            <div class="footer">
                @lang(
                    "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
                    'into your web browser:',
                    [
                        'actionText' => $actionText,
                    ]
                ) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
            </div>
        @endisset
    </div>
</body>
</html>
</x-mail::message>
