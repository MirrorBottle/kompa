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
    <section class="bg-gray-50 dark:bg-gray-900 flex justify-center items-center h-screen gap-10">
        @if (!isset($without_image))
            <img src="{{ asset('assets/svg/login.svg') }}" alt="" class="h-[500px] hidden lg:inline-block mr-10">
        @endif
        <div
            class="w-full sm:max-w-xl bg-white rounded-lg shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray mx-4">
            <div class="p-6 sm:p-8">

                <img class="h-[40px]" src="{{ asset('assets/images/logo_full.png') }}" alt="">
                @if (session('error'))
                    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                        role="alert">
                        <span class="font-medium">{{ session('error') }}</span>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </section>
</body>

</html>
