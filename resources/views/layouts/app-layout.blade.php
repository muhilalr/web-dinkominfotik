<!doctype html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dinkominfotik | Kabupaten Bangka</title>

    <!-- Tailwind / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="bg-[#F7F7F8]">
    <x-navbar></x-navbar>
    {{ $slot }}
    <x-footer></x-footer>
  </body>
</html>
