<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GradStay</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
<h1 style="color:red; font-size:30px;">
    APP LAYOUT ACTIVE
</h1>
    <!-- NAVBAR (INLINE TO AVOID YOUR ISSUE) -->
    <nav class="bg-white border-b px-6 py-4 flex justify-between items-center">

        <div class="font-bold text-lg">GRADSTAY</div>

        <div class="space-x-6">
            <a href="/" class="text-gray-700">Home</a>
            <a href="/listings" class="text-gray-700">Listings</a>

            @auth
                <span class="text-gray-700">{{ Auth::user()->name }}</span>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="text-red-600 ml-2">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-blue-600">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-blue-600">Register</a>
                @endif
            @endauth
        </div>

    </nav>

    <!-- PAGE CONTENT -->
    <main>
        @yield('content')
    </main>

</body>
</html>