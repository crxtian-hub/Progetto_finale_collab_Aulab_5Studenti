<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adesso.it - Ecom</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- CDN Fontawesome --}}
    <script src="https://kit.fontawesome.com/fb14ef1831.js" crossorigin="anonymous"></script>
    {{--  --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body class="d-flex flex-column min-vh-100">
    <main class="flex-grow-1">
        <x-navbar/>
        {{$slot}}
    </main>
    <x-footer/>   
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
</body>
</html>