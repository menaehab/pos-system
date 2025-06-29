<!DOCTYPE html>
<html lang="ar" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('keywords.sign_in') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen h-full" dir="rtl">
    <main class="flex-grow justify-center items-center h-screen">
        {{ $slot }}
    </main>
    @include('pages.partials.footer')
</body>

</html>
