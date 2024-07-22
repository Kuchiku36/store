<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store</title>
      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.bunny.net">
      <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
      <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet"/>
      <link rel="icon" href="https://static.vecteezy.com/system/resources/previews/010/056/298/non_2x/dollar-icon-money-sign-design-free-png.png">

      <!-- Scripts -->
      @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.store.header')

        @yield('content')

    @include('layouts.store.footer')
</body>
</html>