<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRADSTAY - Student Accommodation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 min-h-screen flex items-center justify-center">

    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-10 w-full max-w-md">
        <!-- Logo -->
        <img src="{{ asset('images/logo.png') }}" alt="GRADSTAY Logo" class="mx-auto mb-6 w-32">

        <!-- Form Content -->
        {{ $slot }}
    </div>

</body>
</html>