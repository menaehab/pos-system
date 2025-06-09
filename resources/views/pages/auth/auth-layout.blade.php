<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('keywords.sign_in') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full" dir="rtl">
    <div class="justify-center items-center h-screen">
        {{ $slot }}
    </div>
</body>

</html>
