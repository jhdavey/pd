<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Passion Driven</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('analytics')

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Google Font: Work Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Lightbox for image expansion -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <!-- TinyMCE Rich Text Editor script -->
    <script src="https://cdn.tiny.cloud/1/swcectlvcctnntnb8qbjbtqpn40l9x0v8apa51tpbfly3o9c/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#note',
            skin: 'oxide-dark',
            content_css: 'dark',
            plugins: 'link table lists advlist image media',
            menubar: 'file edit insert format',
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image media',
            statusbar: false,
            height: 300,
            link_assume_external_targets: 'https',
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image media',
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true,
            file_picker_callback: (cb, value, meta) => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');

                if (meta.filetype === 'image') {
                    input.setAttribute('accept', 'image/*');
                } else if (meta.filetype === 'media') {
                    input.setAttribute('accept', 'video/*,audio/*');
                }

                input.addEventListener('change', (e) => {
                    const file = e.target.files[0];

                    const formData = new FormData();
                    formData.append('file', file);

                    fetch('/media-upload', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            cb(data.location, {
                                title: file.name
                            });
                        })
                        .catch(error => {
                            console.error('Error uploading media:', error);
                        });
                });

                input.click();
            },
        });
    </script>

</head>

<body class="bg-background text-white font-sans pb-12">
    <div class="px-3 md:px-6">
        <nav x-data="{ open: false }" class="border-b border-white/10 py-4">
            <div class="flex justify-between items-center px-2">
                <div class="flex items-center space-x-6">
                    <a href="/">
                        <img class="h-[50px] mr-10" src="{{ Vite::asset('resources/images/logoFull.png') }}" />
                    </a>
                    @auth
                    <div class="hidden lg:flex text-lg transition-colors duration-200 space-x-6">
                        <a href="/" class="hover:text-gray-500">Home</a>
                        <a href="{{ route('garage.show', $authUser->id) }}" class="hover:text-gray-500">Garage</a>
                    </div>
                    @endauth
                </div>

                <div class="hidden lg:flex space-x-6 items-center text-sm">
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
                        <x-forms.input class="w-full sm:w-['100px']" :label="false" name="q" placeholder="Search Year/Make/Model"></x-forms.input>
                    </x-forms.form>

                    @auth
                    <a href="/" class="block px-4 py-2 text-sm font-semibold hover:bg-white/10">Home</a>
                    <a href="{{ route('garage.show', $authUser->id) }}" class="block px-4 py-2 text-sm font-semibold hover:bg-white/10">Garage</a>
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

        <!-- Expandable Beta Message -->
        <div x-data="{ open: false }" class="bg-white/10 px-4 py-2 rounded mt-1">
            <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                <h2 class="text-lg text-red-500 italic">Welcome to the Passion Driven Beta</h2>
                <svg class="w-6 h-6 transition-transform transform" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="red">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
            <div x-show="open" x-transition class="mt-4">
                <p class="my-6">***Image database was reset - PLEASE REUPLOAD IMAGES -
                    <br /><br />I began this project in June 2024. My goal is to create a platform that allows fellow car enthusiasts of all types to track and share builds. I am constantly adding and improving features, but there is still a lot of work to do and some bugs to fix.
                    <br /><br />Please share any feedback you have, and let us know what features you would like to see by navigating to the <a href='/feedback' class="text-blue-500 underline italic">Beta Page</a>.
                    <br /><br />Thank you for being part of the community!
                </p>
            </div>
        </div>

        <main class="mt-10 max-w-[986px] mx-auto">
            {{ $slot }}
        </main>
    </div>

    <!-- <footer class="w-full py-2 absolute bottom-0 text-center mt-5">
        <p>&copy; passiondrivenbuilds.com 2024</p>
    </footer> -->
</body>

</html>