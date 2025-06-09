<!DOCTYPE html>
<html lang="ar" class="bg-gray-100 text-black">

@include('pages.partials.head')

<body class="flex flex-col min-h-screen h-full" dir="rtl">
    @include('pages.partials.sidebar')
    <main class="flex-grow sm:mr-64 transition-all duration-300">
        {{ $slot }}
    </main>
    @include('pages.partials.footer')
    @include('pages.partials.scripts')
</body>

</html>
