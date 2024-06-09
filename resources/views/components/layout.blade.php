<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passion Driven</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Font: Work Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Lightbox for image expansion -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

</head>

<body class="bg-background text-white font-sans pb-12">
    <div class="px-10">
        <nav x-data="{ open: false }" class="border-b border-white/10 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-6">
                    <a href="/">
                        <img class="h-[50px] mr-10" src="{{ Vite::asset('resources/images/logoFull.png') }}" />
                    </a>
                    @auth
                    <div class="hidden lg:flex text-lg transition-colors duration-200 space-x-6">
                        <a href="/" class="hover:text-gray-500">Browse</a>
                        <a href="{{ route('garage.show', $authUser->id) }}" class="hover:text-gray-500">Garage</a>
                        <a href="/feedback" class="hover:text-gray-500">Beta</a>
                    </div>
                    @endauth
                </div>

                <div class="hidden lg:flex space-x-6 items-center font-bold text-sm">
                    <x-forms.form action="/search">
                        <x-forms.input :label="false" name="q" placeholder="Search builds..."></x-forms.input>
                    </x-forms.form>
                    @guest
                    <a href="/register" class="hover:text-gray-500">Sign Up</a>
                    <a href="/login" class="hover:text-gray-500">Log In</a>
                    @endguest
                    @auth
                    <form method="POST" action="/logout">
                        @csrf
                        @method('DELETE')
                        <button class="hover:text-gray-500">Log Out</button>
                    </form>
                    @endauth
                </div>

                <div class="lg:hidden flex items-center">
                    <button @click="open = !open" class="text-white focus:outline-none">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div x-show="open" @click.away="open = false" class="lg:hidden">
                <div class="pt-4 pb-2 space-y-1">

                    <x-forms.form action="/search">
                        <x-forms.input class="h-4 w-full sm:w-['100px']" :label="false" name="q" placeholder="Search Year/Make/Model"></x-forms.input>
                    </x-forms.form>

                    @auth
                    <a href="/" class="block px-4 py-2 text-sm font-semibold hover:bg-white/10">Home</a>
                    <a href="/garage" class="block px-4 py-2 text-sm font-semibold hover:bg-white/10">Garage</a>
                    <a href="/feedback" class="block px-4 py-2 text-sm font-semibold hover:bg-white/10">Beta</a>
                    @endauth

                    @guest
                    <a href="/register" class="block px-4 py-2 text-sm font-semibold hover:bg-white/10">Sign Up</a>
                    <a href="/login" class="block px-4 py-2 text-sm font-semibold hover:bg-white/10">Log In</a>
                    @endguest
                    @auth
                    <form method="POST" action="/logout">
                        @csrf
                        @method('DELETE')
                        <button class="w-full text-left px-4 py-2 text-sm font-semibold hover:bg-white/10">Log Out</button>
                    </form>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="mt-10 max-w-[986px] mx-auto">
            {{ $slot }}
        </main>
    </div>
</body>

</html>