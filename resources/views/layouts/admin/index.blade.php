<!DOCTYPE html>
<html lang="en" data-theme="kompa">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2136f01711.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Kompa - @yield('title')</title>
</head>

<body>
    @include('layouts.admin.header')
    @include('layouts.admin.sidebar')
    <div class="pt-20 w-[100%]">
        <div class="p-4 sm:ml-64">
            <h1 class="mb-6 font-extrabold text-secondary text-xl md:text-5xl pb-4">@yield('title')</h1>
            @if (session('success'))
                <div id="alert-border-3"
                    class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                    role="alert">
                    <div class="ml-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-border-3" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <i class="fa-solid fa-close"></i>
                    </button>
                </div>
            @endif
            @yield('content')
        </div>
    </div>
</body>

</html>
