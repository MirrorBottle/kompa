<!DOCTYPE html>
<html lang="en" data-theme="hazzy">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2136f01711.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Hazzy - @yield('title')</title>
</head>

<body>
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')
    <div class="pt-20 w-[100%]">
        <div class="p-4 sm:ml-64">
            <h1 class="mb-6 font-extrabold text-secondary text-xl md:text-5xl pb-4">@yield('title')</h1>
            @yield('content')
        </div>
    </div>
</body>

</html>
