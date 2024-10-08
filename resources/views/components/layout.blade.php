<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Home</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/mf107l0fp9u61csjnp37b8e1zjvl04i1chv2xgzq0pouljf5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


</head>
<body class="h-full">
    <div class="min-h-full">
        <x-navbar></x-navbar>


        <main>
          <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
          </div>
        </main>

      </div>
</body>
</html>